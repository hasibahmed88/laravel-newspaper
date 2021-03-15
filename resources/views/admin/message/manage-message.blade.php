@extends('admin.master')
@section('title')
Manage Message
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Manage Message</li>
    </ol>
</nav>
<div class="row justify-content-center">
    <div class="col-12 col-lg-10">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>Manage Message</h5>
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
                          <th class="wd-15p">Name</th>
                          <th class="wd-15p">Email</th>
                          <th class="wd-15p">Subject</th>
                          <th class="wd-10p">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                    @forelse($message as $item)
                        <tr class="{{ $item->status == 0 ? 'bg-dark' : ''  }}">
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->email }}</td>
                          <td>{{ Str::limit($item->subject, 500, '...') }}</td>
                          <td>
                              <div class="btn-group">
                                  <a href="{{ route('view-message',['id'=>$item->id]) }}" class="btn btn-sm btn-primary }}">View</a>
                                  <a href="{{ route('delete-subscriber') }}" class="btn btn-sm btn-danger" onclick="
                                    event.preventDefault();
                                    var check = confirm('Are you sure to delete this subscriber?');
                                    if(check){
                                        document.getElementById('delete-table'+{{ $item->id }}).submit()
                                    }
                                  ">Delete</a>
                              </div>
                              <form id="delete-table{{ $item->id }}" action="{{ route('delete-subscriber') }}" method="POST">
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