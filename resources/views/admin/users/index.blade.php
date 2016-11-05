
@extends('admin.layouts.main')

@section('title','all users')


@section('content')

     <div id="page-wrapper">
         
         <div class="row">
             <h1 class="text-center">All Users</h1>
         </div>
         
         
        <div class="row">
          
          @if (session('massage'))
              <div class="alert alert-success">
                  {{ session('massage') }}
              </div>
          @endif

             <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Created</th>
                      <th>Updated</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($users as $user)
                    <tr>
                      <th scope="row">{{$user->id}}</th>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->role->name }}</td>
                      <td>{{$user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                      <td>{{$user->created_at->diffForHumans() }}</td>
                      <td>{{$user->updated_at->diffForHumans() }}</td>
                    </tr>
                        @endforeach
                    
                  </tbody>
                
            </table>
        </div>
    </div>
@endsection
    
    

