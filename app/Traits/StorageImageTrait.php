<?php

namespace App\Traits;
use Storage;

// trait upload file anh
trait StorageImageTrait{
    //nhận vào request, tên của file upload và folder mà ta upload lên
    public function storageTraitUpload($request, $fieldName, $folderName){ // ảnh đại diện, upload 1 ảnh
        // dd($fieldName);

        if($request->hasFile($fieldName)){
           
            $file = $request->$fieldName;

            $filenameOrigin = $file->getClientOriginalname();
            $filenameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/' . $folderName .'/' . auth()->id(), $filenameHash);
            $dataUploadTrait = [
                'file_name' => $filenameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;
        }

        return null;
     
    }

    public function storageTraitUploadMutiple($file,  $folderName){ // upload nhiều file

           
        $filenameOrigin = $file->getClientOriginalname();
        $filenameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('public/' . $folderName .'/' . auth()->id(), $filenameHash);
        $dataUploadTrait = [
            'file_name' => $filenameOrigin,
            'file_path' => Storage::url($filePath)
        ];
        return $dataUploadTrait;
     
    }
}