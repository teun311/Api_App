<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index(){
        //single invoice
//        $invoice = Invoice::with('user')->first();
//        return response()->json([
//            'data'=> $invoice
//        ]);


//        $invoiceItems = InvoiceItem::with('invoice','product')->where('invoice_id', '=' ,1)->get();
//        return $invoiceItems;
        //sigle invoice with all product
        $invoice = Invoice::with('user','invoiceItems')->first();
       // return ($invoice->getOriginal());
        return response()->json([
            'invoice' => $invoice->getOriginal(),
            'user' => $invoice->user,
            'items'=> $invoice->invoiceItems
        ]);
    }

    public function store(){
//        $data = [
//            ['invoice_id'=>1,'product_id'=> 11,'unit_price'=>100,'quantity'=>2],
//            ['invoice_id'=>1,'product_id'=> 10,'unit_price'=>150,'quantity'=>1],
//            ['invoice_id'=>1,'product_id'=> 9,'unit_price'=>50,'quantity'=>3],
//        ];


    }
}
