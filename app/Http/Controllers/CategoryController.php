<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category_create_view(){
        return view('categories.create');
    }
    public function category_create(CreateCategoryRequest $request){
        Category::create([
           "name" => $request->name
        ]);
        return redirect()->to('');
    }
    public function category_get_all(){
        $categories = Category::get();
        return view('categories.categories', compact('categories'));
    }
    public function category_delete(string $id){
        $offer = Offer::find($id);
        if(!$offer){
            Category::where('id', $id)->delete();
            return back();
        }
        return view('categories.delete_error');
    }
    public function category_edit_view(string $id){
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }
    public function category_edit(EditCategoryRequest $request, string $id){
        Category::where('id', $id)->update([
           "name" => $request->name
        ]);
        return redirect()->to(route('category_get_all'));
    }
}
