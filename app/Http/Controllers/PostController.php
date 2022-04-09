<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        // return view ('posts.index')->with('posts', $posts);

        return view ('posts.index');
    }

    public function fetch()
    {
        return Datatables::of
        (
            Post::select('id','title','body','user_id')

        )
        ->editColumn('body', 'Hi {{ strlen($body) > 100 ? substr($body, 0, 100) . "..." : $body }}')
        ->addColumn('Actions', function($data) {
                
                return
                '
                <div>
                    <a href="/posts/' . $data->id . '" title="View Post">
                        <button class="btn btn-info btn-sm" style="margin-bottom:10px">View</button>
                    </a>
                    <br>
                    <a href="/posts/' . $data->id . '/edit" title="Edit Post">
                        <button class="btn btn-primary btn-sm" style="margin-bottom:10px">Edit</button>
                    </a>
                    <br>
                    <form method="POST" action="/posts/' . $data->id .'" accept-charset="UTF-8" style="display:inline">
                        '. method_field("DELETE") .'
                        '. csrf_field() .'
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Post" onclick="return confirm(&quot;Confirm delete?&quot;)">Delete</button>
                    </form>
                </div>
                ';
            })
        ->rawColumns(['Actions'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'unique:posts', 'min:3', 'max:255'],
            'body' => ['required', 'min:3', 'max:255']
        ]);

        $input = $request->all();
        
        Post::create($input);
        return redirect('posts')->with('flash_message', 'Post Addedd!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $post = Post::find($id);
        $post = Post::join('users', 'posts.user_id', '=', 'users.id')
                ->where('posts.id', '=', $id)
                ->select('posts.*','users.name')
                ->get()
                ->first();
        
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => ['required', 'unique:posts', 'min:3', 'max:255'],
            'body' => ['required', 'min:3', 'max:255']
        ]);
        
        $post = Post::find($id);
        $input = $request->all();
        $post->update($input);
        return redirect('posts')->with('flash_message', 'Post Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect('posts')->with('flash_message', 'Post deleted!');  
    }
}
