@extends('admin.master')
@section('title')

@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('manage-category') }}">Manage Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">Library</li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-12 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5>Add Category</h5>
            </div>
            <div class="card-body">
                <h6 class="text-center text-success">{{ Session::get('message') }}</h6>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('update-category') }}" method="POST">
                    @csrf 

                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <div class="form-group">
                        <label for="category_name_en">Category Name English</label>
                        <input type="text" name="category_name_en" id="category_name_en" value="{{ $category->category_name_en }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category_name_bn">Category Name Bangla</label>
                        <input type="text" name="category_name_bn" id="category_name_bn" value="{{ $category->category_name_bn }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category_description">Category Description</label>
                        <textarea name="category_description" id="category_description" class="form-control">{{ $category->category_description }}</textarea>
                    </div>  
                    <div class="form-group">
                        <label class="">Status</label> <br>
                            <label class="rdiobox">
                                <input name="status" {{ $category->status == 1 ? 'checked' : '' }} type="radio" value="1" >
                                <span>Publish</span>
                            </label>
                            <label class="rdiobox">
                                <input name="status" {{ $category->status == 0 ? 'checked' : '' }} type="radio" value="0" >
                                <span>Unpublish</span>
                            </label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="category_btn" value="Update Category" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
