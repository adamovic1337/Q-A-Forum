@extends('layouts.app')

@section('main')
    <main class="container row">
        <h4 class="customHTag">Profile</h4>
        <div class="col s6 offset-s3">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" name="name" type="text" class="validate" value="">
                        <span class="helper-text" data-error="Required" data-success="">Name</span>
                        <label for="subject"></label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="profileEmail" name="email" type="text" class="validate">
                        <span class="helper-text" data-error="Required" data-success="">Email</span>
                        <label for="profileEmail"></label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name="password" type="password" class="validate">
                        <span class="helper-text" data-error="Required" data-success="">Password</span>
                        <label for="password"></label>
                    </div>
                </div>
                <input type="hidden" name="role_id" id="role_id" value="">
                <div class="row">
                    <div class="input-field col s2 offset-s5">
                        <button class="btn waves-effect waves-light blue darken-4" id="submitProfile" name="submitProfile">Save</button>
                        <div class="preloader-wrapper" id="preloaderProfile">
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
