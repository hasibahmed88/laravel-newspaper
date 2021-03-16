@extends('admin.master')
@section('title')
Manage Contact
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Contact</li>
    </ol>
</nav>
<div class="row justify-content-center">
    <div class="col-12 col-lg-10">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>Contact</h5>
            </div>
            <div class="card-body">
                <div class="table-wrapper">
                    @if(Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif

                    <form action="{{ route('update-contact') }}" method="POST">
                        @csrf 
                        <div class="form-group">
                            <label for="contact_heading">Heading Text</label>
                            <input type="text" name="contact_heading" id="contact_heading" value="{{ $contact->contact_heading }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="summernote">Description</label>
                            <textarea name="contact_description"  id="summernote" class="form-control">{{ $contact->contact_description }}</textarea>
                        </div> 
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-success">
                        </div>
                    </form>
                    
                  </div><!-- table-wrapper -->
            </div>
        </div>
    </div>
    
</div>

@endsection