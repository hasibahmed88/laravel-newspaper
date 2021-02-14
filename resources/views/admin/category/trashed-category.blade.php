@extends('admin.master')
@section('title')
Trashed Categories
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('manage-category') }}">Manage Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">Library</li>
    </ol>
</nav>

<div class="row justify-content-center">
<div class="col-12 col-lg-8">
    <div class="card shadow rounded">
        <div class="card-header">
            <h5>Trashed Categories</h5>
        </div>
        <div class="card-body">
            <div class="table-wrapper">
                @if(Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success</strong> {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(Session::get('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('delete') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            <h6 class="text-center text-success"></h6>
                <table id="datatable1" class="table display responsive nowrap">
                  <thead>
                    <tr>
                      <th class="wd-15p">No</th>
                      <th class="wd-15p">Category Name</th>
                      <th class="wd-20p">Category Description</th>
                      <th class="wd-15p">Status</th>
                      <th class="wd-10p">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                @php($i = 1)
                @forelse($categories as $category)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $category->category_name }}</td>
                      <td>{{ $category->category_description }}</td>
                      <td>
                        @if($category->status == 1)
                          <span class="badge badge-success">Active</span>
                        @else
                          <span class="badge badge-danger">Inactive</span>
                        @endif
                      </td>
                      <td>
                          <div class="btn-group">
                              <a href="{{ route('restore-category',['id'=>$category->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-reply"></i></a>
                              <a href="{{ route('permanent-delete-category')}}" class="btn btn-danger btn-sm" onclick="
                                event.preventDefault();
                                var check = confirm('Are you sure?');
                                if(check){
                                    document.getElementById('delete-form'+{{ $category->id }}).submit();
                                }
                              "><i class="icon ion-trash-a"></i></a>
                          </div>
                          <form id="delete-form{{ $category->id }}" action="{{ route('permanent-delete-category') }}" method="post">
                              @csrf 
                              <input type="hidden" name="id" value="{{ $category->id }}">
                          </form>
                      </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            <p>No data found!</p>
                        </td>
                    </tr>
                @endforelse
                   
                  </tbody>
                </table>
              </div><!-- table-wrapper -->
        </div>
    </div>
</div>
</div>

@endsection

