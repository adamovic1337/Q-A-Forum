<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $questions = Question::latest()->paginate(10);

        return view('home', ['categories' => $categories, 'questions' => $questions]);
    }


    public function categoryFilter($slug)
    {
        $categories = Category::get();
        $questions = Question::join('categories', 'questions.category_id', '=', 'categories.id')->where('categories.slug', '=', $slug)->select('questions.id as id', 'questions.title as title', 'questions.slug as slug', 'questions.created_at as created_at')->paginate(10);

        return view('home', ['categories' => $categories, 'questions' => $questions]);
    }

    public function searchFilter(Request $request)
    {
        $categories = Category::get();
        $questions = Question::where('title','LIKE','%' . $request->search . '%')->paginate(10);
        $questions->appends(['search' => $request->search]);

        return view('home', ['categories' => $categories, 'questions' => $questions]);
    }

}
