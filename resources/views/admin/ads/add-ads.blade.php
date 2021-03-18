@extends('admin.master')
@section('title')
Add ads
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('manage-ads') }}">Manage Ads</a></li>
        <li class="breadcrumb-item active">Add Ads</li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>Add ads</h5>
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
                        <select name="category_name" id="category_name" class="form-control">
                            <option value="">Select</option>
                            <option value="banner">Banner</option>
                            <option value="side_square">Side Square</option>
                            <option value="side_long">Side Long</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ads_title">Ads title</label>
                        <input type="text" name="ads_title" id="ads_title" value="{{ old('ads_title') }}" class="form-control" placeholder="banner_ads_one">
                    </div>
                    <div class="form-group">
                        <label for="ads_description">Ads descripiton</label>
                        <textarea name="ads_description" id="ads_description" class="form-control" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_name">Ads photo</label>
                        <input type="file" name="ads_photo" class="form-control">
                        <br>
                        <div class="border rounded p-2" >
                            <ul>
                                <li>Banner          : 950 * 100 px</li>
                                <li>Side square     : 400 * 400 px</li>
                                <li>Side long       : 250 * 450 px</li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" class="form-control" value="{{ old('link') }}" id="link" >
                    </div> 
                    <div class="form-group">
                        <label for="expire_date">Expire date</label>
                        <input type="date" name="expire_date" class="form-control" id="expire_date" >
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
                        <input type="submit" name="ads_btn" value="Save Ads" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
