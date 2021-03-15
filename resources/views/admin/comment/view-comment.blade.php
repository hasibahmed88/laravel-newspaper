@extends('admin.master')
@section('title')
View Comment
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('manage-comment') }}">Manage Comment</a></li>
        <li class="breadcrumb-item">View comment</li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-12 col-lg-8 my-3">
        <div class="card shadow rounded">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-12 col-md-2"><h5>View Comment</h5></div>
                    <div class="col-12 col-md-2">
                        {{-- <a href="{{ route('edit-news',['id'=>$news->id]) }}" class="btn btn-secondary btn-sm rounded">Edit news</a> --}}
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label for="news_title">Comment</label>
                    <div class="border p-2">{{ $comment->comment  }}</div>
                </div>
                <div class="form-group">
                    <label for="news_short_description">Status</label>
                    <div>
                    @if($comment->status == 1)
                        <span class="badge badge-success">Active</span>
                    @else 
                        <span class="badge badge-danger">Inactive</span>
                    @endif
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection