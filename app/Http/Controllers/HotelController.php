<?php

namespace App\Http\Controllers;

use App\Cities;
use App\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$cities = Cities::all();
		$hotels = Hotel::with('cities')->get();
		return view('hotels.index', compact('hotels'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$cities = Cities::all();
		return view('hotels.create', compact('cities'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$hotel = new Hotel;
		$hotel->name = $request->name;
		$hotel->info = $request->info;
		$hotel->phone_number = $request->phone_number;
		$hotel->city_id = $request->city_id;

		$validatedData = $request->validate([
        'name' => 'required',
        'info' => 'required',
        'phone_number' => 'required',
    ]);
		$hotel->save();
		return redirect(url('/hotel'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$hotel = Hotel::find($id);
		return view('hotels.show', compact('hotels'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$cities = Cities::all();
		$hotel = Hotel::find($id);
		return view('hotels.edit', compact('hotel', 'cities'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$hotel = Hotel::find($id);
		$hotel->update([
			'name' => $request->name,
			'info' => $request->info,
			'phone_number' => $request->phone_number,
			'city_id' => $request->city_id,
		]);
		return redirect(url('/hotel'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$hotel = Hotel::find($id);
		$hotel->delete();
		return redirect(url('/hotel'));
	}
}
