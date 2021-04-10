@extends('front.master')
@section('title')
Login
@endsection

@section('body')

<section class="login first grey">
    <div class="container">
        <div class="box-wrapper">
            <div class="box box-border">
                <div class="box-body">
                    <h4>Login</h4>
                    @if(Session::get('message'))
                    <div class="alert alert-danger alert-dismissible show" role="alert">
                        {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                <form action="{{ route('new-visitor-login') }}" method="POST">
                    @csrf 
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" onblur="checkEmail(this.value)" class="form-control">
                            <p id="response"></p>
                        </div>
                        <div class="form-group">
                            <label class="fw">Password
                                <a href="forgot.html" class="pull-right">Forgot Password?</a>
                            </label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <input type="checkbox" name="rememberMe" id="remember"> &nbsp;&nbsp; <label for="remember">Remember me</label>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" id="login-btn" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <div class="form-group text-center">
                            <span class="text-muted">Don't have an account?</span> <a href="{{ route('visitor-register') }}">Create one</a>
                        </div>
                        <div class="title-line">
                            or
                        </div>
          <a href="#" class="btn btn-social btn-block facebook"><i class="ion-social-facebook"></i> Login with Facebook</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function checkEmail(email){
        $.ajax({
            url         :         'http://127.0.0.1:8000/check-email/'+email,
            method      :         'GET',
            data        :          {email:email},
            datatype    :           'JSON',
            success     :           function(data){
                if (data != "\"True\"") {
                    document.getElementById('response').innerHTML = 'Invalid email address!';
                    document.getElementById('response').style.color = 'red';
                    document.getElementById('login-btn').disabled = true;
                }
                else{
                    document.getElementById('response').innerHTML = 'Email address valid!';
                    document.getElementById('response').style.color = 'green';
                    document.getElementById('login-btn').disabled = false;
                }
            }
        });
    }
</script>

@endsection