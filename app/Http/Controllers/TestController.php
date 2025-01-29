<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use function League\Flysystem\map;
use function Spatie\ErrorSolutions\get;
use function Symfony\Component\Translation\t;

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
        $formData = [
            'user_id'=> 3 ,
            'tracking_no'=> 111001 ,
            'order_date'=> date('Y-m-d') ,
            'due_date'=> date('Y-m-d') ,
            'reference'=> "emp" ,
            'sub_total'=> 600 ,
            'discount'=> 10 ,
            'total'=> 540 ,
            'order_status'=> 1 ,
            'items' =>[
                ['invoice_id'=> '','product_id'=> 11,'unit_price'=>100,'quantity'=>2],
                ['invoice_id'=> '','product_id'=> 12,'unit_price'=>150,'quantity'=>1],
                ['invoice_id'=> '','product_id'=> 13,'unit_price'=>50,'quantity'=>3]
            ]


        ];

        $invoice= Invoice::orderBy('id','DESC')->first();
        $invoice ?$invoice =$invoice->id+1 : 1;
      //  dd($invoice);

       foreach ($formData as $key=>$value){
           if (is_array($value)){
               $newItems = $value;
              unset($formData[$key]);
           }
       }
       $newItems = data_set($newItems,'*.invoice_id',$invoice);

       $newInvoice = Invoice::create($formData);
       foreach ($newItems as $item){
           InvoiceItem::create($item);
       }
        return response()->json([
            'success' =>'ok',
            'status' => 201,
            'data'=>$newInvoice
            ]);



        //$itemList=data_get($formData,'items');
        // $itemList=data_set($formData['items'],'*.invoice_id',7);



//       foreach ($data as $items){
//           ($items['product_id']);
//        }
      //  return $test;
    }
}
