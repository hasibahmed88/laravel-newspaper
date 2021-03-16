@extends('admin.master')
@section('title')
Manage category
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>Add Category</h5>
            </div>
            <div class="card-body">
                @if(Session::get('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success</strong> {{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                @if(Session::get('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ Session::get('warning') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('new-category') }}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <label for="category_name_en">Category Name English</label>
                        <input type="text" name="category_name_en" id="category_name_en" value="{{ old('category_name_en') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category_name_bn">Category Name Bangla</label>
                        <input type="text" name="category_name_bn" id="category_name_bn" value="{{ old('category_name_bn') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category_description">Category Description</label>
                        <textarea name="category_description" id="category_description" class="form-control">{{ old('category_description') }}</textarea>
                    </div>  
                    <div class="form-group">
                        <label class="">Status</label> <br>
                            <label class="rdiobox">
                                <input name="status" type="radio" value="1" >
                                <span>Publish</span>
                            </label>
                            <label class="rdiobox">
                                <input name="status" type="radio" value="0" >
                                <span>Unpublish</span>
                            </label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="category_btn" value="Save Category" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

@endsection