@extends('layouts.app')

@section('main')
    <main class="container row">
        <h4 class="customHTag">Create Question</h4>
        <div class="col s6 offset-s3">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="title" name="title" type="text" class="validate">
                        <span class="helper-text" data-error="Required" data-success="">Required</span>
                        <label for="title">Title</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select id="category_id" name="category_id" class="">
                            <option value="" disabled selected>Choose category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="textareaCQ" name="body" class="materialize-textarea"></textarea>
                        <span class="helper-text" data-error="Required" data-success="">Required</span>
                        <label for="textareaCQ">Enter more details</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s2 offset-s5">
                        <button class="btn waves-effect waves-light blue darken-4" id="submitCreateQuestion" name="action">Submit</button>
                        <div class="preloader-wrapper" id="preloaderCQ">
                            <div class="spinner-layer spinner-red-only">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                    <div class="circle"></div>
                                </div><div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
