<?php

namespace App\Http\Controllers\Backend;

use App\Model\Advertisement;
use App\Model\Frontslide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SlideController extends BackendController
{
    public function slide_front(Request $request)
    {
        if ($request->isMethod('get')) {
            $slides = Frontslide::orderby('created_at', 'desc')->get();
            $this->data('slides', $slides);
            return view($this->backendpagepath. 'slide.front_slides', $this->data);
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'heading' => 'required|min:3|max:999',
                'short_description' => 'required|min:3|max:1500',
                'front_slide' => 'required'
            ]);
            if ($request->hasFile('front_slide')) {
                $image = $request->file('front_slide');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/slides/');
                $image->move($destinationPath, $name);
            }
            $insert = Frontslide::create([
                'header' => $request->heading,
                'short_description' => $request->short_description,
                'image' => $name
            ]);
            if ($insert) {
                return redirect()->back()->with('success', 'Slides inserted');
            }
        }
        return false;
    }

    public function slide_delete(Request $request)
    {
        $id = $request->id;
        $slide = Frontslide::findorfail($id);
        $delete = $slide->delete();
        if ($this->delete_file($id) && $delete) {
            return redirect()->back()->with('success', 'Slide Deleted');
        }
        return true;
    }

    public function slide_front_edit(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = $request->id;

            $slide = Frontslide::where('id', '=', $id)->first();
            $this->data('slide', $slide);
            return view($this->backendpagepath . 'slide.front_slide_edit', $this->data);
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'heading' => 'required|min:3|max:999',
                'short_description' => 'required|min:3|max:1500'
            ]);
            if ($request->hasFile('front_slide')) {
                $this->delete_file($request->id);
                $image = $request->file('front_slide');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/slides/');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
            $data['header'] = $request->heading;
            $data['short_description'] = $request->short_description;

            $update = Frontslide::where('id', '=', $request->id)->update($data);
            if ($update) {
                return redirect()->route('slide-front')->with('success', 'Slides updated');
            }
        }
    }

    public function delete_file($id)
    {
        $findData = Frontslide::findorfail($id);
        $fileName = $findData->image;
        $deletePath = public_path('images/slides/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            unlink($deletePath);
        }
        return true;
    }

    public function advertisements(Request $request)
    {
    if ($request->isMethod('get'))
    {
        $ad=Advertisement::all();
        $this->data('ads',$ad);
        return view($this->backendpagepath.'ads.advertisement',$this->data);
    }
        if ($request->isMethod('post')) {
            $request->validate([
                'link'=>'required',
                'image'=>'required',
            ]);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('images/advertisement/');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
            $data['link'] = $request->link;
            if (Advertisement::create($data)) {
                Session::flash('success', 'Advertisement added');
                return redirect()->back();
            }
        }

    }

    public function advertisement_edit(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = $request->id;
            $slide = Advertisement::where('id', '=', $id)->first();
            $this->data('ad', $slide);
            return view($this->backendpagepath . 'ads.advertisement_edit', $this->data);
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'link'=>'required',
            ]);
            $id=$request->id;
            if ($request->hasFile('image')) {
                $this->delete_ad($id);
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('images/advertisement/');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
            $data['link'] = $request->link;
            $update = Advertisement::where('id', '=', $request->id)->update($data);
            if ($update) {
                return redirect()->route('advertisement')->with('success', 'Advertisement updated');
            }
        }
    }

    public function advertisement_delete($id)
    {
        $find=Advertisement::findorfail($id);
        if ($this->delete_ad($id)&&$find->delete())
        {
            Session::flash('success','Advertisement deleted');
            return redirect()->back();
        }

    }

    public function delete_ad($id)
    {
        $findData = Advertisement::findorfail($id);
        $fileName = $findData->image;
        $deletePath = public_path('images/advertisement/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            unlink($deletePath);
        }
        return true;
    }

}