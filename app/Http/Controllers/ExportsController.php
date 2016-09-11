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
    public function index(Request $request)
    {
        // $item = Item::all();
        // $country = Country::all();
        // $harbor = Harbor::all();
        $exports = Export::orderBy('date', 'desc');
        $sort = $request->get('sort');
        if($sort =='date_asc'){
            $exports = Export::orderBy('date', 'asc');
        }else if($sort =='date_desc'){
            $exports = Export::orderBy('date', 'desc');
        }else if($sort =='netwt_asc'){
            $exports = Export::orderBy('netwt', 'asc');
        }else if($sort =='netwt_desc'){
            $exports = Export::orderBy('netwt', 'desc');
        }else if($sort =='value_asc'){
            $exports = Export::orderBy('value', 'asc');
        }else if($sort =='value_desc'){
            $exports = Export::orderBy('value', 'desc');
        }
        $exports = $exports->paginate();
        return view('exports.index', compact('exports'));
    }

    public function statistic(){
        $countriesGroup = \DB::table('exports')
            ->select('country_id', \DB::raw('count(*) as total'))
            ->groupBy('country_id')
            ->orderBy('total', 'desc')
            ->get();
        $exports = Export::orderBy(
            'harbor_id', 'asc')->get();
        return view('exports.statistic', compact('countriesGroup', 'exports'));
    }

    public function countryStats($country){
        $exports = Export::orderBy('date', 'desc')
            ->where(['country_id'=>$country]);
        $exports = $exports->paginate();
        return view('exports.show_statistic', compact('exports', 'country'));
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
        $country = Country::orderBy('ctrydescen')->lists('ctrydescen', 'id');
        $item = Item::orderBy('desc')->lists('desc', 'id');
        $harbor = Harbor::orderBy('podname')->lists('podname', 'id');

        $getItem = Item::findOrFail($export->item_id);
        $getCountry = Country::findOrFail($export->country_id);
        $getHarbor = Harbor::findOrFail($export->harbor_id);
        return view('exports.edit', compact('export', 'country', 'item', 'harbor', 'getItem', 'getCountry', 'getHarbor'));
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

        Session::flash('message', 'Data Export berhasil di rubah!');
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

        Session::flash('message', 'Data Export berhasil di hapus!');
        return redirect('exports');
    }
}
