@extends('admin.master')
@section('title')
Website setting
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Setting</li>
    </ol>
</nav>
<div class="row justify-content-center">
    <div class="col-12 col-lg-10">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>Setting</h5>
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

                    <form action="{{ route('update-website') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="form-group">
                            <label for="about_heading"><strong>Header Logo</strong></label>
                            <input type="file" class="form-control" name="web_header_logo"> <br>
                            <img src="{{ asset('/') }}admin/logo-image/{{ $web_details->web_header_logo }}" width="150px" class="border rounded-sm" alt="">
                        </div>
                        <div class="form-group">
                            <label for="about_heading"><strong>Footer Logo</strong></label>
                            <input type="file" class="form-control" name="web_footer_logo"> <br>
                            <img src="{{ asset('/') }}admin/logo-image/{{ $web_details->web_footer_logo }}" width="150px" class="border rounded-sm" alt="">
                        </div>
                        <div class="form-group">
                            <label for="web_title"><strong>Website Title</strong></label>
                            <input type="text" name="web_title" id="web_title" value="{{ $web_details->web_title }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="summernote"><strong>Website Description</strong></label>
                            <textarea name="web_description"  id="summernote" class="form-control">{{ $web_details->web_description }}</textarea>
                        </div> 
                        <div class="form-group">
                            <label for="web_footer_text"><strong>Footer Text</strong></label>
                            <textarea name="web_footer_text"  id="web_footer_text" class="form-control">{{ $web_details->web_footer_text }}</textarea>
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