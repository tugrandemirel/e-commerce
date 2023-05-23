<?php

namespace App\Helpers;

class ImageHelper
{
    private string $imagePath ;
    private object $imageFile;
    private string $oldImageFile;
    private string $userNameId;

    //example  ImageHelper('category', $request->file('image'), $category->image)
    public function __construct(string $imagePath, object $imageFile, string $userNameId ,string $oldImageFile = '')
    {
        $this->imagePath = $imagePath;
        $this->imageFile = $imageFile;
        $this->userNameId = $userNameId;
        $this->oldImageFile = isset($oldImageFile) ? $oldImageFile : null;
    }

    public function insertAndUpdateImage()
    {
        if($this->oldImageFile != null && file_exists(public_path($this->oldImageFile)))
            unlink(public_path($this->oldImageFile));

        if(!file_exists(public_path($this->imagePath)))
            $this->createFolder($this->imagePath);
        if (!file_exists($this->imagePath . '/'. $this->userNameId))
            $this->createFolder($this->imagePath . '/'. $this->userNameId);
        if (!file_exists($this->imagePath . '/'. $this->userNameId . '/'. date('Y')))
            $this->createFolder($this->imagePath . '/'. $this->userNameId . '/'. date('Y'));
        if (!file_exists($this->imagePath . '/'. $this->userNameId . '/'. date('Y') . '/'. date('m')))
            $this->createFolder($this->imagePath . '/'. $this->userNameId . '/'. date('Y') . '/'. date('m'));
        /*
         *  buraya kadar olan kısımda örneğin Seller/Tugran1/2023/5 şeklinde bir yol oluşturduk bu şekilde her kullanıcıya ait klasörleme sistemi olacak
         * */

        $imageName = time() . '.' . $this->imageFile->getClientOriginalExtension();
        $path = $this->imagePath . '/'. $this->userNameId . '/'. date('Y') . '/'. date('m') . '/' . $imageName;
        $this->imageFile->move(public_path($this->imagePath . '/'. $this->userNameId . '/'. date('Y') . '/'. date('m')), $imageName);
        return $path;
    }

    public function deleteImage($imagePath)
    {
        if($imagePath != null && file_exists(public_path($imagePath)))
            unlink(public_path($imagePath));
    }

    private function createFolder($folderName)
    {
        try {
            mkdir(public_path($folderName), 0777, true);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }

    }
}
