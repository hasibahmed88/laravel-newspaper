@extends('admin.master')
@section('title')
Trashed
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('manage-subcategory') }}">Manage Subcategory</a></li>
        <li class="breadcrumb-item active" aria-current="page">Library</li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>Trashed Subcategories</h5>
            </div>
            <div class="card-body">
                <div class="table-wrapper">
                    @if(Session::get('message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                                    <a href="{{ route('restore-subcategory',['id'=>$item->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-reply"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="
                                        event.preventDefault();
                                        var check = confirm('Are you sure?')
                                        if(check){
                                            document.getElementById('delete-table'+{{ $item->id }} ).submit();
                                        }
                                    "><i class="icon ion-trash-a"></i></a>
                                </div>
                                <form id="delete-table{{ $item->id }}" action="{{ route('permanent-delete-subcategory') }}" method="POST">
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
</div>

@endsection
