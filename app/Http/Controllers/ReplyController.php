<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ReplyController extends Controller
{
    public function index(Question $question)
    {
        $replies = $question->replies()->latest()->paginate(10);
        return view('question', ['question' => $question, 'replies' => $replies]);
    }

    public function store(Question $question, Request $request)
    {
        $question->replies()->create($request->all());
        return response(['message' => 'Created'], Response::HTTP_CREATED);
    }

    public function update(Question $question, Request $request, Reply $reply)
    {
        $reply->update($request->all());
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function adminIndex(Request $request)
    {
        $replies = Reply::paginate(20);
        $replies->appends(['token' => $request->token]);
        return view('adminPages.manageReplies', ['replies' => $replies]);
    }

    public function adminDelete(Reply $reply)
    {
        Log::info($reply->title . " " . "Reply deleted");

        $reply->delete();
        return redirect()->back();
    }
}
