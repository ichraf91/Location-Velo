<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view ('category.index')->with('categories',$categories);
    }
    public function create(){
        return view ('category.create');
    }
    public function store(Request $request)
    {


    Category::create([
        'name'=>$request->name,
        'slug'=>$request->slug,
    ]);
    return redirect('category')->with('message','Added');
}
}
