<?php



Route::get('/', 'FrontendController@index');
//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password/change', 'HomeController@changePassword')->name('password.change');
Route::post('/password/update', 'HomeController@updatePassword')->name('password.update');
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
Route::get('admin/product/inactive/{id}', 'Admin\Product\ProductController@inactive')->name('inactive.product');
Route::get('admin/product/active/{id}', 'Admin\Product\ProductController@active')->name('active.product');
Route::get('admin/product/delete/{id}', 'Admin\Product\ProductController@delete')->name('delete.product');
Route::get('admin/product/view/{id}', 'Admin\Product\ProductController@view')->name('view.product');
Route::get('admin/product/edit/{id}', 'Admin\Product\ProductController@edit')->name('edit.product');
Route::post('admin/product/update/{id}', 'Admin\Product\ProductController@update')->name('update.product');

// blogs.........
Route::get('admin/post/add', 'Admin\PostController@create')->name('add.blog_post');
Route::post('admin/post/store', 'Admin\PostController@store')->name('store.post');
Route::get('admin/post/all', 'Admin\PostController@index')->name('all.blog_post');
Route::get('admin/post/delete/{id}', 'Admin\PostController@delete')->name('delete.post');
Route::get('admin/post/edit/{id}', 'Admin\PostController@edit')->name('edit.post');
Route::post('admin/post/update/{id}', 'Admin\PostController@update')->name('update.post');

// order........
Route::get('admin/pending/order', 'Admin\OrderController@newOrder')->name('new.order');
Route::get('admin/view/order/{id}', 'Admin\OrderController@viewOrder')->name('view.order');


        // sub-category...
Route::get('admin/get/sub_category/{id}', 'Admin\Product\ProductController@get_sub_category');






        // Frontend Section...
// newsletter.......
Route::post('store/newsletter', 'FrontendController@store_newsletter')->name('store.newsletter');

// wishlist.........
Route::get('add/wishlist/{id}', 'WishlistController@addwishlist')->name('wishlist');
Route::get('user/wishlist', 'WishlistController@show')->name('wishlist');


// add to cart......
Route::get('addtocart/{id}', 'AddCartController@addcart')->name('addtocart');
Route::get('check', 'AddCartController@check')->name('check');
Route::get('product/cart', 'AddCartController@show')->name('show.cart');
Route::get('remove/cart/{rowId}', 'AddCartController@remove')->name('remove.cart');
Route::post('update/cart', 'AddCartController@update')->name('update.cart');
Route::post('insert/cart', 'AddCartController@insertCart')->name('insert.cart');
Route::get('product/checkout', 'AddCartController@checkout')->name('checkout');
Route::post('update/checkout/cart', 'AddCartController@update_checkout')->name('update.checkout.cart');
Route::post('apply/coupon', 'AddCartController@apply_coupon')->name('apply.coupon');
Route::get('remove/coupon', 'AddCartController@remove_coupon')->name('remove.coupon');

// payment
Route::get('product/payment', 'PaymentController@show')->name('payment');
Route::post('product/payment/process', 'PaymentController@payment')->name('payment.process');
Route::post('product/payment/stripe', 'PaymentController@stripeCharge')->name('stripe.charge');

// blog.............
Route::get('blog/post', 'BlogController@blog')->name('blog.post');

Route::get('language/english', 'BlogController@english')->name('language.english');
Route::get('language/bangla', 'BlogController@bangla')->name('language.bangla');


// socialite........
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

// product..........
Route::get('/product/details/{id}/{product_name}', 'ProductController@details')->name('product.details');
Route::post('/product/addtocart/{id}', 'ProductController@addcart')->name('product.addtocart');
Route::get('cart/product/view/{id}', 'ProductController@viewProduct');
Route::get('/product/show/{id}/{cat_id}', 'ProductController@show')->name('product');

// customer porofile related routes...
