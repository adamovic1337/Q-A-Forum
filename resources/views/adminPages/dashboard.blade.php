@extends('layouts.admin.appAdmin')

@section('main')
    <main class="row">
        <aside class="col s3" id="adminAsside">

        </aside>

        <section class="col s9">
            <div class="row">
                <div class="col s3">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Total categories</span>
                            <h2> {{$totalCategories}} </h2>
                        </div>
                    </div>
                </div>
                <div class="col s3">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Total topics</span>
                            <h2> {{$totalQuestions}} </h2>
                        </div>
                    </div>
                </div>
                <div class="col s3">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Total replies</span>
                            <h2> {{$totalReplies}} </h2>
                        </div>
                    </div>
                </div>
                <div class="col s3">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Total users</span>
                            <h2> {{ $totalUsers }} </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
