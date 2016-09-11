<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ImportRequest;
use App\Import;
use App\Country;
use App\Harbor;
use App\Item;
use Session;

class ImportsController extends Controller
{
    public function index(Request $request)
    {
        // $item = Item::all();
        // $country = Country::all();
        // $harbor = Harbor::all();
        $imports = Import::orderBy('date', 'desc');
        $sort = $request->get('sort');
        if($sort =='date_asc'){
            $imports = Import::orderBy('date', 'asc');
        }else if($sort =='date_desc'){
            $imports = Import::orderBy('date', 'desc');
        }else if($sort =='netwt_asc'){
            $imports = Import::orderBy('netwt', 'asc');
        }else if($sort =='netwt_desc'){
            $imports = Import::orderBy('netwt', 'desc');
        }else if($sort =='value_asc'){
            $imports = Import::orderBy('value', 'asc');
        }else if($sort =='value_desc'){
            $imports = Import::orderBy('value', 'desc');
        }
        $imports = $imports->paginate();
        return view('imports.index', compact('imports'));
    }

    public function statistic(){
        $countriesGroup = \DB::table('imports')
            ->select('country_id', \DB::raw('count(*) as total'))
            ->groupBy('country_id')
            ->orderBy('total', 'desc')
            ->get();
        $imports = Import::orderBy(
            'harbor_id', 'asc')->get();
        return view('imports.statistic', compact('countriesGroup', 'imports'));
    }

    public function countryStats($country){
        $imports = Import::orderBy('date', 'desc')
            ->where(['country_id'=>$country]);
        $imports = $imports->paginate();
        return view('imports.show_statistic', compact('imports', 'country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::orderBy('ctrydescen')->lists('ctrydescen', 'id');
        $item = Item::orderBy('desc')->lists('desc', 'id');
        $harbor = Harbor::orderBy('podname')->lists('podname', 'id');
        return view('imports.create', compact('country', 'item', 'harbor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImportRequest $request)
    {
        Import::create($request->all());

        Session::flash('message', 'Berhasil menambah data Import!');
        return redirect('imports');
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
        $import = Import::findOrFail($id);
        $country = Country::orderBy('ctrydescen')->lists('ctrydescen', 'id');
        $item = Item::orderBy('desc')->lists('desc', 'id');
        $harbor = Harbor::orderBy('podname')->lists('podname', 'id');

        $getItem = Item::findOrFail($import->item_id);
        $getCountry = Country::findOrFail($import->country_id);
        $getHarbor = Harbor::findOrFail($import->harbor_id);
        return view('imports.edit', compact('import', 'country', 'item', 'harbor', 'getItem', 'getCountry', 'getHarbor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImportRequest $request, $id)
    {
        $import = Import::findOrFail($id);
        $import->update($request->all());

        $item = Item::findOrFail($import->id);

        Session::flash('message', 'Data Import berhasil di rubah!');
        return redirect('imports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $import = Import::findOrFail($id);
        $import->delete();

        Session::flash('message', 'Data Import berhasil di hapus!');
        return redirect('imports');
    }
}
