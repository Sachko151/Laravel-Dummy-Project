<?php

namespace App\Http\Controllers;

use App\Cities;
use App\Rent;
use Illuminate\Http\Request;

class RentController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$cities = Cities::all();
		$rents = Rent::with('cities')->get();
		return view('rents.index', compact('rents'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$cities = Cities::all();
		return view('rents.create', compact('cities'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$rent = new Rent;
		$rent->name = $request->name;
		$rent->info = $request->info;
		$rent->available_cars = $request->available_cars;
		$rent->city_id = $request->city_id;

		$validatedData = $request->validate([
        'name' => 'required',
        'info' => 'required',
    ]);

		$rent->save();
		return redirect(url('/rent'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$rent = Rent::find($id);
		return view('rents.show', compact('rents'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$cities = Cities::all();
		$rent = Rent::find($id);
		return view('rents.edit', compact('rent', 'cities'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$rent = Rent::find($id);
		$rent->update([
			'name' => $request->name,
			'info' => $request->info,
			'available_cars' => $request->available_cars,
			'city_id' => $request->city_id,
		]);
		return redirect(url('/rent'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$rent = Rent::find($id);
		$rent->delete();
		return redirect(url('/rent'));
	}
}
