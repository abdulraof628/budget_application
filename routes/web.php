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
Route::get('/view_application/view_account', 'AccountsController@applicationView')->name('application_view_account');
Route::get('/new_application/delete/{id}', 'AccountsController@applicationDelete')->name('application_delete');
/* Accounts Routes */

/* Deans Routes */
Route::get('/dean_dashboard', 'DeansController@index')->name('dean_dashboard');
Route::get('/view_application/view_dean', 'DeansController@applicationView')->name('application_view_dean');
Route::post('/approve_application_dean/{id}', 'DeansController@applicationApproveDean')->name('application_approve_dean');
Route::post('/reject_application_dean/{id}', 'DeansController@applicationRejectDean')->name('application_reject_dean');
/* Deans Routes */

/* Bursaries Routes */
Route::get('/bursary_dashboard', 'BursaryController@index')->name('bursary_dashboard');
Route::get('/view_application/view_bursary', 'BursaryController@applicationView')->name('application_view_bursary');
Route::get('/view_application/revise_amount', 'BursaryController@reviseAmount')->name('revise_amount');
Route::post('/approve_application_bursary/{id}', 'BursaryController@applicationApproveBursary')->name('application_approve_bursary');
Route::post('/reject_application_bursary/{id}', 'BursaryController@applicationRejectBursary')->name('application_reject_bursary');
/* Bursaries Routes */

/* Select Option Routes */
Route::get('/new_application/budget_types_account', 'AccountsController@newApplicationBudgetTypes')->name('budget_types_account');
Route::get('/new_application/usage_types_account', 'AccountsController@newApplicationUsageTypes')->name('usage_types_account');
Route::get('/new_application/application_item_types_account', 'AccountsController@newApplicationItemTypes')->name('application_item_types_account');
Route::get('/new_application/budget_types_dean', 'DeansController@newApplicationBudgetTypes')->name('budget_types_dean');
Route::get('/new_application/usage_types_dean', 'DeansController@newApplicationUsageTypes')->name('usage_types_dean');
Route::get('/new_application/application_item_types_dean', 'DeansController@newApplicationItemTypes')->name('application_item_types_dean');
Route::get('/new_application/budget_types_bursary', 'BursaryController@newApplicationBudgetTypes')->name('budget_types_bursary');
Route::get('/new_application/usage_types_bursary', 'BursaryController@newApplicationUsageTypes')->name('usage_types_bursary');
Route::get('/new_application/application_item_types_bursary', 'BursaryController@newApplicationItemTypes')->name('application_item_types_bursary');
/* Select Option Routes */
