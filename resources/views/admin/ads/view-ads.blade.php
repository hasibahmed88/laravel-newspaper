@extends('admin.master')
@section('title')
View ads
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('manage-ads') }}">Manage Ads</a></li>
        <li class="breadcrumb-item active">View Ads</li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="card shadow rounded">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-12 col-md-2">
                        <h5>View ads</h5>
                    </div>
                    <div class="col-12 col-md-1">
                        <a href="{{ route('edit-ads',['id'=>$ads->id]) }}"  class="btn btn-secondary btn-sm rounded">Edit</a>
                    </div>
                </div>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('new-ads') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <select name="category_name" id="category_name" class="form-control" disabled>
                            <option value="">Select</option>
                            <option value="banner" {{ $ads->category_name == 'banner' ? 'selected' : '' }} >Banner</option>
                            <option value="side_square" {{ $ads->category_name == 'side_square' ? 'selected' : '' }}>Side Square</option>
                            <option value="side_long" {{ $ads->category_name == 'side_long' ? 'selected' : '' }}>Side Long</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ads_title">Ads title</label>
                        <div class="border rounded p-2">{{ $ads->ads_title }}</div>
                    </div>
                    <div class="form-group">
                        <label for="ads_description">Ads descripiton</label>
                        <div class="border rounded p-2">{{ $ads->ads_description }}</div>
                    </div>
                    <div class="form-group">
                        <label for="category_name">Ads photo</label> <br>
                        <img src="{{ asset('/') }}admin/ads-image/{{ $ads->ads_photo }}" class="rounded border" width="200px" alt="">
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <div class="border rounded p-2">{{ $ads->link }}</div>
                    </div> 
                    <div class="form-group">
                        <label for="expire_date">Expire date</label>
                        <div class="border rounded p-2">{{ $ads->expire_date }}</div>
                    </div>  
                    <div class="form-group">
                        <label class="">Status</label> <br>
                            @if($ads->status == 1) 
                            <span>Publish</span>
                            @else 
                            <span>Unpublish</span>
                            @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" name="ads_btn" value="Save Ads" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
