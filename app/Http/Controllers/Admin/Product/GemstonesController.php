<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Gemstone;
use Illuminate\Http\Request;

class GemstonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gemstones = Gemstone::all();
        return view('admin.product.gemstone-manager.index')->with('gemstones', $gemstones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.gemstone-manager.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gemstones = Gemstone::addGemstone($request);
        return redirect()->route('gemstone-manager.index')->with('success','Gemstone created successfully!');
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
        $gemstones = Gemstone::find($id);
        return view('admin.product.gemstone-manager.edit')->with('gemstones',$gemstones);
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
        $gemstones = Gemstone::editGemstone($request,$id);
        return redirect()->route('gemstone-manager.index')->with('success','Gemstone updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gemstones = Gemstone::findOrFail($id);
        $gemstones->delete();
        return redirect()->route('gemstone-manager.index')->with('success','Gemstone deleted successfully!');
    }
}
