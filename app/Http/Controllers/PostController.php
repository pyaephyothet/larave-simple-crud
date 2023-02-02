<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $table = Post::orderBy('created_at', 'desc')->get()->toArray();
        return view('create', compact('table'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $this->getData($request);
        Post::create($data);
        return back()->with(['success' => 'Post Created!']);

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
        $edit = Post::where('id', $id)->first()->toArray();
        return view('edit', compact('edit'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $detail = Post::where('id', $id)->first()->toArray();
        return view('update', compact('detail'));
    }

    public function updatePost(Request $request)
    {
        $updateData = $this->updateData($request);
        $id = $request->updateID;
        Post::where('id', $id)->update($updateData);
        return redirect()->route('home')->with(['updatSuccess' => 'Post Updated!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id)->delete();
        return back();
    }

    //private functions

    private function getData($request)
    {
        return [
            'task' => $request->postTask,
        ];
    }

    private function updateData($request)
    {
        return [
            'task' => $request->updateTask,
        ];
    }
}