<?php
namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Mail;
class UserService
{
    protected $userRepository;
    protected $imageManager;



    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->imageManager = new ImageManager(new Driver());
    }

    public function getAllCustomers()
    {
        return $this->userRepository->all();
    }
    public function findByEmail(string $email)
    {

        return $this->userRepository->findByEmail($email);
    }
    public function getCustomerById($id)
    {
        return $this->userRepository->find($id);
    }

    public function createCustomer(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function updateCustomer($id, array $data)
    {
        return $this->userRepository->update($id, $data);
    }

    public function deleteCustomer($id)
    {
        return $this->userRepository->delete($id);
    }

    // Authentication logic
    public function login(array $credentials)
    {
        // Find Customer by email
        $customer = $this->userRepository->findByEmail($credentials['email']);

        // Check if the Customer exists and the password is correct
        if ($customer && Hash::check($credentials['password'], $customer->password)) {
            Auth::guard('web')->login($customer);
            return true;
        }

        return false;
    }

    public function logout(Request $request)
    {
        // dd("logout");
        Auth::guard('web')->logout();
        $request->session()->flush(); // Clear all session data, including intended URL

    }
    public function isActive(string $email)
    {
        // Find Customer by email
        $customer = $this->userRepository->findByEmail($email);

        // Check if the Customer exists and the password is correct
        if ($customer && $customer->status == 1) {

            return true;
        } else {
            return false;
        }


    }


    //     public function resetPassword(string $email, string $newPassword)
//     {
//            // Retrieve the Customer by email
//         $customer = $this->userRepository->findByEmail($email);

    //         if ($customer) {
//             $this->userRepository->updatePassword($customer, $newPassword);
//             return true;
//         } else {
//         return false;
//     }
// }
    public function resetPassword(string $email, string $newPassword)
    {
        // Retrieve the customer by email
        $customer = $this->userRepository->findByEmail($email);
        // If customer is not found, return false
        if (!$customer) {
            return false;
        }

        // Hash and update the password
// $hashedPassword = Hash::make($newPassword); // Use Hash::make for better readability

        // Attempt to update the password
        if ($this->userRepository->updatePassword($customer, $newPassword)) {
            // dd("done");
            return true; // Password updated successfully
        }

        // If the update fails, return false
        return false;
    }
    public function makeActive(string $email)
    {
        // Retrieve the Customer by email
        $customer = $this->userRepository->findByEmail($email);

        // If Customer is found, reset the password
        if ($customer) {
            // Hash and update the password
            $this->userRepository->updateStatus($customer, 1); // Use bcrypt for hashing
            return true;
        } else {
            return false; // No Customer found
        }
    }
    public function updateCustomerDetails(string $email, array $data)
    {
        return $this->userRepository->updateDetails($email, $data);
    }

    public function checkCurrentPwd(string $current_pwd)
    {
        // $current_pwd = $data['current_pwd'];

        return Hash::check($current_pwd, Auth::guard('web')->user()->password);
    }

    public function updatePassword(User $customer, string $newPassword)
    {
        return $this->userRepository->updatePassword($customer, $newPassword);
    }

    public function uploadAndGetImage(Request $request)
    {
        if ($request->hasFile('cust_image')) {
            // return $data;
            $image_tmp = $request->file('cust_image');
            // dd($image_tmp);
            if ($image_tmp->isValid()) {
                // Upload Images after Resize
                $extension = $image_tmp->getClientOriginalExtension();
                $imageName = rand(111, 99999) . '.' . $extension;
                // $image_path = public_path('Customer/images/profile/' . $imageName);

                // $this->imageManager->read($image_tmp)->save($image_path);
                // $image_path = public_path('Customer/images/profile/' . $imageName);
                // $directory = dirname($image_path);

                // if (!file_exists($directory)) {
                //     mkdir($directory, 0755, true); // Recursively create the directory with appropriate permissions
                // }

                // $this->imageManager->read($image_tmp)->save($image_path);
                $image_path = storage_path('app/public/Customer/images/profile/' . $imageName);
                $directory = dirname($image_path);

                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                $this->imageManager->read($image_tmp)->save($image_path);

                return $imageName;

            }
        }

    }
    public function updateProfilePic(string $email, string $imagename)
    {
        return $this->userRepository->updateProfilePic($email, $imagename);
    }

    public function forgotPassword(array $data)
    {
        $email = $data['email'];
        $customer = User::where('email', $email)->first();
        $customername = $customer->name;

        $messageData = ['email' => $email, 'name' => $customername, 'code' => base64_encode($data['email'])];
        Mail::send('front.emails.reset_password', $messageData, function ($message) use ($email) {
            $message->to($email)->subject('Password Reset-HD Gabion');
        });

        return true;
    }
    //     public function findByEmail(string $email){
// return $this->userRepository->findByEmail($email);
//     }
    public function GetLoginCustomerID()
    {
        return Auth()->guard('web')->user()->id;
    }
    public function GetOrdersDetail()
    {
        $customerId=$this->GetLoginCustomerID();
        $customer = $this->userRepository->getCustomerWithOrderDetail($customerId);
        if ($customer) {
            $orders = $customer->quotes->pluck('order')->filter(); // Collect all orders, excluding null ones

            if ($orders->isNotEmpty()) {
                // dd($orders); // Dump the list of orders
                             return $orders;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
