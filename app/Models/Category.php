<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['title', 'slug', 'image', 'short_description', 'meta_name', 'meta_keyword', 'meta_description', 'parent_id', 'status'];

    public static function addCategory($request)
    {
        $request->validate([
            'title'                 => 'required|min:2|max:255|string',
            'slug'                  => 'sometimes|nullable|min:2|unique:categories,slug',
            'image'                 => 'sometimes|nullable',
            'short_description'     => 'sometimes|nullable|min:3',
            'meta_name'             => 'sometimes|nullable|min:3|max:255|string',
            'meta_keyword'          => 'sometimes|nullable|min:3',
            'meta_description'      => 'sometimes|nullable|min:3',
        ]);

        $categories = new Category();
        $categories -> title               = request('title');
        $categories -> slug                = request('slug');
        $categories -> short_description   = request('short_description');
        $categories -> parent_id           = request('parent_id');
        $categories -> meta_name           = (isset($request['meta_name'])) ? $request['meta_name'] : ' ';
        $categories -> meta_keyword        = (isset($request['meta_keyword'])) ? $request['meta_keyword'] : ' ';
        $categories -> meta_description    = (isset($request['meta_description'])) ? $request['meta_description'] : ' ';
        $categories -> status              = (isset($request['status'])) ? 1 : 0;

        if (request()->file('image')){
            $imageName =$request->get('slug')."-".request()->image->getClientOriginalName();
            request()->image->move(public_path('Uploads/Category'), $imageName); 
            $categories->image = $imageName;
        }
        $categories->save();
    }

    public static function editCategory($request,$id)
    {
        $request->validate([
            'title'                 => 'required|min:2|max:255|string',
            'slug'                  => 'required|min:2|unique:categories,slug,'.$id,
            'short_description'     => 'sometimes|nullable|min:3',
            'meta_name'             => 'sometimes|nullable|min:3|max:255|string',
            'meta_keyword'          => 'sometimes|nullable|min:3',
            'meta_description'      => 'sometimes|nullable|min:3',
        ]);

        $categories = Category::find($id);
        $categories -> title               =  $request->input('title');
        $categories -> slug                =  $request->input('slug');
        $categories -> short_description   =  $request->input('short_description');
        $categories -> parent_id           = $request->input('parent_id');
        $categories -> meta_name           =  $request->input('meta_name');
        $categories -> meta_keyword        =  $request->input('meta_keyword');
        $categories -> meta_description    =  $request->input('meta_description');
        $categories -> status              =  (isset($request['status'])) ? 1 : 0;
        $old_image                         =  $request->input('old_image');

        if ($request->file('image')){
            if(!empty($old_image)){
                unlink(public_path("Uploads/Category/{$old_image}"));
            }
            $slug = $request->get('slug');
            $imageName =$slug.'-'.request()->image->getClientOriginalName();
            request()->image->move(public_path('Uploads/Category'), $imageName); 
            $categories->image = $imageName;
        }

        $categories->save();
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id')->with('children');
    }
}
