@extends('admin.master')
@section('title')
Add News
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('manage-category') }}">Manage News</a></li>
        <li class="breadcrumb-item active">Add News</li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-12 col-lg-8 my-3">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>Add News</h5>
            </div>
            <div class="card-body">
            <form action="">
                @csrf 
                <div class="form-group">
                    <label for="category_id">Category Name</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="subcategory_id">Subcategory Name</label>
                    <select class="form-control" name="subcategory_id" id="subcategory_id">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="news_title">News title</label>
                    <input type="text" name="news_title" id="news_title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="news_short_description">News Short Description</label>
                    <textarea nname="news_short_description" id="news_short_description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="summernote">News Long Description</label>
                    <textarea nname="news_long_description" id="summernote" class="form-control"></textarea>
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
                    <label for="tags">Tags</label>
                    <select class="form-control select2" data-placeholder="Choose Tags" multiple>
                        <option value="Firefox">Firefox</option>
                        <option value="Chrome selected">Chrome</option>
                        <option value="Safari">Safari</option>
                        <option value="Opera" selected>Opera</option>
                        <option value="Internet Explorer">Internet Explorer</option>
                      </select>
                </div>
                <div class="form-group">
                    <label for="featured">Other Option</label>
                    <div class="p-2 border">
                        <label class="ckbox">
                            <input type="checkbox" name="featured">
                            <span>Featured</span>
                        </label>
                        <label class="ckbox">
                            <input type="checkbox" name="trending">
                            <span>Trending</span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="news_image">News Image</label> <br>
                    <label class="custom-file">
                        <input type="file" name="news_image" id="file" class="custom-file-input">
                        <span class="custom-file-control"></span>
                      </label>
                </div>
                <div class="form-group">
                    <input type="submit" value="Save News" class="btn btn-success">
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection