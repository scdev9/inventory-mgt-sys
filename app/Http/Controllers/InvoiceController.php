<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SalesOrder;
use App\Models\SalesOrderDetails;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoice.index');
    }

    public function create()
    {
        $products = DB::select('select * from products');
        $suppliers = DB::select('select * from suppliers');


        return view('invoice.create', compact('suppliers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'productName' => 'required|max:255|string',
            'productSupplier' => 'required|string',
            'orderProduct'=>'required',
            'type'=>'required',
            'inputs[0][quantity]'=>'required'

        ]);
        $mytime = Carbon::now()->toDateTimeString();
        // dd($request->inputs[1]);
        $supplier = Supplier::where('SupplierName', $request->productSupplier)->firstOrFail();

        $lastInsert = [ //DB::table('sales_orders')->insertGetId([
            'Supplier' => $supplier->SupplierID,
            'Description' => $request->orderDesc,
            'Purchase Date' => $mytime,
            'Status' => 0,
        ];
        $sales=SalesOrder::create($lastInsert);



        $test = count($request->inputs);
        $i = 1;
        $id = $sales->id;
       

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
            //dd($updateDetails);
            SalesOrderDetails::create($Details);
            $i = $i + 1;
        }




        //SalesOrder::create($lastInsert);


        return redirect()->back()->with('status', 'Order Created Successfully!');
    }
}
