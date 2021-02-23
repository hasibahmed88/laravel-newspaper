@extends('admin.master')
@section('title')
Manage ads
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('add-ads') }}">Add Ads</a></li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-12 col-lg-10">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>Manage Category</h5>
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
                    @if(Session::get('warning'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('warning') }}
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
                          <th class="wd-20p">Photo</th>
                          <th class="wd-20p">Link</th>
                          <th class="wd-20p">Expire date</th>
                          <th class="wd-15p">Status</th>
                          <th class="wd-10p">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                    @php($i = 1)
                    @forelse($ads as $item)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $item->category_name }}</td>
                          <td>{{ $item->ads_title }}</td>
                          <td>{{ Str::limit($item->ads_description, 60, '...') }}</td>
                          <td>
                              <img src="{{ asset('/') }}admin/ads-image/{{ $item->ads_photo }}" width="100px" alt="">
                          </td>
                          <td>{{ $item->expire_date }}</td>
                          <td>
                            @if($item->status == 1)
                              <span class="badge badge-success">Active</span>
                            @else
                              <span class="badge badge-danger">Inactive</span>
                            @endif
                          </td>
                          <td>
                              <div class="btn-group">
                                  <a href="{{ route('view-ads',['id'=>$item->id]) }}" class="btn btn-warning btn-sm">View</a>
                                  <a href="{{ route('edit-ads',['id'=>$item->id]) }}" class="btn btn-primary btn-sm"><i class="icon ion-edit"></i></a>
                                @if($item->status == 0)
                                  <a href="{{ route('publish-ads',['id'=>$item->id]) }}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                                @else
                                  <a href="{{ route('unpublish-ads',['id'=>$item->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-eye-slash"></i></a>
                                @endif
                                  <a href="#" class="btn btn-danger btn-sm" onclick="
                                    event.preventDefault();
                                    document.getElementById('delete-table'+{{ $item->id }}).submit()
                                  " ><i class="icon ion-trash-a"></i></a>
                              </div>
                              <form id="delete-table{{ $item->id }}" action="{{ route('delete-ads') }}" method="POST">
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
