<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materials';

    protected $fillable = ['title', 'slug', 'status'];

    public static function addMaterial($request)
    {
        $request->validate([
            'title'  => 'required|min:2|max:255|string',
            'slug'   => 'sometimes|nullable|min:2|unique:materials,slug',
        ]);

        $materials = new Material();
        $materials -> title   = request('title');
        $materials -> slug    = request('slug');
        $materials -> status  = (isset($request['status'])) ? 1 : 0;
        $materials->save();
    }

    public static function editMaterial($request,$id)
    {
        $request->validate([
            'title'   => 'required|min:2|max:255|string',
            'slug'    => 'required|min:2|unique:materials,slug,'.$id,
        ]);

        $materials = Material::find($id);
        $materials -> title   =  $request->input('title');
        $materials -> slug    =  $request->input('slug');
        $materials -> status  =  (isset($request['status'])) ? 1 : 0;
        $materials->save();
    }
}
