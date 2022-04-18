<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gemstone extends Model
{
    use HasFactory;

    protected $table = 'gemstones';

    protected $fillable = ['title', 'slug', 'status'];

    public static function addGemstone($request)
    {
        $request->validate([
            'title'  => 'required|min:2|max:255|string',
            'slug'   => 'sometimes|nullable|min:2|unique:gemstones,slug',
        ]);

        $gemstones = new Gemstone();
        $gemstones -> title   = request('title');
        $gemstones -> slug    = request('slug');
        $gemstones -> status  = (isset($request['status'])) ? 1 : 0;
        $gemstones->save();
    }

    public static function editGemstone($request,$id)
    {
        $request->validate([
            'title'   => 'required|min:2|max:255|string',
            'slug'    => 'required|min:2|unique:gemstones,slug,'.$id,
        ]);

        $gemstones = Gemstone::find($id);
        $gemstones -> title   =  $request->input('title');
        $gemstones -> slug    =  $request->input('slug');
        $gemstones -> status  =  (isset($request['status'])) ? 1 : 0;
        $gemstones->save();
    }
}
