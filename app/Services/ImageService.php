<?php
namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImageService
{
    protected $imageManager;

    public function __construct()
    {
        $this->imageManager = new ImageManager(new Driver());
    }

    public function uploadAndGetImage(Request $request,$imageName,$path)
    {
        if ($request->hasFile($imageName)) {
            $image_tmp = $request->file($imageName);

            if ($image_tmp->isValid()) {
                // Define the folder path
                $folderPath = public_path($path);
                // $folderPath = base_path('../public_html/' . $path);
                // Check if the folder exists, if not, create it
                if (!is_dir($folderPath)) {
                    mkdir($folderPath, 0755, true); // Create the folder with proper permissions
                }

                // Upload the image
                $extension = $image_tmp->getClientOriginalExtension();
                $imageName = rand(111, 99999) . '.' . $extension;
                $imagePath = $folderPath . '/' . $imageName;

                $this->imageManager->read($image_tmp)->save($imagePath);

                return $path."/".$imageName;
            }
        }


        return "";
    }
    public function uploadMultipleImages(Request $request,$imageName, $path)
{
    $uploadedImages = [];

    if ($request->hasFile($imageName)) {
        foreach ($request->file($imageName) as $image) {
            if ($image->isValid()) {
                // Define the folder path
                $folderPath = public_path($path);

                // Check if the folder exists, if not, create it
                if (!is_dir($folderPath)) {
                    mkdir($folderPath, 0755, true);
                }

                // Generate a unique name for the image
                $extension = $image->getClientOriginalExtension();
                $imageName = rand(111, 99999) . '.' . $extension;
                $imagePath = $folderPath . '/' . $imageName;


                $this->imageManager->read($image)->save($imagePath);

                // Add the image name or path to the uploadedImages array
                $uploadedImages[] = $path."/".$imageName;
            }
        }
    }

    // Return the uploaded images as a JSON string
    return json_encode($uploadedImages);
}
public function deleteImage($imagePath)
{
    // $basePath = public_path('uploads/category_images/');
    // $fullImagePath = $basePath . $imagePath;
    $fullImagePath = $imagePath;

    if (file_exists($fullImagePath)) {
        return unlink($fullImagePath); // Deletes the file
    }

    return false; // File not found or failed to delete
}
}
