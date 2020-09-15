@extends('layouts.app')
@section('main')
    <main class="container">
    <ul class="collection">
        <li class="collection-item grey header-question">
            <ul class="question">
                <li class="question-reply-first">User</li>
                <li class="question-reply-second"><span class="deep-orange-text text-darken-3">#</span><span class="blue-text text-darken-4">{{ $question->title }}</span> Category: <span class="blue-text text-darken-4">{{ $question->category->name }}</span></li>
                <li class="question-reply-third">Created</li>
            </ul>
        </li>
        <li class="collection-item">
            <ul class="question">
                <li class="question-reply-first">{{ $question->user->name }}</li>
                <li class="question-reply-second">{{ $question->body }}</li>
                <li class="question-reply-third">{{ $question->created_at->diffForHumans() }}</li>
            </ul>
        </li>
        <li class="collection-item grey header-question">
            <ul class="question">
                <li class="question-reply-first">User</li>
                <li class="question-reply-second"><span class="deep-orange-text text-darken-3">#</span>Replies</li>
                <li class="question-reply-third">Created</li>
            </ul>
        </li>
        @foreach($replies as $reply)
            @include('partials.replies')
        @endforeach
        <li class="collection-item  header-question">
            <form id="replyForm">
                <ul class="question" id="reply-question">

                </ul>
                <input type="hidden" id="questionId" value="{{ $question->id }}">
                <input type="hidden" id="questionSlug" value="{{ $question->slug }}">
            </form>
        </li>
    </ul>

        {{ $replies->links() }}
    </main>
@endsection

