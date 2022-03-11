<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('main.include.category.categories',compact('categories'));
    }

    public function detail($seflink)
    {
        $categories = Category::with('listings')->where('seflink',$seflink)->get();
        return view('main.include.category.category-page',compact('categories'));
    }
}
