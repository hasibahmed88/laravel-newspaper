@extends('admin.master')
@section('title')
Trashed News
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('manage-news') }}">Manage News</a></li>
        <li class="breadcrumb-item">Trashed News</li>
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

                @if(Session::get('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ Session::get('warning') }}
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
                          <td>{{ $item->category_name }}</td>
                          <td>{{ $item->subcategory_name }}</td>
                          <td>{{ Str::limit($item->news_title, 30, '...') }}</td>
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
                                <a href="{{ route('restore-news',['id'=>$item->id]) }}" class="btn btn-primary btn-sm" title="Restore news"><i class="fa fa-reply"></i></a>
                                <a href="#" class="btn btn-danger btn-sm" title="Permanent delete" onclick="
                                    event.preventDefault();
                                    let check = confirm('Are you sure?');
                                    if(check){
                                        document.getElementById('delete-form'+{{ $item->id }}).submit()
                                    }
                                "><i class="icon ion-trash-a"></i></a>
                              </div>
                                <form action="{{ route('permanent-delete-news') }}" method="POST" id="delete-form{{ $item->id }}">
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