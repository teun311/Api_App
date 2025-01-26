<?php

namespace App\Models;

use App\Observers\InvoiceObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


 #[ObservedBy([InvoiceObserver::class])]
class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tracking_no',
        'order_date',
        'due_date',
        'reference',
        'sub_total',
        'discount',
        'total',
        'order_status',
        ];


    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function invoiceItems(){
        return $this->hasMany(InvoiceItem::class,'invoice_id','id');
    }
}
