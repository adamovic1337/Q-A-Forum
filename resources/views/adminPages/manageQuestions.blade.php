@extends('layouts.admin.appAdmin')

@section('main')
    <main class="row">
        <aside class="col s3" id="adminAsside">

        </aside>
        <section class="col s9">
            <h5><span class="deep-orange-text text-darken-3">#</span>Topics</h5>
            <div class="row">
                <table class="centered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $question)
                        @include('partials.admin.questionsAdmin')
                    @endforeach
                    </tbody>
                </table>
                {{ $questions->links() }}
            </div>
        </section>
    </main>
@endsection

