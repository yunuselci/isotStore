<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('theme.include.categories',compact('categories'));
    }

    public function seflink($seflink)
    {

        return view('theme.include.category-page',compact('seflink'));
    }
}
