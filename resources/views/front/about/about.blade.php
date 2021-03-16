@extends('front.master')
@section('title')
About Us
@endsection

@section('body')

<section class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
      <ol class="breadcrumb">
          <li><a href="{{ route('/') }}">Home</a></li>
        <li class="active">About Us</li>
      </ol>
                <h1>{{ $about->about_heading }}</h1>
                <p>{{ $about->about_short_description }}</p>
                <div class="line thin"></div>
                
                <div class="page-description">
                    <p>{!! $about->about_long_description !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection