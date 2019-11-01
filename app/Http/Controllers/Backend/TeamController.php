<?php

namespace App\Http\Controllers\Backend;

use App\Model\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TeamController extends BackendController
{
    public function team(Request $request)
    {
        if ($request->isMethod('get'))
        {
            $team=Team::all();
            $this->data('team',$team);
            return view($this->backendpagepath.'team.team',$this->data);
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
//                'description' => 'required',
                'image' => 'required'
            ]);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('images/team/');
                $image->move($destinationPath, $name);
                $data['image'] = $name;

            }
            $data['name'] = $request->name;
            $data['description'] = $request->description;
            $create = Team::create($data);
            if ($create) {
                Session::flash('success', 'Team Added Successfully');
                return redirect()->back();
            }

        }
    }
    public function delete_team($id)
    {
        $find = Team::findorfail($id);
        if ($this->delete_file($id)&& $find->delete()) {
            Session::flash('success', 'Team deleted successfully');
            return redirect()->back();
        }
    }

    public function edit_team(Request $request)
    {
        if ($request->isMethod('get')) {
            $finddata = Team::where('id', '=', $request->id)->first();
            $this->data('team', $finddata);
            return view($this->backendpagepath . 'team.edit_team', $this->data);
        }
        if ($request->isMethod('post')) {
            $id = $request->id;
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);
            if ($request->hasFile('image')) {
                $this->delete_file($id);
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/team/');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
            $data['name'] = $request->name;
            $data['description'] = $request->description;

            $create = Team::findorfail($id);


            if ($create->update($data)) {
                return redirect()->back()->with('success', 'Team Updated');
            }
        }
    }

    public function delete_file($id)
    {
        $findData = Team::findorfail($id);
        $fileName = $findData->image;
        $deletePath = public_path('images/team/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            unlink($deletePath);
        }
        return true;
    }
}
