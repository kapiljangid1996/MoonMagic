<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';

    protected $fillable = ['title', 'slug', 'image', 'caption', 'captioncolor', 'button_text', 'buttoncolor', 'button_url', 'meta_name', 'meta_keyword', 'meta_description', 'sort_order', 'status'];

    public static function addSlide($request)
    {
        $request->validate([
            'title'             => 'required|min:2|max:255|string',
            'slug'              => 'required|min:2|unique:sliders,slug',
            'image'             => 'required',
            'caption'           => 'sometimes|nullable|min:3',
            'button_text'       => 'sometimes|nullable|min:3',
            'button_url'        => 'sometimes|nullable|min:3',
            'meta_name'         => 'sometimes|nullable|min:3|max:255|string',
            'meta_keyword'      => 'sometimes|nullable|min:3',
            'meta_description'  => 'sometimes|nullable|min:3',
        ]);

        $sliders = new Slider();
        $sliders -> title            = request('title');
        $sliders -> slug             = request('slug');
        $sliders -> caption          = request('caption');
        $sliders -> captioncolor     = request('captioncolor');
        $sliders -> button_text      = request('button_text');
        $sliders -> buttoncolor      = request('buttoncolor');
        $sliders -> button_url       = request('button_url');
        $sliders -> meta_name        = (isset($request['meta_name'])) ? $request['meta_name'] : ' ';
        $sliders -> meta_keyword     = (isset($request['meta_keyword'])) ? $request['meta_keyword'] : ' ';
        $sliders -> meta_description = (isset($request['meta_description'])) ? $request['meta_description'] : ' ';
        $sliders -> sort_order       = request('sort_order');
        $sliders -> status           = (isset($request['status'])) ? 1 : 0;

        if (request()->file('image')){
            $imageName =$request->get('slug')."-".request()->image->getClientOriginalName();
            request()->image->move(public_path('Uploads/Slider'), $imageName); 
            $sliders->image = $imageName;
        }
        $sliders->save();
    }

    public static function editSlide($request,$id)
    {
        $request->validate([
            'title'             => 'required|min:2|max:255|string',
            'slug'              => 'required|min:2|unique:sliders,slug,'.$id,
            'caption'           => 'sometimes|nullable|min:3',
            'button_text'       => 'sometimes|nullable|min:3',
            'button_url'        => 'sometimes|nullable|min:3',
            'meta_name'         => 'sometimes|nullable|min:3|max:255|string',
            'meta_keyword'      => 'sometimes|nullable|min:3',
            'meta_description'  => 'sometimes|nullable|min:3',
        ]);

        $sliders = Slider::find($id);
        $sliders -> title               =  $request->input('title');
        $sliders -> slug                =  $request->input('slug');
        $sliders -> caption             =  $request->input('caption');
        $sliders -> captioncolor        =  $request->input('captioncolor');
        $sliders -> button_text         =  $request->input('button_text');
        $sliders -> buttoncolor         =  $request->input('buttoncolor');
        $sliders -> button_url          =  $request->input('button_url');
        $sliders -> meta_name           =  $request->input('meta_name');
        $sliders -> meta_keyword        =  $request->input('meta_keyword');
        $sliders -> meta_description    =  $request->input('meta_description');
        $sliders -> sort_order          =  $request->input('sort_order');
        $sliders -> status              =  (isset($request['status'])) ? 1 : 0;
        $old_image                      =  $request->input('old_image');

        if ($request->file('image')){
            if(!empty($old_image)){
                unlink(public_path("Uploads/Slider/{$old_image}"));
            }
            $slug = $request->get('slug');
            $imageName =$slug.'-'.request()->image->getClientOriginalName();
            request()->image->move(public_path('Uploads/Slider'), $imageName); 
            $sliders->image = $imageName;
        }

        $sliders->save();
    }
}
