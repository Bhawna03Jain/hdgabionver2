<?php

namespace App\Http\Controllers;

// use App\Services\OrderService;
use App\Services\UserService;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;

class CustomerController extends Controller
{
    protected $userService;
    // protected $orderService;

    public function __construct(UserService $userService)
    // ,OrderService $orderService)
    {
        $this->userService = $userService;
        // $this->orderService = $orderService;
    }

    public function index()
    {
        return view('front.index');
    }
    public function getUserInfo()
{
    $user = Auth::user(); // Get the currently authenticated user
    return response()->json($user); // Return user data as JSON
}
    public function showLoginForm()
    {

        return view('front.customer.login');
    }
    public function register(Request $request)
    {

        if ($request->ajax()) {
            // dd($request);
            $data = $request->all();

            $rules = [
                'name' => 'required|string|max:255', // Ensure name is a string and not too long
                'email' => 'required|email|max:255|unique:users,email', // Ensure unique email
                'mobile' => 'required', // Ensure mobile number is 10 digits long
                'address' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'postal' => 'required|string|max:255',
                // 'state' => 'required|string|max:255',
                'password' => 'required|string|min:4|max:30', // Ensure password meets length requirements and matches confirmation
                'password_confirmation' => 'required|string|min:4|max:30|same:password', // Ensure confirmation password matches
            ];

            $customMessages = [
                'name.required' => 'Name is required',
                'name.string' => 'Name must be a string',
                'name.max' => 'Name cannot exceed 255 characters',

                'email.required' => 'Email is required',
                'email.email' => 'A valid email address is required',
                'email.max' => 'Email cannot exceed 255 characters',
                'email.unique' => 'This email is already registered',

                'mobile.required' => 'Mobile number is required',
                'mobile.digits' => 'Mobile number must be digit',

                'address.required' => 'Address is required',
                'address.string' => 'Address must be a string',
                'address.max' => 'Address cannot exceed 255 characters',

                'country.required' => 'Country is required',
                'country.string' => 'Country must be a string',
                'country.max' => 'Country cannot exceed 255 characters',

                'city.required' => 'city is required',
                'city.string' => 'city must be a string',
                'city.max' => 'city cannot exceed 255 characters',

                'postal.required' => 'postal is required',
                'postal.string' => 'postal must be a string',
                'postal.max' => 'postal cannot exceed 255 characters',

                'password.required' => 'Password is required',
                'password.string' => 'Password must be a string',
                'password.min' => 'Password must be at least 4 characters long',
                'password.max' => 'Password cannot exceed 30 characters',

                'password_confirmation.required' => 'Password confirmation is required',
                'password_confirmation.string' => 'Password confirmation must be a string',
                'password_confirmation.min' => 'Password confirmation must be at least 4 characters long',
                'password_confirmation.max' => 'Password confirmation cannot exceed 30 characters',
                'password_confirmation.same' => 'Password does not match',
            ];


            $validator = Validator::make($request->all(), $rules, $customMessages);
            if ($validator->passes()) {
                // Create new user
                $customer=[
                    'name' => ucwords($data['name']),
                    'email' => $data['email'],
                    'mobile' => $data['mobile'],
                    'address' => $data['address'],
                    'country' => $data['country'],
                     'city' => $data['city'],
                    'postal' => $data['postal'],
                    // 'state' => 0,
                    'password' => Hash::make($data['password']), // Hash the password
                    'image' => null
                ];
                // $customer = User::create([
                //     'name' => $data['name'],
                //     'email' => $data['email'],
                //     'mobile' => $data['mobile'],
                //     'address' => $data['address'],
                //     // 'country' => $data['country'],
                //     // 'state' => 0,
                //     'password' => Hash::make($data['password']), // Hash the password
                //     'image' => null
                // ]);
                if($this->userService->createCustomer($customer)) {
                    // dd("created");
                    $email = $data['email'];

                    $messageData = ['email' => $data['email'], 'name' => ucwords($data['name']), 'code' => base64_encode($data['email'])];
                    Mail::send('front.emails.confirmation', $messageData, function ($message) use ($email) {
                        $message->to($email)->subject('Confirm your HD Gabion Account');
                    });
                    //Mail Success Message
                    return response()->json([
                        'status' => 'true',
                        'type' => 'success',
                        'message' => 'Registration Link sent to your registered email.',
                    ]);
                } else {

                }

                // return redirect()->back()->with('flash_message_success', 'You are Registered successfully.Please Check Email Id');


        }
        else{
            return response()->json([
                'status' => 'false',
                'type' => 'error',
                'errors' => $validator->messages(),
            ]);
        }
    }else{

        return view('front.customer.register');
    }

    }
    public function login(Request $request)
    {


        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required|max:30',

        ];
        $customMessages = [
            'email.required' => 'Email is required',
            'email.email' => 'Valid Email is required',
            'password.required' => 'Password is required',

        ];

