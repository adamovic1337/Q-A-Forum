<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Http\Requests\QuestionRequest;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    public function index()
    {
        return Question::latest()->get();
    }

    public function create()
    {
        $categories = Category::get();
        return view('createQuestion', ['categories' => $categories]);
    }

    public function store(QuestionRequest $request)
    {
        Log::info($request->title . " " . "Question created");

        $question = new Question;
        $question->title = $request->title;
        $question->slug = Str::slug($request->title);
        $question->body = $request->body;
        $question->category_id = $request->category_id;
        $question->user_id = $request->user_id;
        $question->save();
        return response(['created' => 'Question created'], Response::HTTP_CREATED);
    }

    public function update(Request $request, Question $question)
    {
        Log::info($question->title . " " . "Question updated");

        $question->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id
        ]);
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function adminIndex(Request $request)
    {
        $questions = Question::paginate(15);
        $questions->appends(['token' => $request->token]);
        return view('adminPages.manageQuestions', ['questions' => $questions]);
    }

    public function adminDelete(Question $question)
    {
        Log::info($question->title . " " . "Question deleted");

        $question->delete();
        return redirect()->back();
    }
}
