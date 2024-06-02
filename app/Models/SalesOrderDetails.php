<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrderDetails extends Model
{
    use HasFactory;

    protected $table = "sales_order_details";

    protected $fillable =[
          'PurchaseID',
          'ProductID' ,
          'Total Amount',
          'Unit',
          'Quantity'
    ];
}
