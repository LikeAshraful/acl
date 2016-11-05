
@extends('admin.layouts.main')

@section('title','Create users')


@section('content')

     <div id="page-wrapper">
         
         <div class="row">
             <h1 class="text-center">Create Users</h1>
         </div>
        <div class="row">
            
            {!! Form::open(['method'=>'POST','action' => 'UsersController@store']) !!}
            
            <div class="form-group">
                {!! Form::label('name','Name:' ) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('email','Email:' ) !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id',['' => 'Choose Role'] + $roles ,null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active',array(1 => 'Active', 0 =>'Not Active'), 0, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
            </div>
              
  
            {!! Form::close() !!}
             
        </div>
    </div>
@endsection
    
    

