<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Meaning;
use Illuminate\Http\Request;

class MeaningsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meanings = Meaning::all();
        return view('admin.product.meaning-manager.index')->with('meanings', $meanings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.meaning-manager.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meanings = Meaning::addMeaning($request);
        return redirect()->route('meaning-manager.index')->with('success','Meaning created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meanings = Meaning::find($id);
        return view('admin.product.meaning-manager.edit')->with('meanings',$meanings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $meanings = Meaning::editMeaning($request,$id);
        return redirect()->route('meaning-manager.index')->with('success','Meaning updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meanings = Meaning::findOrFail($id);
        $meanings->delete();
        return redirect()->route('meaning-manager.index')->with('success','Meaning deleted successfully!');
    }
}
