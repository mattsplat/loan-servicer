<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@dashboard');


/*

resource creates the folowing routes

  get('/name', 'NameController@index') // displays all items
  get('/name/create', 'NameController@create') // presents create new view
  post('/name', 'NameController@store') // saves new entry
  get('/name/{name}', 'NameController@show') // shows entry matching name id
  get('/name/{name}/edit', 'NameController@edit') // presents edit view of entry matching name id
  put('/name/{name}', 'NameController@update') // updates entry matching name id
  delete('/name/{name}', 'NameController@destroy') // deletes entry matching name id

*/

Route::resources([
    'loans' => 'LoanController',
    'customers' => 'CustomerController',
    'lenders' => 'LenderController',
    'properties' => 'PropertyController',
  ] );
