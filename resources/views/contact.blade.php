@extends('layouts.app')

@section('main')
    <main class="container row">
        <h4 class="customHTag">Contact</h4>
        <div class="col s6 offset-s3">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="subject" name="subject" type="text" class="validate">
                        <span class="helper-text" data-error="Required" data-success="">Required</span>
                        <label for="subject">Title</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="contactEmail" name="contactEmail" type="text" class="validate">
                        <span class="helper-text" data-error="Required" data-success="">Required</span>
                        <label for="contactEmail">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="message" name="message" class="materialize-textarea"></textarea>
                        <span class="helper-text" data-error="Required" data-success="">Required</span>
                        <label for="message">Message</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s2 offset-s5">
                        <button class="btn waves-effect waves-light blue darken-4" id="submitContact" name="submitContact">Submit</button>
                        <div class="preloader-wrapper" id="preloaderContact">
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
