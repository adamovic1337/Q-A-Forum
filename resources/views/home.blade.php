@extends('layouts.app')

@section('main')
    <main class="container row">
        <aside class="col s3">
            @include('partials.categories')
        </aside>

        <section class="col s9">
            <div class="row">
                <form action="{{ route('search') }}" method="get">
                    @csrf
                    <div class="input-field col s11">
                        <input id="icon_prefix" type="text" name="search" class="validate">
                        <label for="icon_prefix">Search topics</label>
                    </div>
                    <div class="input-field col s1">
                        <button  class="btn-floating btn-small waves-effect waves-light blue darken-4" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col s4 offset-s5" id="createQuestion">

                </div>
            </div>
            <ul class="collection" id="questionList">
                <li class="collection-item grey header-question">
                    <ul class="question">
                        <li class="question-first"><span class="deep-orange-text text-darken-3">#</span>Topics</li>
                        <li class="question-item">Replys</li>
                        <li class="question-item">Posted</li>
                    </ul>
                </li>
                @foreach($questions as $question)
                    @include('partials.questions')
                @endforeach
            </ul>
            <span>{{ $questions->links() }}</span>

        </section>


    </main>
@endsection
