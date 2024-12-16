<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
// use Intervention\Image\ImageManager; // Import ImageManager
// use Intervention\Image\Drivers\Gd\Driver;
use Hash;

class UserRepository implements UserRepositoryInterface
{
    protected $model;
    protected $imageManager;

    public function __construct(User $customer)
    // , ImageManager $imageManager)
    {
        $this->model = $customer;
        // $this->imageManager = $imageManager; // Inject the ImageManager
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $customer = $this->model->findOrFail($id);
        $customer->update($data);
        return $customer;
    }

    public function delete($id)
    {
        $customer = $this->model->findOrFail($id);

        // Delete admin's image if it exists
        if (!empty($customer->image) && File::exists(public_path('front/images/profile/' . $customer->image))) {
            File::delete(public_path('admin/images/profile/' . $customer->image));
        }

        $customer->delete();
        return $customer;
    }

    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function updatePassword(User $customer, string $newPassword)
    {
        $customer=$customer->update(['password' => Hash::make($newPassword)]);
    return $customer;
    }

    public function updateDetails(string $email,array $data)
    {
        return User::where('email', $email)->update($data);
    }
public function updateProfilePic(string $email, string $imagename){
    return User::where('email', $email)->update(['image' => $imagename]);
}
public function updateStatus(User $customer, string $status){
    // $customer = $this->model->findOrFail($email);
    $customer->status = $status;
    $customer->save();
    return $customer;

}
public function getCustomerWithOrderDetail($customerId){
    $customer = User::with('quotes.order')->find($customerId);
    // dd($customer);
    return $customer;

}
    // public function updateAdminProfilePic($id, $file, $currentImage = null)
    // {
    //     $customer = $this->model->findOrFail($id);

    //     // Handle image upload
    //     if ($file && $file->isValid()) {
    //         // Delete the old image if it exists
    //         if (!empty($customer->image) && File::exists(public_path('admin/images/profile/' . $customer->image))) {
    //             File::delete(public_path('admin/images/profile/' . $customer->image));
    //         }

    //         // Upload the new image
    //         $extension = $file->getClientOriginalExtension();
    //         $imageName = rand(111, 99999) . '.' . $extension;
    //         $imagePath = public_path('admin/images/profile/' . $imageName);

    //         // Resize and save the image using ImageManager (Intervention)
    //         // $this->imageManager->make($file)->resize(300, 300)->save($imagePath);

    //         // Update the image name in the database
    //         $customer->update(['image' => $imageName]);
    //     } elseif (!empty($currentImage)) {
    //         // Keep the current image if no new image is uploaded
    //         $customer->update(['image' => $currentImage]);
    //     } else {
    //         // Set image to null if no image is provided
    //         $customer->update(['image' => null]);
    //     }

    //     return $customer;
    // }
}
