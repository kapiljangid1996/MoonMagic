<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meaning extends Model
{
    use HasFactory;

    protected $table = 'meanings';

    protected $fillable = ['title', 'slug', 'status'];

    public static function addMeaning($request)
    {
        $request->validate([
            'title'  => 'required|min:2|max:255|string',
            'slug'   => 'sometimes|nullable|min:2|unique:meanings,slug',
        ]);

        $meanings = new Meaning();
        $meanings -> title   = request('title');
        $meanings -> slug    = request('slug');
        $meanings -> status  = (isset($request['status'])) ? 1 : 0;
        $meanings->save();
    }

    public static function editMeaning($request,$id)
    {
        $request->validate([
            'title'   => 'required|min:2|max:255|string',
            'slug'    => 'required|min:2|unique:meanings,slug,'.$id,
        ]);

        $meanings = Meaning::find($id);
        $meanings -> title   =  $request->input('title');
        $meanings -> slug    =  $request->input('slug');
        $meanings -> status  =  (isset($request['status'])) ? 1 : 0;
        $meanings->save();
    }
}
