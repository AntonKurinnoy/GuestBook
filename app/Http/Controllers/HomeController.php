<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Overriding paginate method, so that we could use items Collection
     *
     * @return LengthAwarePaginator
     */
    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    /**
     * Home page with all or users comments
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($myCom = false)
    {

        if($myCom){
            $comments = Comment::where('user_id',Auth::id())->orderBy('created_at', 'desc')->get();
        } else {
            $comments = Comment::orderBy('created_at', 'desc')->get();
        }
        $comments = $this->paginate($comments, 15, null, ['path'=>url()->current().'/']);

        return view('home',[
            'comments' => $comments
        ]);
    }

    public function addComment(Request $request){

        $comment = new Comment;

        $comment->comment = $request->comment;
        $comment->user_id = $request->user;

        $comment->save();

        return redirect('/');
    }
}
