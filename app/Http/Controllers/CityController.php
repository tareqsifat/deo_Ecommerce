<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Models\AreaCost;
use App\CityTranslation;
use App\Models\AreaZone;
use Excel;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = AreaCost::paginate(15);
        $cities=AreaZone::get();
        return view('backend.setup_configurations.cities.index',compact('areas','cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $area = new AreaCost;
        $area->area_id = $request->area_id;
        $area->cost = $request->cost;
        $area->save();

        flash(translate('Area cost has been inserted successfully'))->success();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(Request $request, $id)
     {
         $lang  = $request->lang;
         $city  = AreaCost::findOrFail($id);
         $areaZones = AreaZone::get();
         return view('backend.setup_configurations.cities.edit', compact('areaZones', 'lang','city'));
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
        $city = AreaCost::findOrFail($id);
        $city->area_id = $request->area_id;
        $city->cost = $request->cost;

        $city->save();

        

        flash(translate('City has been updated successfully'))->success();
        return redirect('/admin/cities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = AreaCost::destroy($id);
        flash(translate('City has been deleted successfully'))->success();
        return redirect()->route('cities.index');
    }
    

        
        
  




}
