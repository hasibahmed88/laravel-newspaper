@extends('admin.master')
@section('title')
View News
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('manage-news') }}">Manage News</a></li>
        <li class="breadcrumb-item">{{ $news->news_title  }}</li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-12 col-lg-8 my-3">
        <div class="card shadow rounded">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-12 col-md-2"><h5>View News</h5></div>
                    <div class="col-12 col-md-2">
                        <a href="{{ route('edit-news',['id'=>$news->id]) }}" class="btn btn-primary btn-sm">Edit news</a>
                    </div>
                </div>
            </div>
            <div class="card-body">

            <form action="" method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="category_id">Category Name</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Select</option>
                    @forelse ($categories as $item)
                        <option value="" {{ $news->category_id == $item->id ? 'selected' : '' }} >{{ $item->category_name }}</option>
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
                        <option value="" {{ $news->subcategory_id == $item->id ? 'selected' : '' }} >{{ $item->subcategory_name }}</option>
                    @empty
                        <option value="">No data found</option>
                    @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="news_title">News title</label>
                    <div class="border p-2">{{ $news->news_title  }}</div>
                </div>
                <div class="form-group">
                    <label for="news_short_description">News Short Description</label>
                    <div class="border p-2">{{ $news->news_short_description  }}</div>
                </div>
                <div class="form-group">
                    <label for="summernote">News Long Description</label>
                    <div class="border p-2">{!! $news->news_long_description  !!}</div>
                </div>
                <div class="form-group">
                    <label class="">Status</label> <br>
                        <label class="rdiobox">
                            <input name="status" {{ $news->status == 1 ? 'checked' : ''  }} type="radio" value="1" >
                            <span>Publish</span>
                        </label>
                        <label class="rdiobox">
                            <input name="status" {{ $news->status == 0 ? 'checked' : ''  }} type="radio" value="0" >
                            <span>Unpublish</span>
                        </label>
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <div class="border p-2">{{ $news->tags  }}</div>
                </div>
                <div class="form-group">
                    <label for="">Other Option</label>
                    <div class="p-2 border">
                        <label class="ckbox" for="featured">
                            <input type="checkbox" id="featured"{{ $news->featured == 1 ? 'checked' : ''  }} value="1" name="featured">
                            <span>Featured</span>
                        </label>
                        <label class="ckbox" for="trend">
                            <input type="checkbox" id="trend" {{ $news->trending == 1 ? 'checked' : ''  }} value="1" name="trending">
                            <span>Trending</span>
                        </label>

                    </div>
                </div>
                <div class="form-group">
                    <label for="news_image">News Image</label> <br>
                    <img src="{{ '/' }}admin/news-image/{{ $news->news_image }}" width="200px" class="border rounded" alt="">
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection