<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ExportRequest;
use App\Export;
use App\Country;
use App\Harbor;
use App\Item;
use Session;

class ExportsController extends Controller
{
    public function index()
    {
        // $item = Item::all();
        // $country = Country::all();
        // $harbor = Harbor::all();
        $exports = Export::orderBy('date');
        $exports = $exports->paginate();
        return view('exports.index', compact('exports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::lists('ctrydescen', 'id');
        $item = Item::lists('desc', 'id');
        $harbor = Harbor::lists('podname', 'id');
        return view('exports.create', compact('country', 'item', 'harbor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExportRequest $request)
    {
        Export::create($request->all());

        Session::flash('message', 'Berhasil menambah data Ekspor!');
        return redirect('exports');
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
        $export = Export::findOrFail($id);
        $country = Country::lists('ctrydescen', 'id');
        $item = Item::lists('desc', 'id');
        $harbor = Harbor::lists('podname', 'id');
        return view('exports.edit', compact('export', 'country', 'item', 'harbor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExportRequest $request, $id)
    {
        $export = Export::findOrFail($id);
        $export->update($request->all());

        Session::flash('message', 'Data Negara berhasil di rubah!');
        return redirect('exports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $export = Export::findOrFail($id);
        $export->delete();

        Session::flash('message', 'Data Negara berhasil di hapus!');
        return redirect('exports');
    }
}