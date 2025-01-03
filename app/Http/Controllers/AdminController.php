<?php

namespace App\Http\Controllers;
use App\Services\AdminService;
use App\Services\ImageService;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;
use Session;
class AdminController extends Controller
{
    protected $adminService;
    protected $imageService;

    public function __construct(AdminService $adminService,ImageService $imageService )
    {
        $this->adminService = $adminService;
        $this->imageService = $imageService;
    }

    // ***********Working**************
    public function index()
    {
        return view('admin.dashboard');
    }

    public function showLoginForm()
    {


        return view('admin.login');
    }

    public function login(Request $request)
    {

        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required|max:30',
            // 'admin_role' => 'required',
        ];
        $customMessages = [
            'email.required' => 'Email is required',
            'email.email' => 'Valid Email is required',
            'password.required' => 'Password is required',
            // 'admin_role.required' => 'Role is not selected',
        ];

        $credentials = $this->validate($request, $rules, $customMessages);

        if ($this->adminService->login($credentials)) {

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['flash_message_error' => 'Invalid credentials']);
    }

    public function logout()
    {
        $this->adminService->logout();
        return redirect()->route('admin.login');
    }
    public function storeSessionId()
    {
        // Check if the session ID already exists
        if (!Session::has('session_id')) {
            // Generate a unique session ID
            $session_id = bin2hex(random_bytes(16)); // Generates a unique session ID
            Session::put('session_id', $session_id);
        }
    }
    // public function resetPassword(Request $request, $code = null)
    // {


    //     if ($request->ajax()) {
    //         $data = $request->all();

    //         // Validation rules
    //         $rules = [
    //             'new_pwd' => 'required|max:30',
    //             'confirm_pwd' => 'required|max:30|same:new_pwd',
    //         ];

    //         // Custom error messages
    //         $customMessages = [
    //             'new_pwd.required' => 'New Password is required',
    //             'confirm_pwd.required' => 'Confirm Password is required',
    //             'confirm_pwd.same' => 'New Password and Confirm Password must match',
    //         ];

    //         // Validate the request data
    //         $validator = Validator::make($request->all(), $rules, $customMessages);

    //         // Check if validation fails
    //         if ($validator->fails()) {
    //             return response()->json([
    //                 'status' => 'false',
    //                 'type' => 'error',
    //                 'errors' => $validator->errors(),
    //             ]);
    //         }

    //         // Decode the email from the code (if base64 encoding is used)
    //         $email = base64_decode($data['code']); // Assuming $code is the email encoded in base64

    //         // dd($email);
    //         // Call the service to reset the password
    //         $passwordResetStatus = $this->adminService->resetPassword($email, $data['new_pwd']);

    //         // Check if the user was found and password was reset
    //         if ($passwordResetStatus) {
    //             try {
    //                 // Send the password reset confirmation email
    //                 $admin = $this->adminService->findByEmail($email); // Assuming you have a method to get admin details by email
    //                 $messageData = ['email' => $email, 'name' => $admin->name];

    //                 Mail::send('emails.new_password_confirmation', $messageData, function ($message) use ($email) {
    //                     $message->to($email)->subject('Password Updated - HD Gabion');
    //                 });
    //             } catch (\Exception $e) {
    //                 // Handle email sending error
    //                 return response()->json([
    //                     'status' => 'false',
    //                     'type' => 'error',
    //                     'message' => 'Failed to send email: ' . $e->getMessage(),
    //                 ]);
    //             }

    //             // Success response
    //             return response()->json([
    //                 'status' => 'true',
    //                 'type' => 'success',
    //                 'message' => 'Password reset for your account',
    //             ]);
    //         } else {
    //             // No user found response
    //             return response()->json([
    //                 'status' => 'false',
    //                 'type' => 'error',
    //                 'message' => 'No user found with this email address.',
    //             ]);
    //         }
    //     } else {
    //         // dd("code".$code);
    //         // Render reset password view if it's not an AJAX request
    //         return view('admin.reset-password')->with(compact('code'));
    //     }
    // }
    // public function forgotPassword(Request $request)
    // {
    //     // dd("hi");

    //     if ($request->ajax()) {

    //         $data = $request->all();
    //         $rules = [
    //             'email' => 'required|email|max:255|exists:admins',

    //         ];
    //         $customMessages = [
    //             'email.required' => 'Email is required',
    //             'email.email' => 'Valid Email is required',
    //             'email.exists' => 'Email does not Exists',

    //         ];
    //         // Perform validation
    //         $validator = Validator::make($request->all(), $rules, $customMessages);

    //         // Check if validation fails
    //         if ($validator->passes()) {
    //             //Send Forgot password Email Code
    //             $data = $request->all();
    //             if ($this->adminService->forgotPassword($data)) {
    //                 //Mail Success Message
    //                 return response()->json([
    //                     'status' => 'true',
    //                     'type' => 'success',
    //                     'message' => 'Reset Password Link sent to your registered email.',
    //                 ]);
    //             }


    //         } else {
    //             //  If validation fails, return failure message
    //             return response()->json([
    //                 'status' => 'false',
    //                 'type' => 'error',
    //                 'errors' => $validator->messages(),
    //             ]);

    //         }


    //     } else {
    //         return view('admin.forgot-password');
    //     }
    // }
    public function checkCurrentPwd(Request $request)
    {

        $data = $request->all();
        // dd($data);
        // dd($this->adminService->checkCurrentPwd($data));
        if (!$this->adminService->checkCurrentPwd($data['current_pwd'])) {
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
            if (!$this->adminService->checkCurrentPwd($data['current_pwd'])) {
                return response()->json([
                    'status' => 'false',
                    'type' => 'incorrect',
                    'message' => 'Current Password is incorrect.',
                ]);
            }
            $admin = Auth::guard('admin')->user();

            $updated = $this->adminService->updatePassword($admin, $request->new_pwd);

            if ($updated) {
                return response()->json([
                    'status' => 'true',
                    'type' => 'success',
                    'message' => '/admin/account',
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
    public function account(Request $request)
    {

        $adminDetails = Auth::guard('admin')->user();
        return view('admin.account')->with(compact('adminDetails'));
    }

    public function updateDetails(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            $rules = [
                'name' => 'required|max:255|regex:/^[\pL\s]+$/u|max:255',
                'mobile' => 'required|numeric',
                'admin_image' => 'image',
            ];
            $customMessages = [
                'admin_name.required' => 'Name is required',
                // 'admin_name.alpha' => 'Valid Name is required',
                'name.regex' => 'Name must only contain letters and spaces',
                'admin_mobile.required' => 'Mobile is required',
                'admin_mobile.numeric' => 'Valid Mobile is required',
                'admin_image.image' => 'Valid Image is required',
            ];
            $validator = Validator::make($request->all(), $rules, $customMessages);
            if ($validator->passes()) {

                $data['email'] = Auth::guard('admin')->user()->email;
                $admin = $this->adminService->updateAdminDetails($data['email'], ['name' => $data['name'], 'mobile' => $data['mobile'], 'address' => $data['address']]);

                // $admin = Admin::where('email', Auth::guard('admin')->user()->email)->update(['name' => $data['name'], 'mobile' => $data['mobile'], 'image' => $imageName, 'address' => $data['address']]);
                if ($admin) {
                    $admin = $this->adminService->findByEmail(Auth::guard('admin')->user()->email);
                    // $admin = Admin::where('email', Auth::guard('admin')->user()->email)->first();

                    return response()->json([
                        'status' => 'true',
                        'type' => 'success',
                        'message' => '/admin/account',
                        'admin' => $admin,  // Return the updated user details
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
            $rules = [
                'admin_image' => 'image',
            ];
            $customMessages = [
                'admin_image.image' => "Invalid Image",
            ];

            $validator = Validator::make($request->all(), $rules, $customMessages);
            if ($validator->passes()) {
                if (!empty($data['current_image'])) {
                    $imageName = $data['current_image'];// Default to existing image

                } else {
                    $imageName ="";
                }

                // $imageName = $this->imageService->uploadAndGetImage($request);
                $imageName = $this->imageService->uploadAndGetImage($request, 'admin_image','admin/images/profile');
                // dd($imageName);
                if ($data['current_image']) {
                    $this->imageService->deleteImage($data['current_image']);
                }
                try {
                    // $admin = Admin::where('email', Auth::guard('admin')->user()->email)->update(['image' => $imageName]);
                    $email = Auth::guard('admin')->user()->email;
                    $admin = $this->adminService->updateProfilePic($email, $imageName);
                    if ($admin) {
                        return response()->json([
                            'status' => 'true',
                            'type' => 'uploaded',
                            'image' => $imageName,
                            'message'=>'/admin/account'
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

            }
            else {
                return response()->json([
                    'status' => 'false',
                    'type' => 'error',
                    'errors' => $validator->messages(),
                ]);

            }

        }

    }
    // ***********End Working**************

}



