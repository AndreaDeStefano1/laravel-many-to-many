<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::OrderBy('id', 'desc')->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
            'title' => 'required | max:50 | min:3',
            'text' => 'required | min:10'
            ]) ;

        $data = $request->all();

        $new_post = new Post();
        $data['slug'] = Post::generateSlug($data['title']);
        $new_post->fill($data);
        $new_post->save();

        return redirect()->route('admin.posts.show', $new_post);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.post.show', compact('post'));
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
        return view('admin.post.edit', compact('post'));
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
        $data = $request->validate([
                'title' => 'required | max:50 | min:3',
                'text' => 'required | min:10'
            ]) ;
        $data['slug'] = Post::generateSlug($request['title']);
        $post = Post::find($id);
        $data = $request->all();
        $post->update($data);
        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $titolo = $post->title;
        $post->delete();
        return redirect()->route('admin.posts.index', compact('titolo'))->with('confirm', 'Hai eliminato correttamente il post ')->with('titolo', $titolo);
    }
}
