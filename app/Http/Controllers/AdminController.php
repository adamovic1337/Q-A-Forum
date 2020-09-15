<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\Reply;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->name;
        Log::info($user . ' ' . "access admin page");
        $totalCategories = Category::count();
        $totalUsers = User::count();
        $totalQuestions = Question::count();
        $totalReplies = Reply::count();

        return view('adminPages.dashboard', ['totalCategories' => $totalCategories, 'totalUsers' => $totalUsers, 'totalQuestions' => $totalQuestions, 'totalReplies' => $totalReplies]);
    }

}
