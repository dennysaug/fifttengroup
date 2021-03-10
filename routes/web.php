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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('contacts', 'ContactsController@index')->name('contacts');
    Route::get('contacts/create', 'ContactsController@create')->name('contacts.create');
    Route::post('contacts/create', 'ContactsController@store')->name('contacts.store');
    Route::get('contacts/{contact}/edit', 'ContactsController@edit')->name('contacts.edit');
    Route::post('contacts/{contact}/update', 'ContactsController@update')->name('contacts.update');

    Route::get('address/{contact}', 'AddressController@index')->name('address');
    Route::get('address/{contact}/create', 'AddressController@create')->name('address.create');
    Route::post('address/{contact}/create', 'AddressController@store')->name('address.store');
    Route::get('address/{address}/edit', 'AddressController@edit')->name('address.edit');
    Route::post('address/{address}/update', 'AddressController@update')->name('address.update');

    Route::get('companies', 'CompaniesController@index')->name('companies');
    Route::get('companies/create', 'CompaniesController@create')->name('companies.create');
    Route::post('companies/create', 'CompaniesController@store')->name('companies.store');
    Route::get('companies/{company}/edit', 'CompaniesController@edit')->name('companies.edit');
    Route::post('companies/{company}/update', 'CompaniesController@update')->name('companies.update');

    Route::get('order', 'OrderController@index')->name('order');
    Route::get('order/create', 'OrderController@create')->name('order.create');
    Route::post('order/create', 'OrderController@store')->name('order.store');
    Route::get('order/{contact}/edit', 'OrderController@edit')->name('order.edit');
    Route::post('order/{contact}/update', 'OrderController@update')->name('order.update');

    #ajax
    Route::get('ajax/contact/{company?}', 'ContactsController@show')->name('ajax.contacts.get');
    Route::get('ajax/order/notifications', 'OrderController@notifications')->name('ajax.order.notifications');

});

Route::get('/home', 'HomeController@index')->name('home');
