@extends('admin.master')
@section('title')
Manage subcategory
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
                <h5>Manage Subcategory</h5>
            </div>
            <div class="card-body">
                <div class="table-wrapper">
                    @if(Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
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
                          <th class="wd-20p">Subategory Name</th>
                          <th class="wd-20p">Category Description</th>
                          <th class="wd-15p">Status</th>
                          <th class="wd-10p">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                    @php($i = 1)
                    @forelse ($subcategories as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->category_name }}</td>
                            <td>{{ $item->subcategory_name }}</td>
                            <td>{{ $item->subcategory_description }}</td>
                            <td>
                            @if($item->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else 
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('edit-subcategory',['id'=>$item->id]) }}" class="btn btn-primary btn-sm"><i class="icon ion-edit"></i></a>
                                    @if($item->status == 1)
                                        <a href="{{ route('unpublish-subcategory',['id'=>$item->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-eye-slash"></i></a>
                                    @else 
                                        <a href="{{ route('publish-subcategory',['id'=>$item->id]) }}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                                    @endif
                                    <a href="#" class="btn btn-danger btn-sm" onclick="
                                        event.preventDefault();
                                        document.getElementById('delete-table'+{{ $item->id }} ).submit();
                                    "><i class="icon ion-trash-a"></i></a>
                                </div>
                                <form id="delete-table{{ $item->id }}" action="{{ route('delete-subcategory') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
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
    <div class="col-12 col-lg-4">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>Add Subcategory</h5>
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
                <form action="{{ route('new-subcategory') }}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <label for="category_id">Category Name</label>
                        <select class="form-control select2" name="category_id" id="category_id">
                            <option value="">Select</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @empty
                                <option value="">No data found!</option>
                            @endforelse
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory_name">Subcategory Name</label>
                        <input type="text" name="subcategory_name" id="subcategory_name" value="{{ old('subcategory_name') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="subcategory_description">Subcategory Description</label>
                        <textarea name="subcategory_description" id="subcategory_description" class="form-control">{{ old('subcategory_description') }}</textarea>
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