<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth')->except('show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function usersList()
    {
        //SELECT * FROM USERS ordered by date it was created
        $users = User::orderBy('name', 'ASC')->get();
        return view('users.usersList', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')->with('user', $user);
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
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        $user->update([
            'role_id' => $request->input('role_id'),
        ]);

        return redirect('/users/usersList');
    }

    public function updateProfile(CreateUserRequest $request, $id)
    {
        $request->validated();

        $user = User::find($id);
        if(! is_null($request->file('image'))){
            $newImageName = time().'-'.$request->file('image')->getClientOriginalName();
            $path = $request->image->move(public_path('images'), $newImageName);
            
            $user->update([
                'image_path' => $newImageName,
            ]);

        }
        else{
            $user->update([
                'image_path' => $user->image_path,
            ]);
        }
        
        $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'birthday' => $request->input('birthday'),
                'about_me' => $request->input('about_me'),
            ]);

        return redirect(route('users.show', $id))->with('user', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users/usersList');
    }
}
