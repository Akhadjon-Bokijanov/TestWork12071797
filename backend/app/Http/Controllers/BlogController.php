<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Blog::with(array('user'))->paginate(10);
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
        try {
            $data = $request->only(["title", "description"]);
            $data["user_id"] = auth()->id();
            return Blog::create($data);

        }catch (\Exception $exception){
            return ["error"=>$exception->getMessage(), "success"=>false];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try {
            return [
                "success"=>true,
                "data"=>Blog::with(['user'])->find($id)
            ];
        }catch (\Exception $exception){
            return ["success"=>false, "error"=>$exception->getMessage()];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $blog =Blog::find($id);
            return $blog->update($request->only(["title", "description"]));
        }catch (\Exception $exception){
            return ["success"=>false, "error"=>$exception->getMessage()];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
        return $blog->delete();
    }


}
