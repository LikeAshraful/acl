<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;

use Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::lists('name','id')->all();
        return view('admin.users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validation = Validator::make($request->all(),[
           
           'name' => 'required | max:255',
           'email' => 'required | unique:users',
           'role_id' => 'required',
           'is_active' => 'required',
           'password' => 'required | min:6',
           
           ]);
           
       if($validation->fails()){
       
            return redirect()->back()->withInput()->withErrors($validation);
       }
       
        $user = new User;
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->is_active = $request->is_active;
        
        $user->password = bcrypt($request->password);
        
        $user->save();
        
        return redirect('/admin/users')->with('massage', 'Successfully Created Users');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::lists('name','id')->all();
        return view('admin.users.edit')->with('user', $user)->with('roles',$roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
       
        $validation = Validator::make($request->all(),[
            
           'name' => 'required | max:255',
           'email' => 'required',
           'role_id' => 'required',
           'is_active' => 'required',
           
           ]);
           
       if($validation->fails()){
       
            return redirect()->back()->withInput()->withErrors($validation);
       }
        
            $user = User::find($id);
       
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->role_id = $request['role_id'];
            $user->is_active = $request['is_active'];
            $user->password = bcrypt($request['password']);
        

        
        
         $user->save();
        
        
       
        
        return redirect('/admin/users')->with('message', 'Users Successfully Updated!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
