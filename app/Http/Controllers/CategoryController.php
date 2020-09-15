<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {
        return Category::get();
    }

    public function adminInsert(CategoryRequest $request)
    {
        Log::info($request->name . ' ' . 'Category created');

        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->back();
    }

    public function adminIndex(Request $request)
    {
        $categories = Category::paginate(5);
        $categories->appends(['token' => $request->token]);
        return view('adminPages.manageCategories', ['categories' => $categories]);
    }

    public function adminUpdate(CategoryRequest $request, Category $category)
    {
        Log::info($category->name . ' ' .'Category updated');

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->back();
    }

    public function adminDelete(Category $category)
    {
        Log::info($category->name . ' ' . 'Category deleted');

        $category->delete();

        return redirect()->back();
    }
}
