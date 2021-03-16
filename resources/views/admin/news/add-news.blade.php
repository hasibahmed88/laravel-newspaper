@extends('admin.master')
@section('title')
Add News
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('manage-news') }}">Manage News</a></li>
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('new-news') }}" method="POST" enctype="multipart/form-data">
                @if(Session::get('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success</strong> {{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                @csrf 
                <div class="form-group">
                    <label for="category_id">Category Name</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Select</option>
                    @forelse ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->category_name_bn }}</option>
                    @empty
                        <option value="">No data found</option>
                    @endforelse
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="subcategory_id">Subcategory Name</label>
                    <select class="form-control" name="subcategory_id" id="subcategory_id">
                        <option value="">Select</option>
                    @forelse ($subcategories as $item)
                        <option value="{{ $item->id }}">{{ $item->subcategory_name }}</option>
                    @empty
                        <option value="">No data found</option>
                    @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="news_title">News title</label>
                    <input type="text" name="news_title" id="news_title" value="{{ old('news_title') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="news_short_description">News Short Description</label>
                    <textarea name="news_short_description" id="news_short_description" class="form-control">{{ old('news_short_description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="summernote">News Long Description</label>
                    <textarea name="news_long_description" id="summernote" class="form-control">{{ old('news_long_description') }}</textarea>
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
                    <input type="text" class="form-control" data-role="tagsinput" name="tags">
                </div>
                <div class="form-group">
                    <label for="">Other Option</label>
                    <div class="p-2 border">
                        <label class="ckbox" for="featured">
                            <input type="checkbox" id="featured" value="1" name="featured">
                            <span>Featured</span>
                        </label>
                        <label class="ckbox" for="special">
                            <input type="checkbox" id="special" value="1" name="special">
                            <span>special</span>
                        </label>
                        <label class="ckbox" for="trend">
                            <input type="checkbox" id="trend" value="1" name="trending">
                            <span>Trending</span>
                        </label>

                    </div>
                </div>
                <div class="form-group">
                    <label for="news_image">News Image</label> <br>
                    <input type="file" name="news_image" id="news_image" class="form-control">
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