<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index(){
//        $invoice = Invoice::with('user')->first();
//        return response()->json([
//            'data'=> $invoice
//        ]);


//        $invoiceItems = InvoiceItem::with('invoice','product')->where('invoice_id', '=' ,1)->get();
//        return $invoiceItems;

        $invoice = Invoice::with('user','invoiceItems')->first();
       // return ($invoice->getOriginal());
        return response()->json([
            'invoice' => $invoice->getOriginal(),
            'user' => $invoice->user,
            'items'=> $invoice->invoiceItems
        ]);
    }
}
