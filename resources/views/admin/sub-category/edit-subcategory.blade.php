@extends('admin.master')
@section('title')
Edit Subcategory
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('manage-subcategory') }}">Manage Subategory</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $subcategory->subcategory_name }}</li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>Edit subcategory</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('update-subcategory') }}" method="POST">
                    @csrf 

                    <input type="hidden" name="id" value="{{ $subcategory->id }}">
                    <div class="form-group">
                        <label for="category_id">Category Name</label>
                        <select class="form-control select2" name="category_id" id="category_id">
                            <option value="">Select</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}" {{ $subcategory->category_id == $category->id ? 'selected' : '' }} >{{ $category->category_name }}</option>
                            @empty
                                <option value="">No data found!</option>
                            @endforelse
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory_name">Subcategory Name</label>
                        <input type="text" name="subcategory_name" id="subcategory_name" value="{{ $subcategory->subcategory_name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="subcategory_description">Subcategory Description</label>
                        <textarea name="subcategory_description" id="subcategory_description" class="form-control">{{ $subcategory->subcategory_description }}</textarea>
                    </div>  
                    <div class="form-group">
                        <label class="">Status</label> <br>
                            <label class="rdiobox">
                                <input name="status" {{ $subcategory->status == 1 ? 'checked' : '' }} type="radio" value="1" >
                                <span>Publish</span>
                            </label>
                            <label class="rdiobox">
                                <input name="status" {{ $subcategory->status == 0 ? 'checked' : '' }} type="radio" value="0" >
                                <span>Unpublish</span>
                            </label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="category_btn" value="Update Subategory" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

