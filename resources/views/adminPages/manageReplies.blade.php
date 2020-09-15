@extends('layouts.admin.appAdmin')

@section('main')
    <main class="row">
        <aside class="col s3" id="adminAsside">

        </aside>
        <section class="col s9">
            <h5><span class="deep-orange-text text-darken-3">#</span>Replies</h5>
            <div class="row">
                <table class="centered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Reply</th>
                        <th>Question</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($replies as $reply)
                        @include('partials.admin.repliesAdmin')
                    @endforeach
                    </tbody>
                </table>
                {{ $replies->links() }}
            </div>
        </section>
    </main>
@endsection

