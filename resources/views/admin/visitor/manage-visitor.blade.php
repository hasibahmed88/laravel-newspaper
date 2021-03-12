@extends('admin.master')
@section('title')
Manage visitors
@endsection

@section('body')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Manage visitors</li>
    </ol>
</nav>
<div class="row justify-content-center">
    <div class="col-12 col-lg-10">
        <div class="card shadow rounded">
            <div class="card-header">
                <h5>Manage Visitors</h5>
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
                          <th class="wd-15p">Visitor Name</th>
                          <th class="wd-20p">Email</th>
                          <th class="wd-20p">Status</th>
                          <th class="wd-10p">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                    @php($i = 1)
                    @forelse($visitors as $visitor)
                        <tr>
                          <td>{{ $i++ }}</td>
                        <td>{{ $visitor->visitor_name }}</td>
                        <td>{{ $visitor->email }}</td>
                        <td>
                            @if($visitor->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else 
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                          <td>
                            <div class="btn-group">
                                <a href="{{ route('visitor-logout',['ip'=>$visitor->ip]) }}" class="btn btn-primary btn-sm"><i class="fa fa-reply"></i> Logout</a>
                                <a href="#" class="btn btn-danger btn-sm" onclick="
                                    event.preventDefault();
                                    var check = confirm('Are you sure?');
                                    if(check){
                                        document.getElementById('delete-form'+{{ $visitor->id }}).submit();
                                    }
                                "><i class="icon ion-trash-a"></i> Delete</a>
                            </div>
                          <form id="delete-form{{ $visitor->id }}" action="{{ route('delete-visitor') }}" method="POST">
                                @csrf 
                                <input type="hidden" name="id" value="{{ $visitor->id }}">
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