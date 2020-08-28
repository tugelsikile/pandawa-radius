<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('custom/login.css') }}" rel="stylesheet">

</head>

<body>
    <div class="login-page">
        <div class="row">
            <div class="col-md-6">
                <div class="login-form">

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center lead">
                                <img src="{{ asset('custom/logo.png') }}" style="width: 100%">
                            </div>
                            
                            <form class="form form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <span class="text-danger text-center alert"></span>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} row">
                                    <label for="username" class="col-md-4 control-label">Username</label>
                                    <div class="col-md-8">
                                        <input id="username" type="text" class="form-control" name="email" value="{{ old('username') }}" required autofocus>
                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                                    <label for="password" class="col-md-4 col-form-label">Password</label>

                                    <div class="col-md-8">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-success btn-block">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
    <script>
        $('.form-horizontal').submit(function(){
            $('.btn-block').prop({'disabled':true});
            $.ajax({
                url     : $(this).attr('action'),
                type    : $(this).attr('method'),
                dataType: 'JSON',
                data    : $(this).serialize(),
                error   : function (e) {
                    $('.btn-block').prop({'disabled':false});
                    $('.text-danger').html(e.responseJSON.message);
                },
                success : function (e) {
                    window.location.href='/';
                }
            });
            return false;
        });
    </script>
</body>
</html>