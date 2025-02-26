<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductList;

class ProductController extends Controller
{
    //
    function index(){
        $products = ProductList::with('category')->get();
        return view('product', compact('products'));
    }

    function add_product(Request $req){
        $category = new Category();
        $category->name = $req->category;
        $category->save();

        foreach($req->product_name as $value){
            $product = new ProductList();
            $product->name = $value;
            $product->category_id = $category->id;
            $product->user_id = session('user')->id ?? 1;
            $product->save();
        }
        session()->flash('success', 'บันทึกสินค้าสำเร็จ!');
        return redirect('/product');
    }

}
