@extends('front.master')
@section('title')
Register
@endsection

@section('body')

<section class="login first grey">
    <div class="container">
        <div class="box-wrapper">				
            <div class="box box-border">
                <div class="box-body">
                    <h4>Register</h4>
                <form action="{{ route('new-visitor') }}" method="POST">
                    @csrf

                        <input type="hidden" name="">
                        <div class="form-group">
                            <label>Name</label>
                        <input type="text" name="visitor_name" value="{{ old('visitor_name') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" onblur="checkEmail(this.value)" value="{{ old('email') }}" class="form-control">
                            <p id="response"></p>
                        </div>
                        <div class="form-group">
                            <label class="fw">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" id="register-btn" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <div class="form-group text-center">
                            <span class="text-muted">Already have an account?</span> <a href="{{ route('visitor-login') }}">Login</a>
                        </div>
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
                if (data == "\"True\"") {
                    document.getElementById('response').innerHTML = 'Email address already used!';
                    document.getElementById('response').style.color = 'red';
                    document.getElementById('register-btn').disabled = true;
                }
                else{
                    document.getElementById('response').innerHTML = 'Email address valid!';
                    document.getElementById('response').style.color = 'green';
                    document.getElementById('register-btn').disabled = false;
                }
            }
        });
    }
</script>

@endsection