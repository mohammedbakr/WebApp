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


/**
 * Admin routes
 */

Route::namespace('Admin')->group(function () {

    Route::get('admin/products/export', 'Products\ProductController@export')->name('admin.export');

    Route::get('importExportView', 'Products\ProductController@importExportView');
    Route::post('import', 'Products\ProductController@import')->name('admin.import');

    Route::get('admin/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'LoginController@login')->name('admin.login');
    Route::get('admin/logout', 'LoginController@logout')->name('admin.logout');
});
Route::group(['prefix' => 'admin', 'middleware' => ['employee'], 'as' => 'admin.' ], function () {
    Route::namespace('Admin')->group(function () {
        Route::group(['middleware' => ['role:admin|superadmin|clerk, guard:employee']], function () {
            Route::get('/', 'DashboardController@index')->name('dashboard');
            Route::namespace('Products')->group(function () {
                Route::resource('products', 'ProductController');
                Route::get('remove-image-product', 'ProductController@removeImage')->name('product.remove.image');
                Route::get('remove-image-thumb', 'ProductController@removeThumbnail')->name('product.remove.thumb');
            });
            Route::namespace('Reviews')->group(function () {
                Route::resource('reviews', 'ReviewController');
                route::post('reviews', 'ReviewController@approval')->name('reviews.approval');
            });
            Route::namespace('Customers')->group(function () {
                Route::resource('customers', 'CustomerController');
                Route::resource('customers.addresses', 'CustomerAddressController');
            });
            Route::namespace('Coupons')->group(function () {
                Route::resource('coupons', 'CouponController');
            });
            Route::namespace('Categories')->group(function () {
                Route::resource('categories', 'CategoryController');
                Route::get('remove-image-category', 'CategoryController@removeImage')->name('category.remove.image');
            });
            Route::namespace('Orders')->group(function () {
                Route::resource('orders', 'OrderController');
                Route::resource('order-statuses', 'OrderStatusController');
                Route::get('orders/{id}/invoice', 'OrderController@generateInvoice')->name('orders.invoice.generate');
            });
            Route::resource('addresses', 'Addresses\AddressController');
            Route::resource('countries', 'Countries\CountryController');
            Route::resource('countries.provinces', 'Provinces\ProvinceController');
            Route::resource('countries.provinces.cities', 'Cities\CityController');
            Route::resource('couriers', 'Couriers\CourierController');
            Route::resource('attributes', 'Attributes\AttributeController');
            Route::resource('attributes.values', 'Attributes\AttributeValueController');
            Route::resource('brands', 'Brands\BrandController');

            Route::namespace('Projects')->group(function () {
                Route::resource('projects', 'ProjectController');
            });
        });
        Route::group(['middleware' => ['role:admin|superadmin, guard:employee']], function () {
            Route::resource('employees', 'EmployeeController');
            Route::get('employees/{id}/profile', 'EmployeeController@getProfile')->name('employee.profile');
            Route::put('employees/{id}/profile', 'EmployeeController@updateProfile')->name('employee.profile.update');
            Route::resource('roles', 'Roles\RoleController');
            Route::resource('permissions', 'Permissions\PermissionController');
        });
    });
});

/**
 * Frontend routes
 */
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Auth::routes();
        Route::namespace('Auth')->group(function () {
            Route::get('cart/login', 'CartLoginController@showLoginForm')->name('cart.login');
            Route::post('cart/login', 'CartLoginController@login')->name('cart.login');
            Route::get('logout', 'LoginController@logout');
        });
        
        Route::namespace('Front')->group(function () {
            Route::get('/', 'HomeController@index')->name('home');

            Route::get('/contact', 'ContactController@create')->name('contact');
            Route::post('/contact', 'ContactController@store')->name('contactstore');

        
            Route::group(['middleware' => ['auth', 'web']], function () {
        
                Route::namespace('Payments')->group(function () {
                    Route::get('bank-transfer', 'BankTransferController@index')->name('bank-transfer.index');
                    Route::post('bank-transfer', 'BankTransferController@store')->name('bank-transfer.store');
                });
        
                Route::namespace('Addresses')->group(function () {
                    Route::resource('country.state', 'CountryStateController');
                    Route::resource('state.city', 'StateCityController');
                });

                Route::resource('comprojects', 'ProjectController');
                Route::get('comprojects/createStaff/{id}', 'ProjectController@createStaff')->name('comprojects.createStaff');
                Route::get('comprojects/staff/{id}', 'ProjectController@showStaff')->name('comprojects.showStaff');
                Route::get('comprojects/staff/{id}/edit', 'ProjectController@editStaff')->name('comprojects.editStaff');
                Route::put('comprojects/staff/{id}', 'ProjectController@updateStaff')->name('comprojects.updateStaff');
                Route::delete('comprojects/staff/{id}', 'ProjectController@deleteStaff')->name('comprojects.deleteStaff');
        
                Route::get('accounts', 'AccountsController@index')->name('accounts');
                Route::get('accounts/{id}/edit', 'AccountsController@edit')->name('accounts.edit');
                Route::put('accounts/{id}', 'AccountsController@update')->name('accounts.update');
                Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
                Route::post('checkout', 'CheckoutController@store')->name('checkout.store');
                Route::get('checkout/execute', 'CheckoutController@executePayPalPayment')->name('checkout.execute');
                Route::post('checkout/execute', 'CheckoutController@charge')->name('checkout.execute');
                Route::get('checkout/cancel', 'CheckoutController@cancel')->name('checkout.cancel');
                Route::get('checkout/success', 'CheckoutController@success')->name('checkout.success');
                Route::resource('cancelorder', 'CancelOrderController');
                Route::resource('customer.address', 'CustomerAddressController');
            });
            Route::resource('cart', 'CartController');
            Route::post('/coupon', 'CouponController@store')->name('coupon.store');
            Route::delete('/coupon', 'CouponController@destroy')->name('coupon.destroy');
            Route::get("category/{slug}", 'CategoryController@getCategory')->name('front.category.slug');
            Route::get("search", 'ProductController@search')->name('search.product');
            Route::get("{product}", 'ProductController@show')->name('front.get.product');
            Route::post('review', 'ReviewController@store')->name('front.review.store');
        });
});