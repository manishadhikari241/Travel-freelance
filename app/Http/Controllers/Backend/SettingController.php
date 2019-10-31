<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Configuration;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class SettingController extends BackendController
{
    public function setting_page(Request $request)
    {
        if ($request->isMethod('get')) {

            return view($this->backendpagepath . 'setting', $this->data);
        }
        if ($request->isMethod('post')) {

            $inputs = $request->only(
                'about', 'mission','vision','objective','twitter_link', 'googleplus_link', 'instagram_link', 'facebook_link', 'contact_no', 'address', 'website', 'email', 'site_title', 'site_description','regulation','recognition','price','link'
            );
            if ($request->hasfile('about_image_1')) {
                $this->delete_file('about_image_1');
                $image = $request->file('about_image_1');
                $ext = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('images/');
                $makefile = Image::make($image);
                $save = $makefile->resize(500, '500', function ($ar) {
                    $ar->aspectRatio();
                })->save($destinationPath . '/' . $ext);
                $data = $ext;
                $aboutimage = Configuration::updateorcreate(['configuration_key' => 'about_image_1'], ['configuration_value' => $data]);
            }

            foreach ($inputs as $key => $value) {
                $updateorcreate = Configuration::updateorcreate(['configuration_key' => $key], ['configuration_value' => $value]);
            }
            if ($updateorcreate) {
                return redirect()->back()->with('success', 'Settings Saved');
            }
        }
        return false;
    }

    public function delete_file($id)
    {
        $findData = Configuration::where('configuration_key', '=', $id)->first();
        if (!$findData) {
            return true;
        }
        $fileName = $findData->configuration_value;
        $deletePath = public_path('images/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            unlink($deletePath);
        }
        return true;
    }


}
