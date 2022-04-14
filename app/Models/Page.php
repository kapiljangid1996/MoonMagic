<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $fillable = ['title', 'slug', 'media', 'description', 'meta_name', 'meta_keyword', 'meta_description', 'publish'];

    public static function addPage($request)
    {
        $request->validate([
            'title'             => 'required|min:2|max:255|string',
            'slug'              => 'sometimes|nullable|min:2|unique:pages,slug',
            'media'             => 'sometimes|nullable',
            'description'       => 'sometimes|nullable|min:3',
            'meta_name'         => 'sometimes|nullable|min:3|max:255|string',
            'meta_keyword'      => 'sometimes|nullable|min:3',
            'meta_description'  => 'sometimes|nullable|min:3',
        ]);

        $pages = new Page();
        $pages -> title             = request('title');
        $pages -> slug              = request('slug');
        $pages -> description       = request('description');
        $pages -> meta_name         = (isset($request['meta_name'])) ? $request['meta_name'] : ' ';
        $pages -> meta_keyword      = (isset($request['meta_keyword'])) ? $request['meta_keyword'] : ' ';
        $pages -> meta_description  = (isset($request['meta_description'])) ? $request['meta_description'] : ' ';
        $pages -> publish           = (isset($request['publish'])) ? 1 : 0;

        if (request()->file('media')){
            $mime_type = $request->file('media')->getMimeType();

            if ($mime_type == 'image/jpeg') {
                $imageName =$request->get('slug')."-".request()->media->getClientOriginalName();
                request()->media->move(public_path('Uploads/Page/Image'), $imageName); 
                $pages->media = $imageName;
            } 
            elseif ($mime_type == 'video/mp4') {
                $vidoeName =$request->get('slug')."-".request()->media->getClientOriginalName();
                request()->media->move(public_path('Uploads/Page/Video'), $vidoeName); 
                $pages->media = $vidoeName;
            }                
        }
        $pages->save();
    }

    public static function editPage($request,$id)
    {
        $request->validate([
            'title'             => 'required|min:2|max:255|string',
            'slug'              => 'required|min:2|unique:pages,slug,'.$id,
            'description'       => 'sometimes|nullable|min:3',
            'meta_name'         => 'sometimes|nullable|min:3|max:255|string',
            'meta_keyword'      => 'sometimes|nullable|min:3',
            'meta_description'  => 'sometimes|nullable|min:3',
        ]);

        $pages = Page::find($id);
        $pages -> title              =  $request->input('title');
        $pages -> slug               =  $request->input('slug');
        $pages -> description        =  $request->input('description');
        $pages -> meta_name          =  $request->input('meta_name');
        $pages -> meta_keyword       =  $request->input('meta_keyword');
        $pages -> meta_description   =  $request->input('meta_description');
        $pages -> publish            =  (isset($request['publish'])) ? 1 : 0;
        $old_media                   =  $request->input('old_media');

        if ($request->file('media')){

            $mime_type_old = pathinfo($old_media, PATHINFO_EXTENSION);

            if(!empty($old_media)){
                if ($mime_type_old == 'mp4') {
                    unlink(public_path("Uploads/Page/Video/{$old_media}"));
                }  
                else {
                    unlink(public_path("Uploads/Page/Image/{$old_media}"));
                }              
            }
            
            $mime_type = $request->file('media')->getMimeType();

            if ($mime_type == 'image/jpeg') {
                $imageName =$request->get('slug')."-".request()->media->getClientOriginalName();
                request()->media->move(public_path('Uploads/Page/Image'), $imageName); 
                $pages->media = $imageName;
            } 
            elseif ($mime_type == 'video/mp4') {
                $vidoeName =$request->get('slug')."-".request()->media->getClientOriginalName();
                request()->media->move(public_path('Uploads/Page/Video'), $vidoeName); 
                $pages->media = $vidoeName;
            } 
        }

        $pages->save();
    }
}
