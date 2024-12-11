<?php
namespace App\Services;

use App\Models\Admin;

use App\Repositories\AdminRepository;
use App\Repositories\Contracts\AdminRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class AdminService
{
    protected $adminRepository;
    // protected $imageManager;



    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
        // $this->imageManager = new ImageManager(new Driver());
    }

    // public function getAllAdmins()
    // {
    //     return $this->adminRepository->all();
    // }
    public function findByEmail(string $email)
    {
        return $this->adminRepository->findByEmail($email);
    }
    // public function getAdminById($id)
    // {
    //     return $this->adminRepository->find($id);
    // }

    // public function createAdmin(array $data)
    // {
    //     return $this->adminRepository->create($data);
    // }

    // public function updateAdmin($id, array $data)
    // {
    //     return $this->adminRepository->update($id, $data);
    // }

    // public function deleteAdmin($id)
    // {
    //     return $this->adminRepository->delete($id);
    // }

    // Authentication logic
    public function login(array $credentials)
    {
        // Find admin by email
        $admin = $this->adminRepository->findByEmail($credentials['email']);

        // Check if the admin exists and the password is correct
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::guard('admin')->login($admin);
            return true;
        }

        return false;
    }

    public function logout()
    {
        // dd("logout");
        Auth::guard('admin')->logout();
    }


    // public function resetPassword(string $email, string $newPassword)
    // {
    //     // Retrieve the admin by email
    //     $admin = $this->adminRepository->findByEmail($email);

    //     // If admin is found, reset the password
    //     if ($admin) {
    //         // dd($newPassword);
    //         // Hash and update the password
    //         $this->adminRepository->updatePassword($admin, $newPassword); // Use bcrypt for hashing
    //         return true;
    //     } else {
    //         return false; // No admin found
    //     }
    // }

    public function updateAdminDetails(string $email, array $data)
    {
        return $this->adminRepository->updateDetails($email, $data);
    }

    public function checkCurrentPwd(string $current_pwd)
    {
        // $current_pwd = $data['current_pwd'];

        return Hash::check($current_pwd, Auth::guard('admin')->user()->password);
    }

    public function updatePassword(Admin $admin, string $newPassword)
    {
        return $this->adminRepository->updatePassword($admin, $newPassword);
    }

    // public function uploadAndGetImage(Request $request)
    // {
    //     if ($request->hasFile('admin_image')) {
    //         // return $data;
    //         $image_tmp = $request->file('admin_image');

    //         if ($image_tmp->isValid()) {
    //             // Upload Images after Resize
    //             $extension = $image_tmp->getClientOriginalExtension();
    //             $imageName = rand(111, 99999) . '.' . $extension;
    //             $image_path = public_path('admin/images/profile/' . $imageName);

    //             $this->imageManager->read($image_tmp)->save($image_path);
    //             return $imageName;

    //         }
    //     }

    // }
    public function updateProfilePic(string $email, string $imagename)
    {

        return $this->adminRepository->updateProfilePic($email, $imagename);
    }

    // public function forgotPassword(array $data)
    // {
    //         $email = $data['email'];
    //         $admin = Admin::where('email', $email)->first();
    //         $adminname = $admin->name;

    //         $messageData = ['email' => $email, 'name' => $adminname, 'code' => base64_encode($data['email'])];
    //         Mail::send('emails.reset_password', $messageData, function ($message) use ($email) {
    //             $message->to($email)->subject('Password Reset-HD Gabion');
    //         });

    //     return true;
    // }
}
