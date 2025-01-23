<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SuccessResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Spatie\ErrorSolutions\get;
use function Symfony\Component\Mime\Header\all;
use function Symfony\Component\Mime\Part\getFilename;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest('id')->get();
        return response()->json([
            'success'=> true,
            'message'=>'data retrive successfully',
            'data'=>$products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        $new_product = $request->validated();
        $image = $request->file('image');
        //dd($image) ;

        $image = array_key_exists('image',$new_product)
            ? Storage::disk('images')->putFileAs('/',$image, time().'-'.rand(1,9999).'.'.$image->extension())
            :'';
        $new_product['image'] = $image;
        $product = Product::create($new_product);
        return (new ProductResource(['message'=>'product insert successfully','data'=>$product]))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return (new ProductResource(['data'=>$product]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $upadated_product =$request->validated();
        $image = $request->file('image');

        $image = (array_key_exists('image',$upadated_product)
            ?Storage::disk('images')->delete($product->image) :'')
            ?Storage::disk('images')->putFileAs('/',$image,time().'-'.rand(1,9999).'.'.$image->extension()) :$product->image;
       // dd($image);
        $upadated_product['image']= $image;
        $product->update($upadated_product);
        return (new ProductResource(['message'=> 'Product update successfully','data'=>$product]))->response()->setStatusCode(201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::disk('image')->delete($product->image);
        $product->delete();
        return (new SuccessResource(['message'=>'product deleted successsfully']));
    }
}
