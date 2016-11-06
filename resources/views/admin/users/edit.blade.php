
@extends('admin.layouts.main')

@section('title','Create users')


@section('content')

     <div id="page-wrapper">
         
         <div class="row">
             <h1 class="text-center">Edit User</h1>
         </div>
        <div class="row">
            
            <div class="col-md-8 col-md-offset-2">
                
                {!! Form::model($user, ['method'=>'PATCH','action' => ['UsersController@update', $user->id] ]) !!}
                
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name','Name:' ) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email','Email:' ) !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                    {!! Form::label('role_id', 'Role:') !!}
                    {!! Form::select('role_id',$roles ,null, ['class' => 'form-control']) !!}
                    
                    @if ($errors->has('role_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role_id') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
                    {!! Form::label('is_active', 'Status:') !!}
                    {!! Form::select('is_active',array(1 => 'Active', 0 =>'Not Active'), null, ['class' => 'form-control']) !!}
                    
                    @if ($errors->has('is_active'))
                        <span class="help-block">
                            <strong>{{ $errors->first('is_active') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password','Password:' ) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group">
                    {!! Form::submit('Edit User', ['class' => 'btn btn-primary']) !!}
                </div>
                  
      
                {!! Form::close() !!}
                 
            </div>
        </div>
        
    </div>
@endsection
    
    

