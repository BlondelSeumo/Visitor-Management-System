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

Route::group(['middleware' => ['installed']], function () {
    Auth::routes();
});

Route::group(['prefix' => 'install', 'as' => 'LaravelInstaller::', 'middleware' => ['web', 'install']], function () {
    Route::get('purchase-code', [
        'as'   => 'purchase_code',
        'uses' => 'PurchaseCodeController@index',
    ]);

    Route::post('purchase-code', [
        'as'   => 'purchase_code.check',
        'uses' => 'PurchaseCodeController@action',
    ]);
});

/*Multi step form*/
Route::group(['middleware' => ['installed']], function () {
    Route::group(['middleware' => ['frontend']], function () {
        Route::get('/', 'CheckInController@index')->name('/');

        Route::get('/check-in', [
            'as' => 'check-in',
            'uses' => 'CheckInController@index'
        ]);

        Route::get('/check-in/create-step-one', [
            'as' => 'check-in.step-one',
            'uses' => 'CheckInController@createStepOne'
        ]);
        Route::post('/check-in/create-step-one', [
            'as' => 'check-in.step-one.next',
            'uses' => 'CheckInController@postCreateStepOne'
        ]);

        Route::get('/check-in/create-step-two', [
            'as' => 'check-in.step-two',
            'uses' => 'CheckInController@createStepTwo'
        ]);
        Route::post('/check-in/create-step-two', [
            'as' => 'check-in.step-two.next',
            'uses' => 'CheckInController@postCreateStepTwo'
        ]);

        Route::get('/check-in/create-step-three', [
            'as' => 'check-in.step-three',
            'uses' => 'CheckInController@createStepThree'
        ]);
        Route::post('/check-in/create-step-three', [
            'as' => 'check-in.step-three.next',
            'uses' => 'CheckInController@postCreateStepThree'
        ]);

        Route::get('/check-in/create-step-four', [
            'as' => 'check-in.step-four',
            'uses' => 'CheckInController@createStepFour'
        ]);
        Route::post('/check-in/create-step-four', [
            'as' => 'check-in.step-four.next',
            'uses' => 'CheckInController@store'
        ]);

        Route::get('/check-in/show/{id}', [
            'as' => 'check-in.show',
            'uses' => 'CheckInController@show'
        ]);
        Route::get('/check-in/return', [
            'as' => 'check-in.return',
            'uses' => 'CheckInController@visitor_return'
        ]);
        Route::post('/check-in/return', [
            'as' => 'check-in.find.visitor',
            'uses' => 'CheckInController@find_visitor'
        ]);

        Route::get('/check-in/pre-registered', [
            'as' => 'check-in.pre.registered',
            'uses' => 'CheckInController@pre_registered'
        ]);
        Route::post('/check-in/pre-registered', [
            'as' => 'check-in.find.pre.visitor',
            'uses' => 'CheckInController@find_pre_visitor'
        ]);

        Route::get('/bookings/department/employee', 'CheckInController@getEmployee')->name('bookings.department.employee');
        Route::get('/bookings/department/employee/profile', 'CheckInController@getEmployeeProfile')->name('bookings.department.employee.profile');

    });
});


Route::group(['namespace' => 'Admin','middleware' => ['auth', 'installed']], function() {
    Route::get('dashboard', ['as' => 'admin', 'uses' => 'DashboardController@index']);
    Route::get('profile', ['as' => 'admin.profile', 'uses' => 'ProfileController@profile']);
    Route::put('profile/update/{profile}', 'ProfileController@profileUpdate')->name('admin.profile.update');
    Route::put('profile/change', 'ProfileController@change')->name('admin.profile.change');
    Route::resource('roles','RoleController');
    Route::resource('users','UsersController');
    Route::resource('designations','DesignationsController');
    Route::resource('departments','DepartmentsController');


    //employee route
    Route::get('employees','EmployeeController@index')->name('admin.employees.index');
    Route::get('employees/create','EmployeeController@create')->name('admin.employees.create');
    Route::get('employees/{id}','EmployeeController@show')->name('admin.employees.show');
    Route::post('employees','EmployeeController@store')->name('admin.employees.store');
    Route::get('employees/edit/{id}','EmployeeController@edit')->name('admin.employees.edit');
    Route::put('employees/{id}','EmployeeController@update')->name('admin.employees.update');
    Route::delete('employees/{id}','EmployeeController@destroy')->name('admin.employees.destroy');
    Route::put('employees/check/{id}','EmployeeController@checkEmployee')->name('admin.employees.check');

    Route::post('employees/booking/create-step-one','EmployeeController@postCreateStepOne')->name('admin.employees.booking.step-one.next');
    Route::get('employees/booking/create-step-two','EmployeeController@createStepTwo')->name('admin.employees.booking.step-two');
    Route::post('employees/booking/create-step-two','EmployeeController@postCreateStepTwo')->name('admin.employees.booking.step-two.next');
    Route::get('employees/booking/create-step-three','EmployeeController@createStepThree')->name('admin.employees.booking.step-three');
    Route::post('employees/booking/create-step-three','EmployeeController@bookingStore')->name('admin.employees.booking.step-three.next');

    //bookings route

    Route::get('bookings','BookingController@index')->name('admin.bookings.index');
    Route::get('bookings/{id}/show','BookingController@show')->name('admin.bookings.show');
    Route::get('bookings/{id}/approvedUnapproved','BookingController@approvedUnapproved')->name('admin.bookings.approvedUnapproved');
    Route::delete('bookings/{id}','BookingController@destroy')->name('admin.bookings.destroy');

    Route::get('bookings/create','BookingController@create')->name('admin.bookings.create');
    Route::post('bookings/create-step-one','BookingController@postCreateStepOne')->name('admin.bookings.step-one.next');
    Route::get('bookings/create-step-two','BookingController@createStepTwo')->name('admin.bookings.step-two');
    Route::post('bookings/create-step-two','BookingController@postCreateStepTwo')->name('admin.bookings.step-two.next');
    Route::get('bookings/create-step-three','BookingController@createStepThree')->name('admin.bookings.step-three');
    Route::post('bookings/create-step-three','BookingController@store')->name('admin.bookings.step-three.next');






    //pre-register route
    Route::get('pre-registers','PreRegisterController@index')->name('admin.pre-registers.index');
    Route::get('pre-registers/{id}','PreRegisterController@show')->name('admin.pre-registers.show');
    Route::put('pre-registers/{id}','PreRegisterController@update')->name('admin.pre-registers.update');
    Route::delete('pre-registers/{id}','PreRegisterController@destroy')->name('admin.pre-registers.destroy');

    //visitor route
    Route::get('visitors','VisitorController@index')->name('admin.visitors.index');
    Route::get('visitors/{id}','VisitorController@show')->name('admin.visitors.show');
    Route::put('visitors/{id}','VisitorController@update')->name('admin.visitors.update');
    Route::delete('visitors/{id}','VisitorController@destroy')->name('admin.visitors.destroy');


    Route::get('settings/{type?}', 'SettingsController@index')->name('admin.settings');
    Route::post('settings/{type?}', 'SettingsController@store')->name('admin.settings');

});

//invitations register
Route::group(['namespace' => 'Invitation'], function() {
    Route::get('invitations/register/{token}','RegisterController@index')->name('invitations.register');
    Route::post('invitations/register','RegisterController@store')->name('invitations.register');
});

