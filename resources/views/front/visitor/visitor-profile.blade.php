@extends('front.master')
@section('title')
Login
@endsection

@section('body')

<section class="login first grey">
    <div class="container">
        <div class="box-wrapper" style="width: 80%;">
            <div class="box box-border">
                <div class="box-body">
                    <h4>{{ Session::get('visitor_name') }}</h4><br>
                    <h6>Profile Image</h6>
                    <img src="https://picsum.photos/200" height="200px" class="border rounded shadow" alt="">
                    <br> <br>
                    <h6>Information</h6>
                    <form action="{{ route('new-visitor') }}" method="POST">
                        @csrf
                        
                            <input type="hidden" name="">
                            <div class="form-group">
                                <label>Name</label>
                            <input type="text" disabled name="visitor_name" value="{{ $visitor->visitor_name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"disabled  name="email" onblur="checkEmail(this.value)" value="{{ $visitor->email }}" class="form-control">
                                <p id="response"></p>
                            </div>
                            {{-- <div class="form-group">
                                <label class="fw">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div> --}}
                            {{-- <div class="form-group text-right">
                                <button type="submit" id="register-btn" class="btn btn-primary btn-block">Register</button>
                            </div> --}}
                        </form>
            </div>
        </div>
    </div>
</section>


@endsection