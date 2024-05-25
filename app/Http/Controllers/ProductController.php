<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
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



    public function create(){
        return view('product/create');
    }


    public function edit(int $id){

        
      $product=Product::where('ProductID', $id)->firstOrFail();
      $productCategory=Category::where('CategoryID', $product->CategoryID)->firstOrFail();
      $productSupplier=Supplier::where('SupplierID', $product->SupplierID)->firstOrFail();
      $categories=DB::select('select * from categories') ;
      $suppliers=DB::select('select * from suppliers');
      // dd($categories);
       
        return view('product/update',compact('product','productCategory','categories','suppliers','productSupplier'));
    }

    public function update(Request $request,int $id){

        $request->validate([
            'productName'=>'required|max:255|string',
            'productCategory'=>'required|max:50|string',
            'productSkuID'=>'required|string',
            'productSupplier'=>'required|string'
        ]);
      
       
        $product = Product::where('ProductID',$id)->firstOrFail();
        
        $updateDetails=[
            'ProductName'=> $request->productName,
            'CategoryID'=> $product->CategoryID,
            'SkuID'=> $request->productSkuID,
            'SupplierID'=> $product->SupplierID
        ];
        // Notice the call below
         //dd($updateDetails);
         $product->update($updateDetails);
    

        return redirect()->back()->with('status','Update Done.');
       
       
    }


    public function view(int $id){
       
        
       
        return view('product/details');
    }


        
    
}
