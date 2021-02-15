@extends('admin.master')
@section('title')
View News
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('manage-category') }}">Manage News</a></li>
        <li class="breadcrumb-item"><a href="{{ route('manage-category') }}">Add News</a></li>
    </ol>
</nav>

@endsection