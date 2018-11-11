<?php
use Illuminate\Support\Facades\Input;
use App\Flights;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('companies', 'CompaniesController');
Route::resource('flights', 'FlightsController');
Route::resource('cities', 'CitiesController');
Route::resource('hotel', 'HotelController');
Route::resource('rent', 'RentController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', function(){
	$q = Input::get('q');
	$e = Input::get('e');
		$flight = Flights::where('start', 'LIKE', '%'. $q . '%')->where('end', 'LIKE', '%'. $e . '%')->get();
			return view('search')->withDetails($flight)->withQuery($q && $e);
});
