<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SalesOrder;
use App\Models\SalesOrderDetails;
use App\Models\Supplier;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class InvoiceController extends Controller
{
    public function index()
    {
        $user = Auth::user()->role_id;
       // $sales=Supplier::with('salesOrders')->get();
        //dd($sales);
       // dd($user);
       // dd($supplierID[0]->SupplierID);$supID=$supplierID[0]->SupplierID;
      if ($user==1){
        $salesOrders=SalesOrder::get();
       // dd($salesOrders);
        return view('invoice.index',compact('salesOrders'));
       }
       elseif($user==2){
             
        $supplierID=Supplier::select('SupplierID')
        ->where('userID', '=', $user)
        ->get();
       //dd($supplierID[0]->SupplierID);

        $supplierAccept = SalesOrder::where('Status', 0)
       ->where('Supplier', $supplierID[0]->SupplierID)
       ->get();
       //dd($supplierAccept);
        return view('supplierRole.invoice',compact('supplierAccept'));
       }

    }

    public function create()
    {
        $products =Product::get();
        $suppliers =Supplier::get();


        return view('invoice.create', compact('suppliers', 'products'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'productSupplier' => 'required|string',
            'orderProduct' => 'required',
            'type' => 'required',
           // 'inputs[0][quantity]' => 'required'

        ]);
        $mytime = Carbon::now()->toDateTimeString();
        //dd($request->inputs[1]);
        $supplier = Supplier::where('SupplierName', $request->productSupplier)->firstOrFail();
       //dd($request->productSupplier);
        $lastInsert = [ //DB::table('sales_orders')->insertGetId([
            'Supplier' => $supplier->SupplierID,
            'Description' => $request->orderDesc,
            'PurchaseDate' => $mytime,
            'Status' => 0,
        ];
       // dd($lastInsert);
        $sales = SalesOrder::create($lastInsert);

    

        $test = count($request->inputs);
        $i = 1;
        $id = $sales->PurchaseID;
    
         //dd($id);
        while ($i < $test) {
            //dd($request['inputs'][1]['name']);
            $product = Product::where('ProductName', $request->inputs[$i]['name'])->firstOrFail();
            //dd($product);
            $productPrice = $product->Price;
            $totalPrice = $productPrice * $request->inputs[$i]['quantity'];
            // dd($request->input[$i]);

            $Details = [
                'PurchaseID' => $id,
                'ProductID' => $product->ProductID,
                'Total Amount' => $totalPrice,
                'Unit' => $request->inputs[$i]['unit'],
                'Quantity' => $request->inputs[$i]['quantity'],

            ];


            // Notice the call below
           // dd($Details);
            SalesOrderDetails::create($Details);
            $i = $i + 1;
        }




        //SalesOrder::create($lastInsert);


        return redirect()->back()->with('status', 'Order Created Successfully!');
    }


    public function view(int $id){

        $Orders=SalesOrder::where('PurchaseID', $id)->firstOrFail();
        //$OrderDetails=DB::select('select ProductID from sales_order_details where PurchaseID= ',$id);
        $OrderDetails= DB::table('sales_order_details')
        ->select('*')
        ->where('PurchaseID', '=', $id)
        ->get();

      //  dd($OrderDetails);
        return view('invoice/orderView');

    }



    public function accept(Request $request,int $id){
         //dd($id);
         $accept = SalesOrder::where('PurchaseID',$id)->firstOrFail();
         if($request->status==1){
            $updateDetails=[
                'Status'=> $request->status,
                
            ];
            // Notice the call below
             //dd($updateDetails);
             $accept->update($updateDetails);
        
    
            return redirect()->back()->with('status','Update Done.');
         }
      else{
        return redirect()->back()->with('status',"Can't do this Process. ");
      }
    }




}
