<?php

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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

/* Accounts Routes */
Route::get('/account_dashboard', 'AccountsController@index')->name('account_dashboard');
Route::get('/new_application', 'AccountsController@newApplication')->name('new_application');
Route::get('/edit_application/{id}', 'AccountsController@ApplicationEdit')->name('application_edit');
Route::post('/edit_application/update{id}', 'AccountsController@ApplicationUpdate')->name('application_update');
Route::post('/edit_item_new/{id}', 'AccountsController@itemUpdateNew')->name('item_update_new');
Route::get('/delete_item', 'AccountsController@itemDelete')->name('item_delete');
Route::post('/new_application/submit', 'AccountsController@newApplicationStore')->name('new_application_store');
Route::get('/view_application/view', 'AccountsController@applicationView')->name('application_view');
Route::get('/new_application/delete/{id}', 'AccountsController@applicationDelete')->name('application_delete');
/* Accounts Routes */

/* Deans Routes */
Route::get('/dean_dashboard', 'DeansController@index')->name('dean_dashboard');
Route::get('/view_application/view', 'DeansController@applicationView')->name('application_view');
Route::post('/approve_application_dean/{id}', 'DeansController@applicationApproveDean')->name('application_approve_dean');
Route::post('/reject_application_dean/{id}', 'DeansController@applicationRejectDean')->name('application_reject_dean');
/* Deans Routes */

/* Bursaries Routes */
Route::get('/bursary_dashboard', 'BursaryController@index')->name('bursary_dashboard');
Route::get('/view_application/view', 'BursaryController@applicationView')->name('application_view');
Route::post('/approve_application_bursary/{id}', 'BursaryController@applicationApproveBursary')->name('application_approve_bursary');
Route::post('/reject_application_bursary/{id}', 'BursaryController@applicationRejectBursary')->name('application_reject_bursary');
/* Bursaries Routes */

/* Select Option Routes */
Route::get('/new_application/budget_types', 'AccountsController@newApplicationBudgetTypes')->name('budget_types')->middleware('auth');//Retrieve data from db and listdown
Route::get('/new_application/usage_types', 'AccountsController@newApplicationUsageTypes')->name('usage_types');//Retrieve data from db and listdown
Route::get('/new_application/application_item_types', 'AccountsController@newApplicationItemTypes')->name('application_item_types');//Retrieve data from db and listdown
Route::get('/new_application/budget_types', 'DeansController@newApplicationBudgetTypes')->name('budget_types')->middleware('auth');//Retrieve data from db and listdown
Route::get('/new_application/usage_types', 'DeansController@newApplicationUsageTypes')->name('usage_types');//Retrieve data from db and listdown
Route::get('/new_application/application_item_types', 'DeansController@newApplicationItemTypes')->name('application_item_types');//Retrieve data from db and listdown
Route::get('/new_application/budget_types', 'BursaryController@newApplicationBudgetTypes')->name('budget_types')->middleware('auth');//Retrieve data from db and listdown
Route::get('/new_application/usage_types', 'BursaryController@newApplicationUsageTypes')->name('usage_types');//Retrieve data from db and listdown
Route::get('/new_application/application_item_types', 'BursaryController@newApplicationItemTypes')->name('application_item_types');//Retrieve data from db and listdown
/* Select Option Routes */
