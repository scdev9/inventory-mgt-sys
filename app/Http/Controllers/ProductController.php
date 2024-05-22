<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //Retun View Of Products
    public function index(){
        $products = DB::table('products')
        ->join('categories', 'products.CategoryID', '=', 'categories.CategoryID')
        ->select('products.ProductID','products.SkuID','products.ProductName','categories.CategoryName')
        ->orderBy('ProductID','asc')
        ->paginate(5);
        //$product=DB::select("select products.ProductID,products.SkuID,products.ProductName,categories.CategoryName from products join categories on products.CategoryID=categories.CategoryID")->paginate(10);
        return view('product/index',compact("products"));
     
    }
}
