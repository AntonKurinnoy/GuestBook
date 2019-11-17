<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('checkIfAdmin');
    }

    public function delComment($id)
    {
        if($id){
            Comment::destroy($id);   
        }

        return redirect('/');
    }

    /**
     * shows all users
     */
    public function users()
    {
        $users = User::where('admin',false)->get();

        return view('users',[
            'users' => $users
        ]);
    }

    /**
     * block user
     */
    public function block(Request $request){

        if($request->block == 'yes'){
            User::find($request->id)->update(['blocked' => 1]);
        } else {
            User::find($request->id)->update(['blocked' => 0]);
        }

        return response()->json('success');
    }
}
