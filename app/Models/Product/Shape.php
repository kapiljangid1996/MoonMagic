<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shape extends Model
{
    use HasFactory;

    protected $table = 'shapes';

    protected $fillable = ['title', 'slug', 'status'];

    public static function addShape($request)
    {
        $request->validate([
            'title'  => 'required|min:2|max:255|string',
            'slug'   => 'sometimes|nullable|min:2|unique:shapes,slug',
        ]);

        $shapes = new Shape();
        $shapes -> title   = request('title');
        $shapes -> slug    = request('slug');
        $shapes -> status  = (isset($request['status'])) ? 1 : 0;
        $shapes->save();
    }

    public static function editShape($request,$id)
    {
        $request->validate([
            'title'   => 'required|min:2|max:255|string',
            'slug'    => 'required|min:2|unique:shapes,slug,'.$id,
        ]);

        $shapes = Shape::find($id);
        $shapes -> title   =  $request->input('title');
        $shapes -> slug    =  $request->input('slug');
        $shapes -> status  =  (isset($request['status'])) ? 1 : 0;
        $shapes->save();
    }
}
