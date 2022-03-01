<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Student;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $products;
    protected $name;

    public function index()
    {
        return view('product.add');
    }
    public function createProduct(Request $request)
    {

        Product::newProduct($request);

        return redirect()->back()->with('massage', 'product info save successfully');

        //return redirect('/add-product')->with('massage', 'product info save successfully');


    }
    public function manageProduct()
    {

        $this->products = Product::orderBy('id','desc')->get();

        return view('product.manage-product',['products'=> $this->products]);


    }
    public function updateProduct(Request $request ,$id)
    {
        Product::updateProduct($request,$id);
        return redirect('/manage-product')->with('massage','product info update successfully');
    }
    public function editProduct($id)
    {

        $this->product = Product::find($id);
        return view('product.edit-product',['product' => $this->product]);
    }
    public function deleteProduct($id)
    {
        $this->product = Product::find($id);
        $this->product->delete();
        return redirect('/manage-product')->with('massage','product info delete successfully');

    }
}
