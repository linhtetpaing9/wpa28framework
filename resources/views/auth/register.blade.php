<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('layouts.title')
    @include('layouts.css')
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        <div id="main-wrapper">

            <div class="unix-login">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="login-content card">
                                <div class="login-form">
                                    <h4>Register</h4>
                                    <form  class="form-horizontal" method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name">Name</label>
                                            
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                       
                                        </div>
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" >E-Mail Address</label>
                                            
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                           
                                        </div>
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label>Password</label>
                                            
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="password-confirm">Confirm Password</label>

                                           
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            
                                        </div>
                                        <div class="form-group">
                                            
                                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">
                                                    Register
                                                </button>
                                            
                                        </div>
                                        
                                        <div class="register-link m-t-15 text-center">
                                            <p>Already have account ? <a href="#"> Sign in</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @include('layouts.script')

    </body>

    </html>