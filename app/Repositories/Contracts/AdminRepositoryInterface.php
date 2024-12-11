<?php


namespace App\Repositories\Contracts;

use App\Models\Admin;

interface AdminRepositoryInterface
{
    // public function all();
    // public function find($id);
    // public function create(array $data);
    // public function update($id, array $data);
    // public function delete($id);

    // // New methods for authentication
    public function findByEmail($email);
    // // public function updateAdminProfilePic($id, $file, $currentImage = null);
    public function updateDetails(string $email,array $data);
    public function updatePassword(Admin $admin, string $newPassword);
    // public function updateProfilePic(string $email, string $imagename);

}

