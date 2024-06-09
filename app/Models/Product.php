<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $table ='products';
    protected $primaryKey = 'ProductID';
    protected $fillable=[
        'ProductName',
        'SupplierID',
        'CategoryID',
        'SkuID',
        'Unit',
        'Price'

];

    public function category(){
        return $this->belongsTo(Category::class,'CategoryID','CategoryID');
    }
}

