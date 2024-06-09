<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;
    protected $table = "sales_orders";

    protected $primaryKey = 'PurchaseID';


    protected $fillable =[
          'Supplier' ,
          'Status',
          'Description',
          'PurchaseDate'
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class ,'SupplierID');
    }
}
