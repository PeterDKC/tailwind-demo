<?php

namespace App\Http\Controllers;

use App\Tree;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index')
            ->withTrees(Tree::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tree = Tree::create($request->all());

        return redirect()
            ->route('trees.show', ['tree' => $tree]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tree $tree
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Tree $tree)
    {
        return view('trees.show')
            ->withTree($tree);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tree  $tree
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Tree $tree)
    {
        return view('trees.edit')
            ->withTree($tree);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tree  $tree
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tree $tree)
    {
        $tree->update($request->all());

        return redirect()
            ->route('trees.show', ['tree' => $tree]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tree $tree)
    {
        $tree->delete();

        return redirect('/');
    }
}
