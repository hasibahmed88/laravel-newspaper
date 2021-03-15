@extends('admin.master')
@section('title')
Manage Message
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('visitor-message') }}">Manage Message</a></li>
    </ol>
</nav>
<div class="row justify-content-center">
    <div class="col-12 col-lg-10">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>{{ $message->subject }}</h5>
            </div>
            <div class="card-body">
                <div class="table-wrapper">
                    <div class="border rounded p-4">
                        <h6>Sent from:</h6>
                        {{ $message->name}} 
                        <br>
                        <strong>Date:</strong>
                         {{ date('F-d-Y', strtotime($message->created_at)) }}
                         <br><br>
                        <h6>Message:</h6>
                        {{ $message->message}}
                    </div>  
                </div><!-- table-wrapper -->
            </div>
        </div>
    </div>
    
</div>

@endsection