        $credentials = $this->validate($request, $rules, $customMessages);
        if ($this->userService->findByEmail($request->email)) {
            if ($this->userService->login($credentials)) {
                if ($this->userService->isActive($request->email)) {
                    $redirectUrl = session('url.intended', route('home'));
                    return response()->json([
                        'status' => 'true',
                        'type' => 'success',
                        'message' => $redirectUrl,
                    ]);
                } else {
                    $data = $request->all();
                    $email = $data['email'];
                    $name=$this->userService->findByEmail($request->email)->name;
                    $messageData = ['email' => $email, 'name' => $name, 'code' => base64_encode($data['email'])];
                    Mail::send('front.emails.confirmation', $messageData, function ($message) use ($email) {
                        $message->to($email)->subject('Confirm your HD Gabion Account');
                    });
                    return response()->json([
                        'status' => 'false',
                        'type' => 'inactive',
                        'message' => 'Your Account is not Active.Link has been sent to your Email',
                    ]);

                }
            } else {
                return response()->json([
                    'status' => 'false',
                    'type' => 'invalidpassword',
                    'message' => 'Invalid credentials',
                ]);
            }
        } else {
            return response()->json([
                'status' => 'false',
                'type' => 'notfound',
                'message' => 'Email ID is not registered. Please Register',
            ]);
        }




        // return back()->withErrors(['flash_message_error' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        $this->userService->logout($request);

