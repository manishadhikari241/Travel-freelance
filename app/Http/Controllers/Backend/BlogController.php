<?php

namespace App\Http\Controllers\Backend;

use App\Model\Author;
use App\Model\Blog;
use App\Model\Category;
use App\Model\Image;
use App\Model\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BlogController extends BackendController
{
    public function blogs(Request $request)
    {
        if ($request->isMethod('get'))
        {
            $cat=Category::all();
            $this->data('cat',$cat);
            $tag=Tag::all();
            $this->data('tag',$tag);
            $auth=Author::all();
            $this->data('auth',$auth);
            $blogs=Blog::all();
            $blog=$blogs->unique('title');
            $this->data('blog',$blog);
            return view($this->backendblogpath.'blogs',$this->data);
        }
        if ($request->isMethod('post'))
        {
//            $request->validate([
//                'name'=>'required',
//                'image_upload'=>'required',
//                'tags'=>'required',
//                'category'=>'required',
//                'author'=>'required',
//            ]);
            $data['title']=$request->name;
            $data['description']=$request->description;
            $data['category_id']=$request->category;
            $data['author_id']=$request->author;
            $data['seo_keyword']=$request->seo_key;
            $data['seo_description']=$request->seo_description;
            if ($request->hasfile('image_upload')) {
                foreach ($request->file('image_upload') as $image) {
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path() . '/images/blogs/', $name);
                    $save[] = $name;
                }
            }
            $create = Blog::create($data);
            $last_id=$create->id;
            foreach ($save as $value) {
                $item['image'] = $value;
                $item['blog_id'] = $last_id;
                $img = Image::create($item);
            }
            foreach ($request->tags as $value) {
                $table = DB::table('blog_tags')->insert(['blog_id' => $last_id, 'tag_id' => $value]);
            }

            if($create)
            {
                Session::flash('success','Blog added successfully');
                return redirect()->back();
            }

        }
    }

    public function category(Request $request)
    {
        if ($request->isMethod('get')) {
            $age = Category::all();
            $this->data('cat', $age);
            return view($this->backendblogpath . 'category', $this->data);
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'category' => 'required|unique:categories,name',
            ]);
            $data['name'] = $request->category;
            if (Category::create($data)) {
                Session::flash('success', 'Category added');
                return redirect()->back();
            }
        }
    }

    public function delete_category($id)
    {
        $find = Category::findorfail($id);
        if ($find->delete()) {
            Session::flash('success', 'Category deleted');
            return redirect()->back();
        }
    }

    public function edit_category(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required'
            ]);
            $data['name'] = $request->category;
            $id = $request->id;
            $find = Category::findorfail($id);
            if ($find->update($data)) {
                Session::flash('success', 'Category updated');
                return redirect()->back();
            }
        }
    }

    public function author(Request $request)
    {
        if ($request->isMethod('get')) {
            $cat = Author::all();
            $this->data('author', $cat);
            return view($this->backendblogpath . 'author', $this->data);
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|unique:authors,name',
                'image'=>'required',
            ]);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('images/author/');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
            $data['name'] = $request->name;
            $data['description'] = $request->description;
            if (Author::create($data)) {
                Session::flash('success', 'Author added');
                return redirect()->back();
            }
        }
    }

    public function delete_author($id)
    {
        $find = Author::findorfail($id);
        if ($this->delete_file($id)&&$find->delete()) {
            Session::flash('success', 'Author deleted successfully');
            return redirect()->back();
        }
    }

    public function edit_author(Request $request)
    {
        if ($request->isMethod('get')) {
            $find = Author::where('id', '=', $request->id)->first();
            $this->data('find', $find);
            return view($this->backendblogpath . 'edit_author', $this->data);

        }

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|unique:authors,name,' . $request->name,
                'image' => 'required'
            ]);
            $id = $request->id;
            if ($request->hasFile('image')) {
                $this->delete_file($id);
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('images/author/');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
            $data['name'] = $request->name;
            $data['description'] = $request->description;

            $update = Author::findorfail($id);
            if ($update->update($data)) {
                return redirect()->back()->with('success', 'Author Updated');

            }
        }
    }

    public function delete_file($id)
    {
        $findData = Author::findorfail($id);
        $fileName = $findData->image;
        $deletePath = public_path('images/author/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            unlink($deletePath);
        }
        return true;
    }


    public function tags(Request $request)
    {

        if ($request->isMethod('get')) {
            $tags = Tag::all();
            $this->data('tags', $tags);
            return view($this->backendblogpath . 'tags', $this->data);
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|unique:tags,name',
            ]);
            $data['name'] = $request->name;
            if (Tag::create($data)) {
                Session::flash('success', 'Tags added');
                return redirect()->back();
            }
        }
    }

    public function delete_tags($id)
    {
        $find = Tag::findorfail($id);
        if ($find->delete()) {
            Session::flash('success', 'Tags deleted');
            return redirect()->back();
        }
    }

    public function edit_tags(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required'
            ]);
            $data['name'] = $request->name;
            $id = $request->id;
            $find = Tag::findorfail($id);
            if ($find->update($data)) {
                Session::flash('success', 'Tag updated');
                return redirect()->back();
            }
        }
    }

}

