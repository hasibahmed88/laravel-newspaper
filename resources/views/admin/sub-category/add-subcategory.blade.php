@extends('admin.master')
@section('title')
Manage subcategory
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('manage-subcategory') }}">Manage subcategory</a></li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>Add Subcategory</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('new-subcategory') }}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <label for="category_id">Category Name</label>
                        <select class="form-control select2" name="category_id" id="category_id">
                            <option value="">Select</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @empty
                                <option value="">No data found!</option>
                            @endforelse
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory_name">Subcategory Name</label>
                        <input type="text" name="subcategory_name" id="subcategory_name" value="{{ old('subcategory_name') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="subcategory_description">Subcategory Description</label>
                        <textarea name="subcategory_description" id="subcategory_description" class="form-control">{{ old('subcategory_description') }}</textarea>
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