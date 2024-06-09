<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
//Retun All Of Products----------------------------------------------------------------------------------

    public function index(){
        $products = Product::with('category')
        ->orderBy('ProductID','asc')
        ->paginate(5);
        //$product=DB::select("select products.ProductID,products.SkuID,products.ProductName,categories.CategoryName from products join categories on products.CategoryID=categories.CategoryID")->paginate(10);
        return view('product/index',compact("products"));
     
    }

    public function create(){

        $categories=Category::get();
        $suppliers=Supplier::get();

        return view('product/create',compact('categories','suppliers'));

    }



//Store New Products-----------------------------------------------------------------------------

    public function store(Request $request){

        $messages=[
            'productName.required'=>'You must input product name here'
        ];

        $request->validate([
            'productName.required'=>'required|max:255|string',
            'productCategory'=>'required|max:50|string',
            'productSkuID'=>'required|string',
            'productSupplier'=>'required|string'
        ],$messages);
       
       $category=Category::where('CategoryName',$request->productCategory)->firstOrFail();
       $supplier=Supplier::where('SupplierName',$request->productSupplier)->firstOrFail();
        
        $updateDetails=[
            'ProductName'=> $request->productName,
            'CategoryID'=> $category->CategoryID,
            'SkuID'=> $request->productSkuID,
            'SupplierID'=> $supplier->SupplierID
        ];
        // Notice the call below
         //dd($updateDetails);
         Product::create($updateDetails);
    

        return redirect()->back()->with('status','Product Created Successfully!');
       
       
    }


// Edit Product-------------------------------------------------------------------------------------

    public function edit(int $id){

        
      $product=Product::where('ProductID', $id)->firstOrFail();
      $productCategory=Category::where('CategoryID', $product->CategoryID)->firstOrFail();
      $productSupplier=Supplier::where('SupplierID', $product->SupplierID)->firstOrFail();
      $categories=Category::get();
      $suppliers=Supplier::get();
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

// View Product---------------------------------------------------------------------------------------
    public function view(int $id){
       
        
       
        return view('product/details');
    }
// Search Product-------------------------------------------------------------------------------------
    public function search(Request $request){
       
        $search=$request->search;
        $searchProduct=Product::where(function($query) use ($search){
             
            $query->where('ProductName','like',"%$search%")
            ->orWhere('SkuID','like',"%$search%");
        })->get();
       
        
    }


    

        
    
}
