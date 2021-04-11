@if(!Cookie::get('VISITOR_NAME'))
@php
    header("Location: " . URL::to('/'), true, 302);
    exit();
@endphp
@endif

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
                    <h4>{{ Cookie::get('visitor_name') }}</h4><br>
                    
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
                        </form>
            </div>
        </div>
    </div>
</section>


@endsection