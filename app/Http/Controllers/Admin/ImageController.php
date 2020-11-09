<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function uploadPhoto(Request $request)
    {
        $imageName = Image::make($request->image)
            ->resize($request->width, $request->height)
            ->encode('jpg', 50);
        Storage::disk('local')->put('public/' . $request->path .'/'. $request->image->hashName(), (string) $imageName, 'public');
        return $request->image->hashName();
    }

    public function removePhoto(Request $request)
    {
        Storage::disk('local')->delete('public/' . $request->path .'/'. $request->image);
        return "Removed";
    }

    public function removeDataImage(Request $request)
    {
        $data = Data::findOrFail($request->data_id);
        $imagesName = explode('|', $data->image);
        $newImagesName = '';
        for ($i = 0;$i < count($imagesName); $i++) {
            if ($imagesName[$i] != $request->id && $imagesName[$i] != '') {
                $newImagesName .= $imagesName[$i] . '|';
            }
        }
        $data->update(['image' => $newImagesName]);
        Storage::disk('local')->delete('public/data/' . $request->id);
        return "Removed";
    }

    public function uploadDataImages(Request $request)
    {
        $imageName = Image::make($request->file)
            ->resize($request->width, $request->height)
            ->encode('jpg');
        Storage::disk('local')->put('public/data/'.$request->file->hashName(), (string) $imageName, 'public');
        return response()->json([
            'name'          => $request->file->hashName(),
            'original_name' => $request->file->getClientOriginalName()
        ]);
    }

    public function uploadClientImage(Request $request)
    {
        $file_tmp =$_FILES['image']['tmp_name'];
        $imageName = Image::make($request->image)
            ->resize($request->width, $request->height)->encode('png');

        Storage::disk('local')->put('public/' . $request->path .'/'. $request->image->hashName(), (string) $imageName, 'public');
//        move_uploaded_file($file_tmp,'public/' . $request->path . '/' . $request->image->hashName());
        return $request->image->hashName();
    }
}
