@extends('admin.master')
@section('title')
Trashed ads
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('manage-ads') }}">Manage Ads</a></li>
        <li class="breadcrumb-item active">Trashed Ads</li>
    </ol>
</nav>
trashed

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
                    @if(Session::get('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('delete') }}
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
                          <th class="wd-20p">Ads Title</th>
                          <th class="wd-20p">Ads Description</th>
                          <th class="wd-20p">Photo</th>
                          <th class="wd-20p">Expire date</th>
                          <th class="wd-10p">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                    @php($i = 1)
                    @forelse($trashed as $item)
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
                              <div class="btn-group">

                                <a href="{{ route('restore-ads',['id'=>$item->id]) }}" class="btn btn-primary btn-sm" title="Restore news"><i class="fa fa-reply"></i></a>

                                  <a href="#" title="Permanent delete" class="btn btn-danger btn-sm" onclick="
                                    event.preventDefault();
                                    var check = confirm('Are you sure?');
                                    if(check){
                                        document.getElementById('delete-table'+{{ $item->id }}).submit()
                                    }
                                  " ><i class="icon ion-trash-a"></i></a>
                              </div>
                              <form id="delete-table{{ $item->id }}" action="{{ route('permanent-delete-ads') }}" method="POST">
                                  @csrf 
                                  <input type="hidden" name="id" value="{{ $item->id }}">
                              </form>
                          </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
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
