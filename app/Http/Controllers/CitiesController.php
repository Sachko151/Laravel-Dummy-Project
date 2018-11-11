<?php

namespace App\Http\Controllers;

use App\Cities;
use Illuminate\Http\Request;

class CitiesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$cities = Cities::all();
		return view('cities.index', compact('cities'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$cities = Cities::all();
		return view('cities.create', compact('cities'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$cities = new Cities;
		$cities->name = $request->name;

		$cities->save();
		 return redirect(url('/cities'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$cities = Cities::find($id);
		return view('cities.show', compact('cities'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$cities = Cities::find($id);
		return view('cities.edit', compact('cities'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$cities = Cities::find($id);

		$cities->name = $request->name;

		$cities->save();
		return redirect(url('/cities'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$cities = Cities::find($id);

		$cities->delete();
		return redirect(url('/cities'));
	}
}
