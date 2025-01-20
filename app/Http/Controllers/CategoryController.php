<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SuccessResource;
use App\Models\Category;
use Illuminate\Http\Request;
use function Nette\Utils\data;
use function Symfony\Component\Uid\Factory\create;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryies = Category::all();
        return (new CategoryResource(['data'=>$categoryies]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $new_category = $request->validated();
       // dd($new_category);
        $catgory = Category::create($new_category);
        return(new CategoryResource(['data'=>$catgory]));

        //  return (new SuccessResource(['message'=>'Category insert successfully']))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return (new CategoryResource(['data'=>$category]));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $updated_value = $request->validated();
        $data = $category->update($updated_value);

        return (new CategoryResource(['message'=>'Category update succesfully','data'=>$data]));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return (new SuccessResource(['message'=>'Deleted successfully' ]));

    }
}
