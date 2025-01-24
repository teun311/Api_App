<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
      'invoice_id','product_id','unit_price','quantity'
    ];


    public function invoice(){
        return $this->hasOne(Invoice::class,'id','invoice_id');
    }

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
