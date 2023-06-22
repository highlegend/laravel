<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet"/>

    <title>Collège de la Salle</title>
    <style>
        a {
            text-decoration: none;
        }

        .login-page {
            width: 100%;
            height: 100vh;
            display: inline-block;
            display: flex;
            align-items: center;
        }

        .form-right i {
            font-size: 100px;
        }
    </style>

</head>
<body>
<div class="container">
    <div class="login-page bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <h3 class="mb-3">Espèce Collège Maisonneuve</h3>
                    <div class="bg-white shadow rounded">
                        <div class="row">
                            <div class="col-md-7 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <form  id="FormLogin" method="post" class="row g-4" action="">
                                            @csrf
                                        <div id="msg" class="col-md-12 text-center"></div>
                                        <div class="col-12">
                                            <label>Adresse mail<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="fa fa-user"></i></div>
                                                <input id="username" type="text" class="form-control"
                                                       placeholder="Adresse email" required autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label>Mot de passe<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                                <input id="password" type="password" class="form-control"
                                                       placeholder="Mot de passe" required autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-primary px-4 float-end mt-4">Se Connecter
                                            </button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 ps-0 d-none d-md-block">
                                <div class="form-right h-100 bg-primary text-white text-center pt-5 rounded mx-auto d-block"
                                     style="background-image: url({{asset('images/bg2.jpg')}}); border: 1px solid #013e7d;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/loadingoverlay.min.js')}}"></script>
<script>
    $("#FormLogin").submit(function (event) {
        $.ajax({
            url:"{{ route('login') }}",
            type: "POST",
            data: {
                username: $('#username').val(),
                password: $('#password').val()
            },
            beforeSend: function () {
                $.LoadingOverlay("show");
            },
            complete: function () {
                $.LoadingOverlay("hide");
            },
            success: function (response) {
                var result = jQuery.parseJSON(response);
                if (result.status == "success") {
                    if (result.profil == "Administrator")
                        window.location.href = "admin.php?page=list_notification&active=1";
                    else
                    if (result.profil == "User")
                        window.location.href = "user.php?page=my_notification&active=1";
                } else {
                    $('#msg').empty();
                    $('#msg').html('<div class="alert alert-danger" role="alert">' + result.message + '</div>');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
            }
        });
        event.preventDefault();
    });

</script>
</body>
</html>
