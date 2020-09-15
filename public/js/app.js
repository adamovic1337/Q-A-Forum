$(window).on( "load", function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.modal').modal();
    $('select').formSelect();
    formAnimation();
    showLoginLogout();
    showReplyForm();
    showAskQuestion();
    createQuestion();
    sendMail();
    profile();
    adminMenu();
});

// Functions
function formAnimation() {
    $("#signup").hide();
    $("#newacc").on("click", function (e) {
        e.preventDefault();
        $("#signin").fadeOut(function () {
            $("#signup").fadeIn();
        });
    });
    $("#back1").on("click", function (e) {
        e.preventDefault();
        $("#signup").fadeOut(function () {
            $("#signin").fadeIn();
        });
    });
    $("#back2").on("click", function (e) {
        e.preventDefault();
        $("#resetPass").fadeOut(function () {
            $("#signin").fadeIn();
        });
    });
}

function signIn() {
    $("#siSend").on("click", function () {
        let username = $("#siEmail").val();
        let password = $("#siPassword").val();
        let sendData = {};
        let validate = true;

        if (username != "") {
            sendData.email = username;
            $("#siEmail").removeClass("invalid");
            $("#siEmail").addClass("valid");
        } else {
            $("#siEmail").addClass("invalid");
            validate = false;
        }

        if (password != "") {
            sendData.password = password;
            $("#siPassword").removeClass("invalid");
            $("#siPassword").addClass("valid");
        } else {
            $("#siPassword").addClass("invalid");
            validate = false;
        }

        if (validate) {
            $.ajax({
                url: '/api/auth/login',
                dataType: "json",
                method: "post",
                data: sendData,
                success: function (data) {
                    addJWT(data.access_token);
                    showLoginLogout();
                    showAskQuestion();
                    M.Modal.getInstance($('.modal')).close();
                },
                error: function (xhr, status, error) {
                    M.toast({html: `${xhr.responseJSON.error}`});
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        }
    });
}

function signUp() {
    $("#suSend").on("click", function () {
        let name = $("#suName").val();
        let password = $("#suPassword").val();
        let email = $("#suEmail").val();
        let validate = true;
        let sendData = {};

        let rePass = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/;
        let reMail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (name.length >= 3) {
            sendData.name = name;
            $("#suName").removeClass("invalid");
            $("#suName").addClass("valid");
        } else {
            $("#suName").addClass("invalid");
            validate = false;
        }
        if (rePass.test(password)) {
            sendData.password =  password;
            $("#suPassword").removeClass("invalid");
            $("#suPassword").addClass("valid");
        } else {
            $("#suPassword").addClass("invalid");
            validate = false;
        }
        sendData.role_id = 2;

        if (reMail.test(email)) {
            sendData.email = email;
            $("#suEmail").removeClass("invalid");
            $("#suEmail").addClass("valid");
        } else {
            $("#suEmail").addClass("invalid");
            validate = false;
        }

        if (validate){
            $.ajax({
                url: '/api/auth/signup',
                dataType: "json",
                method: "post",
                data: sendData,
                success: function (data) {
                    M.toast({html: `${data.message}`});
                },
                error: function (xhr, status, error) {
                    M.toast({html: `${xhr.responseJSON.error}`});
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        }
    });
}

function signOut() {
    $("#logout").on("click", function (e) {
        e.preventDefault();
        let sendData = {
            token: getJWT()
        };
        $.ajax({
            url: '/api/auth/logout',
            dataType: "json",
            method: "post",
            data: sendData,
            success: function (data) {
                M.toast({html: `${data.message}`});
                removeJWT();
                showLoginLogout();
                showReplyForm();
                showAskQuestion();
                location.href = "/";
            },
            error: function (xhr, status, error) {
                M.toast({html: `${xhr.responseJSON}`});
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });
}

function getJWT() {
    return localStorage.getItem("token");
}

function addJWT(token) {
    localStorage.setItem("token", token);
}

function removeJWT() {
    localStorage.removeItem("token");
}

function showLoginLogout() {
    let sendData = {
        token: getJWT()
    };
    $.ajax({
        url: '/api/auth/me',
        dataType: "json",
        method: "post",
        data: sendData,
        success: function (data) {
            if (data.role_id == 1) {
               $('#nav-mobile').html(
                   '<li><a href="/">Home</a></li>\n' +
                   '            <li><a href="/contact">Contact</a></li>\n' +
                   '            <li><a href="/profile?token=' + getJWT() +'">Profile</a></li>\n' +
                   '            <li><a href="/admin?token=' + getJWT() +'">AdminPanel</a></li>\n' +
                   '            <li><a href="#" id="logout">Logout</a></li>'
               );
                signOut();
            }
            else if (data.role_id == 2) {
                $('#nav-mobile').html(
                    '<li><a href="/">Home</a></li>\n' +
                    '            <li><a href="/contact">Contact</a></li>\n' +
                    '            <li><a href="/profile?token=' + getJWT() +'">Profile</a></li>\n' +
                    '            <li><a href="#" id="logout">Logout</a></li>'
                );
                signOut();
            }
            else {
                $('#nav-mobile').html(
                    '<li><a href="/">Home</a></li>\n' +
                    '            <li><a href="/contact">Contact</a></li>\n' +
                    '            <li><a href="#registration" class="modal-trigger">Login</a></li>'
                );
                signIn();
                signUp();
            }
            showReplyForm();
        },
        error: function (xhr, status, error) {
            M.toast({html: `${xhr.responseJSON}`});
            console.log(xhr);
            console.log(status);
            console.log(error);
        }
    });
}

function showReplyForm() {
    let sendData = {
        token: getJWT()
    };
    $.ajax({
        url: '/api/auth/me',
        dataType: "json",
        method: "post",
        data: sendData,
        success: function (user) {
            if (user.name != null) {
                $('#reply-question').html(
                    '<li class="question-reply-first">Create Reply</li>\n' +
                    '                    <li class="question-reply-second"><textarea id="textarea" class="materialize-textarea" name="body" placeholder="Add reply"></textarea>\n' +
                    '                    <li class="question-reply-third"><button class="waves-effect waves-light btn-small blue darken-4" type="button" id="submitReplyButton" >Submit</button></li>\n'
                );
            }
            else {
                $('#reply-question').html(
                    '<li class="question-reply-first">Create Reply</li>\n' +
                    '                    <li class="question-reply-second"><textarea class="materialize-textarea" name="body" placeholder="Login if you want to post" disabled></textarea>\n' +
                    '                    <li class="question-reply-third"><button class="waves-effect waves-light btn-small blue darken-4 disabled" type="button">Submit</button></li>\n'

                );
            }
            submitReply(user.id);
        },
        error: function (xhr, status, error) {
            M.toast({html: `${xhr.responseJSON}`});
            console.log(xhr);
            console.log(status);
            console.log(error);
        }
    });

}

function submitReply(userId) {
    $('#submitReplyButton').on('click', function () {
        let question = $('#replyForm').find('#questionId').val();
        let questionSlug = $('#replyForm').find('#questionSlug').val();
        let body = $('#textarea').val();
        let sendData = {
            question_id: question,
            user_id: userId,
            body: body
        };
        if (body == "") {
            M.toast({html: `Please fill reply form`});
        }
        else {
            $.ajax({
                url: "/api/question/" + questionSlug + "/reply" ,
                dataType: "json",
                method: "post",
                data: sendData,
                success: function () {
                    location.reload();
                },
                error: function (xhr, status, error) {
                    M.toast({html: `${xhr.responseJSON}`});
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        }
    });
}

function showAskQuestion() {
    let sendData = {
        token: getJWT()
    };
    $.ajax({
        url: '/api/auth/me',
        dataType: "json",
        method: "post",
        data: sendData,
        success: function (user) {
            if (user.name != null) {
                $('#createQuestion').html('<span class="blue-text text-darken-4">Ask Question</span>  <a href="/question/create?token=' + getJWT() +'"  class="btn-floating btn-small waves-effect waves-light blue darken-4"><i class="fas fa-plus"></i></a>');
            }
            else {
                $('#createQuestion').html('');
            }
        },
        error: function (xhr, status, error) {
            M.toast({html: `${xhr.responseJSON}`});
            console.log(xhr);
            console.log(status);
            console.log(error);
        }
    });
}

function createQuestion() {
    $('#submitCreateQuestion').on('click', function (e) {
        e.preventDefault();
        let title = $('#title').val();
        let category_id = $('#category_id').val();
        let body = $('#textareaCQ').val();
        let validate = true;
        let data = {};

        if ( title != '' ) {
            data.title = title;
            $("#title").removeClass("invalid");
            $("#title").addClass("valid");
        } else {
            $("#title").addClass("invalid");
            validate = false;
        }
        if ( category_id != null ) {
            data.category_id = category_id;
            $(".select-dropdown").removeClass("invalid");
            $(".select-dropdown").addClass("valid");
        } else {
            $(".select-dropdown").addClass("invalid");
            validate = false;
        }
        if ( body != '' ) {
            data.body = body;
            $("#textareaCQ").removeClass("invalid");
            $("#textareaCQ").addClass("valid");
        } else {
            $("#textareaCQ").addClass("invalid");
            validate = false;
        }

        let sendData = {
            token: getJWT()
        };
        if (validate) {
            $.ajax({
                url: '/api/auth/me',
                dataType: "json",
                method: "post",
                data: sendData,
                success: function (user) {
                    data.token = getJWT();
                    data.user_id = user.id;
                    $('#submitCreateQuestion').hide();
                    $('#preloaderCQ').addClass('active');
                    $.ajax({
                        url: '/api/question',
                        dataType: "json",
                        method: "post",
                        data: data,
                        success: function (data) {
                            $('#submitCreateQuestion').show();
                            $('#preloaderCQ').removeClass('active');
                            M.toast({html: `${data.created}`});
                        },
                        error: function (xhr, status, error) {
                            M.toast({html: `${xhr.responseJSON}`});
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                        }
                    });
                },
                error: function (xhr, status, error) {
                    M.toast({html: `${xhr.responseJSON}`});
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        }
    });
}

function sendMail() {
    $('#submitContact').on('click', function (e) {
        e.preventDefault();
        let subject = $('#subject').val();
        let contactEmail = $('#contactEmail').val();
        let message = $('#message').val();
        let validate = true;
        let sendData = {};

        if ( subject != '' ) {
            sendData.subject = subject;
            $("#subject").removeClass("invalid");
            $("#subject").addClass("valid");
        } else {
            $("#subject").addClass("invalid");
            validate = false;
        }
        if ( contactEmail != '' ) {
            sendData.contactEmail = contactEmail;
            $("#contactEmail").removeClass("invalid");
            $("#contactEmail").addClass("valid");
        } else {
            $("#contactEmail").addClass("invalid");
            validate = false;
        }
        if ( message != '' ) {
            sendData.message = message;
            $("#message").removeClass("invalid");
            $("#message").addClass("valid");
        } else {
            $("#message").addClass("invalid");
            validate = false;
        }


        if (validate) {
            $('#submitContact').hide();
            $('#preloaderContact').addClass('active');
            $.ajax({
                url: "/api/contact" ,
                dataType: "json",
                method: "post",
                data: sendData,
                success: function (data) {
                    M.toast({html: `${data.message}`});
                    $('#submitContact').show();
                    $('#preloaderContact').removeClass('active');
                },
                error: function (xhr, status, error) {
                    M.toast({html: `${xhr.responseJSON}`});
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        }
    });
}

function profile() {
    let sendData = {
        token: getJWT()
    }
    $.ajax({
        url: "/api/auth/me" ,
        dataType: "json",
        method: "post",
        data: sendData,
        success: function (user) {
            $('#name').val(user.name);
            $('#profileEmail').val(user.email);
            $('#role_id').val(user.role_id);
            saveProfile();
        },
        error: function (xhr, status, error) {
            M.toast({html: `${xhr.responseJSON}`});
            console.log(xhr);
            console.log(status);
            console.log(error);
        }
    });
}

function saveProfile() {
    $('#submitProfile').on('click', function (e) {
        e.preventDefault();
        let name = $('#name').val();
        let profileEmail = $('#profileEmail').val();
        let password = $('#password').val();
        let role_id = $('#role_id').val();
        let validate = true;
        let sendData = {};

        if ( name != '' ) {
            sendData.name = name;
            $("#name").removeClass("invalid");
            $("#name").addClass("valid");
        } else {
            $("#name").addClass("invalid");
            validate = false;
        }
        if ( profileEmail != '' ) {
            sendData.email = profileEmail;
            $("#profileEmail").removeClass("invalid");
            $("#profileEmail").addClass("valid");
        } else {
            $("#profileEmail").addClass("invalid");
            validate = false;
        }
        if ( password != '' ) {
            sendData.password = password;
            $("#password").removeClass("invalid");
            $("#password").addClass("valid");
        } else {
            $("#password").addClass("invalid");
            validate = false;
        }
        if ( role_id != '' ) {
            sendData.role_id = role_id;
        } else {
            validate = false;
        }


        if (validate) {
            sendData.token = getJWT();
            $('#submitProfile').hide();
            $('#preloaderProfile').addClass('active');
            $.ajax({
                url: '/api/auth/update',
                dataType: "json",
                method: "post",
                data: sendData,
                success: function () {
                    profile();
                    $('#submitProfile').show();
                    $('#preloaderProfile').removeClass('active');
                },
                error: function (xhr, status, error) {
                    M.toast({html: `${xhr.responseJSON}`});
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        }
    });
}

function adminMenu() {
    let html = `
    <ul class="collection with-header">
        <li class="collection-item"><a href="/admin?token=${getJWT()}">Dashboard</a></li>
        <li class="collection-item"><a href="/admin/categories?token=${getJWT()}">Manage Categories</a></li>
        <li class="collection-item"><a href="/admin/questions?token=${getJWT()}">Manage Topics</a></li>
        <li class="collection-item"><a href="/admin/replies?token=${getJWT()}">Manage Replies</a></li>
        <li class="collection-item"><a href="/admin/users?token=${getJWT()}">Manage Users</a></li>
        <li class="collection-item"><a href="/admin/roles?token=${getJWT()}">Manage Roles</a></li>
        <li class="collection-item"><a href="/log-viewer" target="_blank">Logs</a></li>
    </ul>
    `;
    $('#adminAsside').html(html);
}
