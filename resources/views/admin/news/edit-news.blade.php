@extends('admin.master')
@section('title')
Edit News
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('manage-category') }}">Manage News</a></li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-12 col-lg-10">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>Trashed News</h5>
            </div>
            <div class="card-body">
                asdf
            </div>
        </div>
    </div>
</div>


@endsection