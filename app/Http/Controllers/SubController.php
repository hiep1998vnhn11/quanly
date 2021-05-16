<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubRequest;
use App\Models\Category;
use App\Models\Sub;
use Illuminate\Http\Request;

class SubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subs = Sub::query()
            ->join('categories', 'categories.id', 'subs.category_id')
            ->select('subs.*', 'categories.name as category_name')
            ->get();
        return view('sub.index')->with(['subs' => $subs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('sub.create')->with(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubRequest $request)
    {
        $sub = Sub::create($request->validated());
        return redirect(route('sub.show', ['sub' => $sub]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sub $sub)
    {
        return view('sub.show')->with(['sub' => $sub]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sub $sub)
    {
        $categories = Category::all();

        return view('sub.edit')->with(['sub' => $sub, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubRequest $request, Sub $sub)
    {
        $sub->update($request->validated());
        return redirect(route('sub.show', ['sub' => $sub]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub $sub)
    {
        $sub->delete();
    }
}
