<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Repositories\Contracts\AdminRepositoryInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;


class AdminRepository implements AdminRepositoryInterface
{
    protected $model;
    protected $imageManager;

    public function __construct(Admin $admin)

    {
        $this->model = $admin;

    }

    // public function all()
    // {
    //     return $this->model->all();
    // }

    // public function find($id)
    // {
    //     return $this->model->findOrFail($id);
    // }

    // public function create(array $data)
    // {
    //     return $this->model->create($data);
    // }

    // public function update($id, array $data)
    // {
    //     $admin = $this->model->findOrFail($id);
    //     $admin->update($data);
    //     return $admin;
    // }

    // public function delete($id)
    // {
    //     $admin = $this->model->findOrFail($id);

    //     // Delete admin's image if it exists
    //     if (!empty($admin->image) && File::exists(public_path('admin/images/profile/' . $admin->image))) {
    //         File::delete(public_path('admin/images/profile/' . $admin->image));
    //     }

    //     $admin->delete();
    //     return $admin;
    // }

    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function updatePassword(Admin $admin, string $newPassword)
    {
         $admin=$admin->update(['password' => Hash::make($newPassword)]);

        return $admin;
    }

    public function updateDetails(string $email,array $data)
    {
        return Admin::where('email', $email)->update($data);
    }
public function updateProfilePic(string $email, string $imagename){
    return Admin::where('email', $email)->update(['image' => $imagename]);
}
    // public function updateAdminProfilePic($id, $file, $currentImage = null)
    // {
    //     $admin = $this->model->findOrFail($id);

    //     // Handle image upload
    //     if ($file && $file->isValid()) {
    //         // Delete the old image if it exists
    //         if (!empty($admin->image) && File::exists(public_path('admin/images/profile/' . $admin->image))) {
    //             File::delete(public_path('admin/images/profile/' . $admin->image));
    //         }

    //         // Upload the new image
    //         $extension = $file->getClientOriginalExtension();
    //         $imageName = rand(111, 99999) . '.' . $extension;
    //         $imagePath = public_path('admin/images/profile/' . $imageName);

    //         // Resize and save the image using ImageManager (Intervention)
    //         // $this->imageManager->make($file)->resize(300, 300)->save($imagePath);

    //         // Update the image name in the database
    //         $admin->update(['image' => $imageName]);
    //     } elseif (!empty($currentImage)) {
    //         // Keep the current image if no new image is uploaded
    //         $admin->update(['image' => $currentImage]);
    //     } else {
    //         // Set image to null if no image is provided
    //         $admin->update(['image' => null]);
    //     }

    //     return $admin;
    // }
}
