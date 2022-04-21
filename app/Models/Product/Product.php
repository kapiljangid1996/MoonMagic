<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['title', 'slug', 'price', 'size', 'description', 'gem_info', 'category_id', 'material_id', 'gemstone_id', 'birthstone', 'shape_id', 'meaning_id', 'ring_size', 'meta_name', 'meta_keyword', 'meta_description', 'shipping', 'featured', 'status'];

    public static function addProduct($request)
    {
        $request->validate([
            'title'             => 'required|min:2|max:255|string',
            'slug'              => 'sometimes|nullable|min:2|unique:products,slug',
            'media'             => 'sometimes|nullable',
            'size'              => 'sometimes|nullable',
            'description'       => 'sometimes|nullable|min:3',
            'meta_name'         => 'sometimes|nullable|min:3|max:255|string',
            'meta_keyword'      => 'sometimes|nullable|min:3',
            'meta_description'  => 'sometimes|nullable|min:3',
        ]);

        $products = new Product();
        $products -> title              = request('title');
        $products -> slug               = request('slug');
        $products -> price              = request('price');
        $products -> description        = request('description');
        $products -> gem_info           = request('gem_info');
        $products -> category_id        = request('category_id');
        $products -> material_id        = request('material_id');
        $products -> gemstone_id        = request('gemstone_id');
        $products -> birthstone         = request('birthstone');
        $products -> shape_id           = request('shape_id');
        $products -> meaning_id         = request('meaning_id');
        $products -> ring_size          = request('ring_size');
        $products -> meta_name          = (isset($request['meta_name'])) ? $request['meta_name'] : ' ';
        $products -> meta_keyword       = (isset($request['meta_keyword'])) ? $request['meta_keyword'] : ' ';
        $products -> meta_description   = (isset($request['meta_description'])) ? $request['meta_description'] : ' ';
        $products -> shipping           = (isset($request['shipping'])) ? 1 : 0;
        $products -> featured           = (isset($request['featured'])) ? 1 : 0;
        $products -> status             = (isset($request['status'])) ? 1 : 0;
        $products -> save();

        $lastInsertedId         = $products -> id;
        $lastInsertedProductSlug   = $products -> slug;

        if (request()->file('media')){
            foreach($request->file('media') as $key => $file) {

                $data = new ProductMedia();

                $data -> product_id = $lastInsertedId;

                $mime_type = $file->getMimeType();

                if ($mime_type == 'image/jpeg') {
                    $data -> media_type = 'Image';
                    $imageName = time()."-".$file->getClientOriginalName();
                    $file->move(public_path('Uploads/Product/'.$lastInsertedProductSlug .'/Image'), $imageName); 
                    $data -> media = $imageName;
                }

                elseif ($mime_type == 'video/mp4') { 
                    $data -> media_type = 'Video';
                    $vidoeName = time()."-".$file->getClientOriginalName();
                    $file->move(public_path('Uploads/Product/'.$lastInsertedProductSlug .'/Video'), $vidoeName); 
                    $data -> media = $vidoeName;
                }

                $data->save();
            }
        }        
    }

    public static function editProduct($request,$id) 
    {
        $request->validate([
            'title'             => 'required|min:2|max:255|string',
            'slug'              => 'sometimes|nullable|min:2|unique:products,slug,'.$id,
            'media'             => 'sometimes|nullable',
            'size'              => 'sometimes|nullable',
            'description'       => 'sometimes|nullable|min:3',
            'meta_name'         => 'sometimes|nullable|min:3|max:255|string',
            'meta_keyword'      => 'sometimes|nullable|min:3',
            'meta_description'  => 'sometimes|nullable|min:3',
        ]);

        $products = Product::find($id);
        $products -> title              = request('title');
        $products -> slug               = request('slug');
        $products -> price              = request('price');
        $products -> description        = request('description');
        $products -> gem_info           = request('gem_info');
        $products -> category_id        = request('category_id');
        $products -> material_id        = request('material_id');
        $products -> gemstone_id        = request('gemstone_id');
        $products -> birthstone         = request('birthstone');
        $products -> shape_id           = request('shape_id');
        $products -> meaning_id         = request('meaning_id');
        $products -> ring_size          = request('ring_size');
        $products -> meta_name          = (isset($request['meta_name'])) ? $request['meta_name'] : ' ';
        $products -> meta_keyword       = (isset($request['meta_keyword'])) ? $request['meta_keyword'] : ' ';
        $products -> meta_description   = (isset($request['meta_description'])) ? $request['meta_description'] : ' ';
        $products -> shipping           = (isset($request['shipping'])) ? 1 : 0;
        $products -> featured           = (isset($request['featured'])) ? 1 : 0;
        $products -> status             = (isset($request['status'])) ? 1 : 0;
        $products -> save();

        if ( request()->file('media') ) {
            foreach($request->file('media') as $key => $file) {

                $data = new ProductMedia();

                $data -> product_id = $id;

                $mime_type = $file->getMimeType();

                if ($mime_type == 'image/jpeg') {
                    $data -> media_type = 'Image';
                    $imageName = time()."-".$file->getClientOriginalName();
                    $file->move(public_path('Uploads/Product/'.request('slug').'/Image'), $imageName); 
                    $data -> media = $imageName;
                }

                elseif ($mime_type == 'video/mp4') { 
                    $data -> media_type = 'Video';
                    $vidoeName = time()."-".$file->getClientOriginalName();
                    $file->move(public_path('Uploads/Product/'.request('slug').'/Video'), $vidoeName); 
                    $data -> media = $vidoeName;
                }

                $data->save();
            }
        }
    }

    public function productImages()
    {
        return $this->hasMany('App\Models\Product\ProductMedia');
    }
}
