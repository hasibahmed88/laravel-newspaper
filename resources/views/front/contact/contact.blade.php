@extends('front.master')
@section('title')
Contact
@endsection

@section('body')

<section class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
      <ol class="breadcrumb">
          <li><a href="{{ route('/') }}">Home</a></li>
        <li class="active">Contact Us</li>
      </ol>
                <h1 class="page-title">Contact Us</h1>
                <p class="page-subtitle">We hear you</p>
                <div class="line thin"></div>
                <div class="page-description">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h3>{{ $contact->contact_heading }}</h3>
                           <p>{!! $contact->contact_description !!}</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <h3>Send message</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h6 class="text-success">{{ Session::get('message') }}</h6>

                            <form class="row contact"  action="{{ route('message') }}" method="POST">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name <span class="required"></span></label>
                                        <input type="text" class="form-control" name="name" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email <span class="required"></span></label>
                                        <input type="text" class="form-control" name="email" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" class="form-control" name="subject">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Your message <span class="required"></span></label>
                                        <textarea class="form-control" name="message" ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="maps">
    <iframe src="{{ $contact->map_location }}" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>

@endsection