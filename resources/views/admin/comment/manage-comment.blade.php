@extends('admin.master')
@section('title')
Manage Comment
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Manage Comment</li>
    </ol>
</nav>
<div class="row justify-content-center">
    <div class="col-12 col-lg-10">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>Manage Comment</h5>
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
                    @if(Session::get('delete_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('delete_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    <table id="datatable1" class="table display responsive nowrap">
                      <thead>
                        <tr>
                          <th class="wd-15p">No</th>
                          <th class="wd-15p">Visitor Name</th>
                          <th class="wd-20p">News Title</th>
                          <th class="wd-20p">Comment</th>
                          <th class="wd-15p">Status</th>
                          <th class="wd-10p">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                    @php($i = 1)
                    @forelse($comments as $item)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $item->visitor_name }}</td>
                          <td>{{ Str::limit($item->news_title,30,'...') }}</td>
                          <td>{{ Str::limit($item->comment,50,'...') }}</td>
                          <td>
                            @if($item->status == 1)
                              <span class="badge badge-success">Active</span>
                            @else
                              <span class="badge badge-danger">Inactive</span>
                            @endif
                          </td>
                          <td>
                              <div class="btn-group">
                                <a href="{{ route('view-comment',['id'=>$item->id]) }}" class="btn btn-sm btn-info">View</a>
                                @if($item->status == 1)
                                <a href="{{ route('unpublish-comment',['id'=>$item->id]) }}" class="btn btn-sm btn-success">Unpublish</a>
                                @else 
                                <a href="{{ route('publish-comment',['id'=>$item->id]) }}" class="btn btn-sm btn-secondary">Publish</a>
                                @endif
                                  <a href="{{ route('delete-comment') }}" class="btn btn-sm btn-danger" onclick="
                                    event.preventDefault();
                                    var check = confirm('Are you sure to delete this comment?');
                                    if(check){
                                        document.getElementById('delete-table'+{{ $item->id }}).submit()
                                    }
                                  ">Delete</a>
                              </div>
                              <form id="delete-table{{ $item->id }}" action="{{ route('delete-comment') }}" method="POST">
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