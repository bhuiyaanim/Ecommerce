<?php



Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index')->name('admin.home');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');
        
        // Admin Section...

// Categories.......
Route::get('admin/categories', 'Admin\Category\CategoryController@category')->name('categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@store_category')->name('store.category');
Route::get('delete/category/{id}', 'Admin\Category\CategoryController@delete_category')->name('delete.category');
Route::get('edit/category/{id}', 'Admin\Category\CategoryController@edit_category')->name('edit.category');
Route::post('update/category/{id}', 'Admin\Category\CategoryController@update_category')->name('update.category');

// Brands...........
Route::get('admin/brands', 'Admin\Category\CategoryController@brand')->name('brands');
Route::post('admin/store/brand', 'Admin\Category\CategoryController@store_brand')->name('store.brand');
Route::get('delete/brand/{id}', 'Admin\Category\CategoryController@delete_brand')->name('delete.brand');
Route::get('edit/brand/{id}', 'Admin\Category\CategoryController@edit_brand')->name('edit.brand');
Route::post('update/brand/{id}', 'Admin\Category\CategoryController@update_brand')->name('update.brand');

// Sub-Categories...
Route::get('admin/sub_categories', 'Admin\Category\CategoryController@sub_category')->name('sub_categories');
Route::post('admin/store/sub_category', 'Admin\Category\CategoryController@store_sub_category')->name('store.sub_category');
Route::get('delete/sub_category/{id}', 'Admin\Category\CategoryController@delete_sub_category')->name('delete.sub_category');
Route::get('edit/sub_category/{id}', 'Admin\Category\CategoryController@edit_sub_category')->name('edit.sub_category');
Route::post('update/sub_category/{id}', 'Admin\Category\CategoryController@update_sub_category')->name('update.sub_category');

// Coupon...........
Route::get('admin/coupon', 'Admin\CouponController@coupon')->name('admin.coupon');
Route::post('admin/store/coupon', 'Admin\CouponController@store_coupon')->name('store.coupon');
Route::get('admin/delete/coupon/{id}', 'Admin\CouponController@delete_coupon')->name('delete.coupon');
Route::get('admin/edit/coupon/{id}', 'Admin\CouponController@edit_coupon')->name('edit.coupon');
Route::post('admin/update/coupon/{id}', 'Admin\CouponController@update_coupon')->name('update.coupon');

// newsletter.......
Route::get('admin/newsletter', 'Admin\CouponController@newsletter')->name('admin.newsletter');
Route::get('admin/delete/newsletter/{id}', 'Admin\CouponController@delete_newsletter')->name('delete.newsletter');

// products.........
Route::get('admin/product/all', 'Admin\Product\ProductController@index')->name('all.product');
Route::get('admin/product/add', 'Admin\Product\ProductController@create')->name('add.product');
Route::post('admin/product/store', 'Admin\Product\ProductController@store')->name('store.product');
        // sub-category...
Route::get('admin/get/sub_category/{id}', 'Admin\Product\ProductController@get_sub_category');




        // Frontend Section...
// newsletter.......
Route::post('store/newsletter', 'FrontendController@store_newsletter')->name('store.newsletter');
