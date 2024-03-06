<?php

use App\Http\Controllers\PhoneBook\ContactsController;
use App\Http\Controllers\PhoneBook\PhoneBookController;
use Illuminate\Support\Facades\Route;

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

Route::controller(PhoneBookController::class)->name('phonebooks.')->prefix('phonebooks')->group(function () {
    Route::post('list', 'list')->name('list');
    Route::controller(ContactsController::class)->name('contacts.')->prefix('{person}/contacts')->group(function () {
        Route::post('list', 'list')->name('list');
    });
});
Route::resource('phonebooks', PhoneBookController::class)->except(['create', 'edit', 'show'])->parameters([
    'phonebooks' => 'person'
]);
Route::resource('phonebooks.contacts', ContactsController::class)->except(['create', 'edit', 'show'])->parameters([
    'phonebooks' => 'person',
    'contacts' => 'contact'
]);
Route::redirect('/', '/phonebooks');


