@extends('admin.master')
@section('title')
Manage category
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    </ol>
</nav>
<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>Manage Category</h5>
            </div>
            <div class="card-body">
                <div class="table-wrapper">
                    @if(Session::get('update_category'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('update_category') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    @if(Session::get('status1'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('status1') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if(Session::get('status0'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('status0') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if(Session::get('delete_category'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('delete_category') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
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
                                  <a href="{{ route('edit-category',['id'=>$category->id]) }}" class="btn btn-primary btn-sm"><i class="icon ion-edit"></i></a>
                                @if($category->status == 0)
                                  <a href="{{ route('publish-category',['id'=>$category->id]) }}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                                @else
                                  <a href="{{ route('unpublish-category',['id'=>$category->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-eye-slash"></i></a>
                                @endif
                                  <a href="#" class="btn btn-danger btn-sm" onclick="
                                    event.preventDefault();
                                    document.getElementById('delete-form'+{{$category->id}}).submit();
                                  "><i class="icon ion-trash-a"></i></a>
                                  <form id="delete-form{{ $category->id }}" action="{{ route('delete-category') }}" method="POST" class="d-none">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $category->id }}">
                                  </form>
                              </div>
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
    <div class="col-12 col-lg-4">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>Add Category</h5>
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
                <form action="{{ route('new-category') }}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" name="category_name" id="category_name" value="{{ old('category_name') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category_description">Category Description</label>
                        <textarea name="category_description" id="category_description" class="form-control">{{ old('category_description') }}</textarea>
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
                        <input type="submit" name="category_btn" value="Save Category" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection