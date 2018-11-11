<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;
use App\Flights;

class FlightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companie = Companies::all();
        $flights = Flights::with('companies')->get();
        return view('flights.index', compact('flights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $companies = Companies::all();
        return view('flights.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $flight = new Flights;
            $flight->start = $request->start;
            $flight->end = $request->end;
            $flight->company_id = $request->company_id;
            $flight->price = $request->price;
            $flight->hours = $request->hours;
            $flight->cities_num = $request->cities_num;
            $flight->cities = $request->cities;

            $validatedData = $request->validate([
        'start' => 'required',
        'end' => 'required',
        'company_id' => 'required',
        'price' => 'required',
        'hours' => 'required',
        'cities_num' => 'required',
        'cities' => 'required',
    ]);

        $flight->save();
        return redirect(url('/flights'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$companie = Companies::all();
        $flight = Flights::find($id);
        return view('flights.show', compact('flight'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Companies::all();
        $flight = Flights::find($id);
        return view('flights.edit', compact('flight', 'companies'));
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
        $flight = Flights::find($id);
        $flight->update([
        'start'=>$request->start,
        'end'=>$request->end,
        'price'=>$request->price,
        'hours'=>$request->hours,
        'cities_num'=>$request->cities_num,
        'cities'=>$request->cities,
        'company_id'=>$request->company_id,

        ]);
        return redirect(url('/flights'));
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $flight = Flights::find($id);
         $flight->delete();
         return redirect(url('/flights'));
    }
}