        return redirect()->route('customerLogin');
    }
    public function checkCurrentPwd(Request $request)
    {

        $data = $request->all();
        // dd($data);
        // dd($this->userService->checkCurrentPwd($data));
        if (!$this->userService->checkCurrentPwd($data['current_pwd'])) {
            return response()->json('false');  // Return a JSON response
        } else {
            return response()->json('true');  // Return a JSON response
        }
    }
    public function updatePassword(Request $request)
    {

        if ($request->ajax()) {


            $rules = [
                'current_pwd' => 'required',

                'new_pwd' => 'required|max:30',
                'confirm_pwd' => 'required|max:30|same:new_pwd',
            ];

            // Custom error messages
            $customMessages = [
                'current_pwd.required' => 'Current Password is required',

                'new_pwd.required' => 'New Password is required',
                'confirm_pwd.required' => 'Confirm Password is required',
                'confirm_pwd.same' => 'New Password and Confirm Password must match',
            ];
            // Validate the request data
            $validator = Validator::make($request->all(), $rules, $customMessages);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'false',
                    'type' => 'error',
                    'errors' => $validator->errors(),
                ]);
            }
            $data = $request->all();
            if (!$this->userService->checkCurrentPwd($data['current_pwd'])) {
                return response()->json([
                    'status' => 'false',
                    'type' => 'incorrect',
                    'message' => 'Current Password is incorrect.',
                ]);
            }
            $customer = Auth::guard('web')->user();
            $updated = $this->userService->updatePassword($customer, $request->new_pwd);

            if ($updated) {
                return response()->json([
                    'status' => 'true',
                    'type' => 'success',
                    'message' => 'Password Updated',
                ]);
            } else {

                return response()->json([
                    'status' => 'true',
                    'type' => 'notupdated',
                    'message' => 'Password Not Updated',
                ]);
            }

        } else {
            // return view('admin.customer.update_password');
        }
    }
    public function orders(Request $request)
    {

        $userDetails = Auth::guard('web')->user();
        dd($userDetails);
        // $orderLogs = $this->orderService->getOrderLogsDetail($orderDetails->id);
        return view('front.customer.orders')->with(compact('userDetails'));
    }
    public function account(Request $request)
    {

        $userDetails = Auth::guard('web')->user();
        // dd($userDetails  );
        // $orderLogs = $this->orderService->getOrderLogsDetail($orderDetails->id);
        return view('front.customer.account')->with(compact('userDetails'));
    }
    public function updateDetails(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // return $data;
                $rules = [
                    'name' => 'required|regex:/^[\pL\s]+$/u|max:255',
                    'mobile' => 'required|numeric',
                    // 'cust_image' => 'image',
                ];
                $customMessages = [
                    'name.required' => 'Name is required',
                    'name.regex' => 'Name must only contain letters and spaces',
                    'mobile.required' => 'Mobile is required',
                    'mobile.numeric' => 'Valid Mobile is required',
                    // 'image.image' => 'Valid Image is required',
                ];
            $validator = Validator::make($request->all(), $rules, $customMessages);
            if ($validator->passes()) {

                $data['email'] = Auth::guard('web')->user()->email;
                $admin = $this->userService->updateCustomerDetails($data['email'], ['name' => $data['name'], 'mobile' => $data['mobile'], 'address' => $data['address']]);

                // $admin = Admin::where('email', Auth::guard('web')->user()->email)->update(['name' => $data['name'], 'mobile' => $data['mobile'], 'image' => $imageName, 'address' => $data['address']]);
                if ($admin) {
                    $user = $this->userService->findByEmail(Auth::guard('web')->user()->email);
                    // $admin = Admin::where('email', Auth::guard('web')->user()->email)->first();

                    return response()->json([
                        'status' => 'true',
                        'type' => 'success',
                        'message' => 'Details has been updated Successfully.',
                        'user' => $user,  // Return the updated user details
                    ]);
                } else {
                    return response()->json([
                        'status' => 'false',
                        'type' => 'notupdated',
                        'errors' => 'Details has not been updated Successfully.',
                    ]);
                }
                // return redirect()->back()->with('flash_message_success', 'Admin Detail updated successfully.');

            } else {
                return response()->json([
                    'status' => 'false',
                    'type' => 'error',
                    'errors' => $validator->messages(),
                ]);

            }
        }
    }
    public function updatePic(Request $request)
    {
// dd($request->all());
        if ($request->ajax()) {
            $data = $request->all();
// dd($data);
            $rules = [
                'cust_image' => 'image',
            ];
            $customMessages = [
                'cust_image.image' => "Invalid Image",
            ];

            $validator = Validator::make($request->all(), $rules, $customMessages);
            if ($validator->passes()) {

                if (!empty($data['current_image'])) {
                    $imageName = $data['current_image'];// Default to existing image

                } else {
                    $imageName = "";
                }
                // dd($imageName);
                $imageName = $this->userService->uploadAndGetImage($request);
// dd($imageName);
                try {
                    // $admin = Admin::where('email', Auth::guard('admin')->user()->email)->update(['image' => $imageName]);
                    $email = Auth::guard('web')->user()->email;
                    // dd($email);
                    $admin = $this->userService->updateProfilePic($email, $imageName);
                    if ($admin) {
                        return response()->json([
                            'status' => 'true',
                            'type' => 'uploaded',
                            'message' => $imageName,
                        ]);
                    } else {
                        return response()->json([
                            'status' => 'false',
                            'type' => 'notupdated',
                            'errors' => 'Pic is Not Uploaded Successfully',
                        ]);
                    }
                } catch (\Exception $e) {
                    return response()->json([
                        'status' => 'false',
                        'type' => 'exception',
                        'errors' => $e->getMessage(),
                    ]);
                }

            } else {

                return response()->json([
                    'status' => 'false',
                    'type' => 'error',
                    'errors' => $validator->messages(),
                ]);
            }
        }
    }

    public function forgotPassword(Request $request)
    {
        // dd("hi");

        if ($request->ajax()) {

            $data = $request->all();

            $rules = [
                'email' => 'required|email|max:255',

            ];
            $customMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid Email is required',
                // 'email.exists' => 'Email does not Exists',

            ];
            // Perform validation
            $validator = Validator::make($request->all(), $rules, $customMessages);

            // Check if validation fails
            if ($validator->passes()) {
                //Send Forgot password Email Code
                $data = $request->all();
                // dd($data);
                if ($this->userService->forgotPassword($data)) {
                    //Mail Success Message
                    return response()->json([
                        'status' => 'true',
                        'type' => 'success',
                        'message' => 'Reset Password Link sent to your registered email.',
                    ]);
                }


            } else {
                //  If validation fails, return failure message
                return response()->json([
                    'status' => 'false',
                    'type' => 'error',
                    'errors' => $validator->messages(),
                ]);

            }


        } else {
            return view('front.customer.forgot-password');
        }
    }
    public function resetPassword(Request $request, $code = null)
    {

        if ($request->ajax()) {
            $data = $request->all();

            // Validation rules
            $rules = [
                'new_pwd' => 'required|max:30',
                'confirm_pwd' => 'required|max:30|same:new_pwd',
            ];

            // Custom error messages
            $customMessages = [
                'new_pwd.required' => 'New Password is required',
                'confirm_pwd.required' => 'Confirm Password is required',
                'confirm_pwd.same' => 'New Password and Confirm Password must match',
            ];

            // Validate the request data
            $validator = Validator::make($request->all(), $rules, $customMessages);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'false',
                    'type' => 'error',
                    'errors' => $validator->errors(),
                ]);
            }

            // Decode the email from the code (if base64 encoding is used)
            $email = base64_decode($data['code']); // Assuming $code is the email encoded in base64
