<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\HarborRequest;
use App\Harbor;
use Session;

class HarborsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $harbors = Harbor::orderBy('podname');
        $harbors = $harbors->paginate();
        return view('harbor.index', compact('harbors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('harbor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HarborRequest $request)
    {
        Harbor::create($request->all());
        Session::flash('message', 'Berhasil menambah data Pelabuhan!');
        return redirect('harbor');
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
        $harbor = Harbor::findOrFail($id);
        return view('harbor.edit', compact('harbor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HarborRequest $request, $id)
    {
        $harbor = Harbor::findOrFail($id);
        $harbor->update($request->all());

        Session::flash('message', 'Data Pelabuhan berhasil di rubah!');
        return redirect('harbor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $harbor = Harbor::findOrFail($id);
        $harbor->delete();

        Session::flash('message', 'Data Pelabuhan berhasil di hapus!');
        return redirect('harbor');
    }
}
