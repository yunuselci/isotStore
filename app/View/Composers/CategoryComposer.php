<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryComposer
{
    protected $categories;

    public function __construct(Category $categories)
    {
        $this->categories = $categories;
    }


    public function generateSeflink()
    {
        $slugNames = collect();
        $categoryCollection = $this->categories->select('name')->get();
        $categoryNames = $categoryCollection->pluck('name');
        foreach ($categoryNames as $categoryName)
        {
            $slugNames->push( Str::slug($categoryName));
        }
        return $slugNames;

    }

    public function compose(View $view)
    {
       // $view ->with('seflink', $this->generateSeoURL($this->categories->select('name')->get()));
        $view ->with('seflink', $this->generateSeflink());
        $view -> with('categories', $this->categories->all());

    }

}