// dd($data);
            // Call the service to reset the password
            $passwordResetStatus = $this->userService->resetPassword($email, $data['new_pwd']);

            // Check if the user was found and password was reset
            if ($passwordResetStatus) {
                try {
                    // Send the password reset confirmation email
                    $customer = $this->userService->findByEmail($email); // Assuming you have a method to get admin details by email
                    $messageData = ['email' => $email, 'name' => $customer->name];

                    Mail::send('front.emails.new_password_confirmation', $messageData, function ($message) use ($email) {
                        $message->to($email)->subject('Password Updated - HD Gabion');
                    });
                } catch (\Exception $e) {
                    // Handle email sending error
                    return response()->json([
                        'status' => 'false',
                        'type' => 'error',
                        'message' => 'Failed to send email: ' . $e->getMessage(),
                    ]);
                }

                // Success response
                return response()->json([
                    'status' => 'true',
                    'type' => 'success',
                    'message' => '/customer/login',
                ]);
            } else {
                // No user found response
                return response()->json([
                    'status' => 'false',
                    'type' => 'error',
                    'message' => 'No user found with this email address.',
                ]);
            }
        } else {
            // Render reset password view if it's not an AJAX request
            return view('front.customer.reset-password')->with(compact('code'));
        }
    }

    public function confirmAccount($code)
    {
        $email = base64_decode($code);

        $userCount =$this->userService->findByEmail($email)->count();

        if ($userCount > 0) {
            $userDetails = $this->userService->findByEmail($email);

            if ($this->userService->isActive($email)) {
                return redirect()->route('customerLogin', ['email' => $email])->with('flash_message_success', 'Your Email account is already activated. You can login now.');
            } else {
                $this->userService->makeActive($email);

                // Send Welcome Email
                $messageData = ['email' => $email, 'name' => $userDetails->name];
                Mail::send('front.emails.welcome', $messageData, function ($message) use ($email) {
                    $message->to($email)->subject('Welcome to HD Gabion.');
                });

                return redirect()->route('customerLogin')->with('flash_message_success', 'Your Email account is activated. You can login now.');
            }
        } else {
            abort(404);
        }
    }
    public function showQuotesWithOrders()
    {
        $customerId=$this->userService->GetLoginCustomerID();
        $customer=$this->userService->getCustomerById($customerId);
        if ($customer) {
            $orders=$this->userService->GetOrdersDetail();
            // $orderLogs = $this->orderService->getOrderLogsDetail($orders->id);
            // dd($orders);
            return view('front.customer.orders', compact('customer','orders'  ));

        }

        // $customer = User::with('quotes.order')->findOrFail($customerId);
        return view('front.index');
    }

    // public function showOrderDetails($orderId)
    // {
    //     $order = Order::with('quote.customer')->findOrFail($orderId);
    //     return view('order.details', compact('order'));
    // }
}
