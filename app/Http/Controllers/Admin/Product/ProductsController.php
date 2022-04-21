<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\ProductMedia;
use App\Models\Product\Gemstone;
use App\Models\Product\Material;
use App\Models\Product\Meaning;
use App\Models\Product\Shape;
use App\Models\Category;
use Illuminate\Http\Request;
use File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gemstones  = Gemstone::where('status', 1)->get();
        $materials  = Material::where('status', 1)->get();
        $meanings   = Meaning::where('status', 1)->get();
        $shapes     = Shape::where('status', 1)->get();
        $categories = Category::with('children')->with('parent')->where('status', 1)->get();
        return view('admin.product.add')->with('gemstones', $gemstones)->with('materials', $materials)->with('meanings', $meanings)->with('shapes', $shapes)->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = Product::addProduct($request);
        return redirect()->route('product.index')->with('success','Product created successfully!');
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
        $products   = Product::with('productImages')->find($id);
        $gemstones  = Gemstone::where('status', 1)->get();
        $materials  = Material::where('status', 1)->get();
        $meanings   = Meaning::where('status', 1)->get();
        $shapes     = Shape::where('status', 1)->get();
        $categories = Category::with('children')->with('parent')->where('status', 1)->get();
        return view('admin.product.edit')->with('products', $products)->with('gemstones', $gemstones)->with('materials', $materials)->with('meanings', $meanings)->with('shapes', $shapes)->with('categories', $categories);
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
        $products = Product::editProduct($request,$id);
        return redirect()->route('product.index')->with('success','Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::findOrFail($id);

        $productImages = ProductMedia::where('product_id', $id)->get();        

        if ( !empty($productImages) ) {
            foreach ($productImages as $key => $value) {
                if ( !empty($value['media']) ) {
                    $files = array("public/Uploads/Product/".$products['slug']."/Image/".$value['media'], "public/Uploads/Product/".$products['slug']."/Video/".$value['media']);
                    File::delete($files);
                }
            }
        }

        $products->delete();

        $productImages = ProductMedia::where('product_id', $id)->delete();

        return redirect()->route('product.index')->with('success','Product deleted successfully!');
    }

    public function removeProductMedia($id)
    {
        $images = ProductMedia::findOrFail($id);
        $products = Product::where('id', $images['product_id'])->get();
        if ( !empty($images) ) {
            $files = array("public/Uploads/Product/".$products[0]['slug']."/Image/".$images['media'], "public/Uploads/Product/".$products[0]['slug']."/Video/".$images['media']);
            File::delete($files);
        }       
        $images->delete();
        echo "Media Deleted Successfully";
    }
}
