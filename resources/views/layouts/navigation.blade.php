<nav class="blue darken-4">
    <div class="nav-wrapper container">
        <a href="{{ route('home') }}" class="brand-logo"><span class="deep-orange-text text-darken-3">#</span>Owl Forum</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="">Contact</a></li>
        </ul>
    </div>
</nav>
<!-- Sign In Modal   -->
<div id="registration" class="modal">
    <div class="modal-content" id="signin">
        <h4>Sign in</h4>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="siEmail" type="text" class="">
                        <label for="siEmail">Email</label>
                        <span class="helper-text" data-error="Required"></span>
                    </div>
                    <div class="input-field col s6">
                        <input id="siPassword" type="password" class="">
                        <label for="siPassword">Password</label>
                        <span class="helper-text" data-error="Required"></span>
                    </div>
                </div>
                <button class="btn waves-effect waves-light blue darken-4 right" type="button" id="siSend"
                        value="send">
                    Log In
                </button>
            </form>
        </div>
        <div class="divider"></div>
        <a href="#" class="link-center" id="newacc">Create new account</a>
    </div>
    <!--  Sign Up Modal  -->
    <div class="modal-content" id="signup">
        <h4>Sign Up</h4>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="suName" type="text" class="">
                        <label for="suName">Name</label>
                        <span class="helper-text" data-error="Required, min 3 characters"
                              data-success="Correct">Min 3 characters</span>
                    </div>
                    <div class="input-field col s6">
                        <input id="suPassword" type="password" class="">
                        <label for="suPassword">Password</label>
                        <span class="helper-text"
                              data-error="Required, at least:1 big letter, 1 small letter, 1 number, min 8 character long"
                              data-success="Correct">At least:1 big letter, 1 small letter, 1 number, min 8 character long</span>
                    </div>
                    <div class="input-field col s12">
                        <input id="suEmail" type="text" class="">
                        <label for="suEmail">Email</label>
                        <span class="helper-text" data-error="Required"
                              data-success="Correct">example@example.com</span>
                    </div>
                </div>
                <button class="btn waves-effect waves-light blue darken-4 right" type="button" id="suSend"
                        value="send">
                    Sign Up
                </button>
            </form>
        </div>
        <div class="divider"></div>
        <a href="#" class="link-center" id="back1">Back to Sign In page</a>
    </div>
</div>



