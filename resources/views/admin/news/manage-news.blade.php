@extends('admin.master')
@section('title')
Manage News
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('add-news') }}">Add News</a></li>
        <li class="breadcrumb-item active">Manage News</li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-12">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>Manage Category</h5>
            </div>
            <div class="card-body">
                
                @if(Session::get('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(Session::get('status_message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ Session::get('status_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

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
                          <th class="wd-20p">Subcategory Name</th>
                          <th class="wd-20p">News title</th>
                          <th class="wd-20p">News short des</th>
                          <th class="wd-15p">Status</th>
                          <th class="wd-15p">Image</th>
                          <th class="wd-10p">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                    @php($i = 1)
                    @forelse($news as $item)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $item->category_name_bn }}</td>
                          <td>{{ $item->subcategory_name }}</td>
                          <td>{{ Str::limit($item->news_title, 30, '...') }}</td>
                          <td>{{ Str::limit($item->news_short_description, 60, '...') }}</td>
                          <td>
                            @if($item->status == 1)
                              <span class="badge badge-success">Active</span>
                            @else 
                              <span class="badge badge-danger">Inactive</span>
                            @endif
                          </td>
                          <td>
                            <img src="{{ '/' }}admin/news-image/{{ $item->news_image }}" width="100px" class="border rounded" alt="">
                          </td>
                          <td>
                              <div class="btn-group">
                                  <a href="{{ route('view-news',['id'=>$item->id]) }}" title="View news" class="btn btn-warning btn-sm">View</a>
                                  <a href="{{ route('edit-news',['id'=>$item->id]) }}" class="btn btn-primary btn-sm" title="Edit news"><i class="icon ion-edit"></i></a>
                                @if($item->status == 0)
                                  <a href="{{ route('publish-news',['id'=> $item->id]) }}" title="Publish news" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                                @else 
                                  <a href="{{ route('unpublish-news',['id'=> $item->id]) }}" title="Unpublish news" class="btn btn-success btn-sm"><i class="fa fa-eye-slash"></i></a>
                                @endif
                                  <a href="#" class="btn btn-danger btn-sm" title="Move to trash" onclick="
                                    event.preventDefault();
                                    document.getElementById('delete-table'+{{ $item->id }}).submit()
                                  " ><i class="icon ion-trash-a"></i></a>
                              </div>
                            <form id="delete-table{{ $item->id }}" action="{{ route('delete-news') }}" method="POST">
                                @csrf 
                                <input type="hidden" name="id" value="{{ $item->id }}">    
                            </form>
                          </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">
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