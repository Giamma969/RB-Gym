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

Route::match(['get','post'],'/admin','AdminController@login');

Route::get('/logout', 'AdminController@logout');
Route:: get('/admin/dashboard','AdminController@dashboard');

Route::get('/home', 'HomeController@index')->name('home');

//Home page
Route::get('/','IndexController@index');

//Category/Listing page
Route::get('/products/{url}','ProductsController@products');

//Products filter page
Route::match(['get','post'],'/products-filter', 'ProductsController@filter');

//Product detail page
Route::get('/product/{id}','ProductsController@product');

//add to cart Route
Route::match(['get','post'],'/add-cart', 'ProductsController@addtocart');

//cart page
Route::match(['get','post'],'/cart', 'ProductsController@cart');

//user wishlist
Route::match(['get','post'],'/wishlist', 'ProductsController@wishlist');
//user add wishlist
Route::match(['get','post'],'/add-wishlist/{id}','ProductsController@addWishlist');
//Route::match(['get','post'],'/add-wishlist','ProductsController@addWishlist'); 

Route::match(['get','post'],'/remove-wishlist/{id}','ProductsController@removeWishlist');
//Route::match(['get','post'],'/add-wishlist','ProductsController@addWishlist'); 

//delete product from cart page
Route::get('/cart/delete-product/{id}','ProductsController@deleteCartProduct');

//update product quantity in cart
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');

//apply coupon 
Route::post('/cart/apply-coupon','ProductsController@applyCoupon');

Route::get('cart/forget-coupon','ProductsController@forgetCoupon');


//users login-register page
Route::get('/login-register','UsersController@userLoginRegister');

//users forgot password
Route::match(['get','post'],'/forgot-password','UsersController@forgotPassword');

//users register form submit
Route::post('/user-register','UsersController@register');

Route::get('confirm/{code}','UsersController@confirmAccount');

//check if username already exists
Route::match(['get','post'],'/check-username','UsersController@checkUsername');

//check if email already exists
Route::match(['get','post'],'/check-email','UsersController@checkEmail');

//users login
Route::post('/user-login','UsersController@login');

//users logout
Route::get('/user-logout','UsersController@logout');

//Search products route
Route::post('/search-products','ProductsController@searchProducts');


//all routes after login
Route::group(['middleware'=>['frontlogin']],function(){
    //users account page
    Route::match(['get','post'],'account','UsersController@account');
    //check user current password
    Route::post('/check-user-pwd','UsersController@chkUserPassword');
    //update user password
    Route::post('/update-user-pwd','UsersController@updatePassword');
    //checkout page
    Route::match(['get','post'],'checkout','ProductsController@checkout');
    //order review page
    Route::match(['get','post'],'order-review','ProductsController@orderReview');
    //place order
    Route::match(['get','post'],'place-order','ProductsController@placeOrder');
    //thanks page
    Route::get('/thanks','ProductsController@thanks');
    //thanks payment page
    Route::get('/thanks-payment','ProductsController@thanksPayment');  
    //paypal page
    Route::get('/payment','ProductsController@payment');  
    //user orders page
    Route::get('/orders','ProductsController@userOrders'); 
    //user ordered products page
    Route::get('/orders/{id}','ProductsController@userOrderDetails');
    //add review
    Route::post('/add-review','ProductsController@addReview');

    
});



Route::group(['middleware'=>['auth']],function(){
    Route::get('/admin/dashboard','AdminController@dashboard');
    Route::get('/admin/settings','AdminController@settings');
    Route::get('/admin/check-pwd','AdminController@chkPassword');
    Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');
   
    //Admin Categories Routes
    Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
    Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
    Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
    Route::get('/admin/view-categories','CategoryController@viewCategories');
   
    //Admin Products Routes
    Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
    Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
    Route::get('/admin/view-products','ProductsController@viewProducts');
    Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct');
    Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');
    Route::get('/admin/delete-alt-image/{id}','ProductsController@deleteAltImage');
   
    //Admin Products Attributes Route
    Route::match(['get','post'], 'admin/add-attributes/{id}', 'ProductsController@addAttributes');
    Route::match(['get','post'], 'admin/add-images/{id}', 'ProductsController@addImages');
    Route::get('/admin/delete-attribute/{id}','ProductsController@deleteAttribute');

    //Admin Coupon Routes
    Route::match(['get','post'], '/admin/add-coupon', 'CouponsController@addCoupon'); 
    Route::match(['get','post'], '/admin/edit-coupon/{id}', 'CouponsController@editCoupon');
    Route::get('/admin/delete-coupon/{id}','CouponsController@deleteCoupon');
    Route::get('/admin/view-coupons','CouponsController@viewCoupons');

    //Admin Banners Routes
    Route::match(['get','post'],'/admin/add-banner', 'BannersController@addBanner');
    Route::match(['get','post'],'/admin/edit-banner/{id}','BannersController@editBanner');
    Route::get('/admin/view-banners','BannersController@viewBanners');
    Route::get('/admin/delete-banner/{id}','BannersController@deleteBanner');

    //Admin Orders Routes
    Route::get('/admin/view-orders','ProductsController@viewOrders');

    //Admin Orders Details Routes
    Route::get('/admin/view-order/{id}','ProductsController@viewOrderDetails');

    //Admin update order status
    Route::post('/admin/update-order-status','ProductsController@updateOrderStatus');

    //Admin users route
    Route::get('/admin/view-users','UsersController@viewUsers');

    //Admin reviews route
    Route::get('/admin/view-reviews','ProductsController@viewReviews');



    /*
    //Users Routes
    Route::match(['get','post'],'/admin/add-user', 'UsersController@addUser');
    Route::match(['get','post'], '/admin/edit-user/{id}', 'UsersController@editUser');
    Route::get('/admin/delete-user/{id}','UsersController@deleteUser');
    Route::get('/admin/view-users','UsersController@viewUsers');

    //Roles Routes
    Route::match(['get','post'],'/admin/add-role', 'RolesController@addRole');
    Route::match(['get','post'], '/admin/edit-role/{id}', 'RolesController@editRole');
    Route::get('/admin/delete-role/{id}','RolesController@deleteRole');
    Route::get('/admin/view-roles','RolesController@viewRoles');

    //ModelHasRoles Routes
    Route::match(['get','post'],'/admin/add-model-has-roles', 'ModelHasRolesController@addModelHasRoles');
    Route::match(['get','post'],'/admin/edit-model-has-roles/{role_id}/{model_id}','ModelHasRolesController@editModelHasRoles');
    Route::get('/admin/delete-model-has-roles/{id}{model_type}{model_id}','ModelHasRolesController@deleteModelHasRoles');
    Route::get('/admin/view-models-has-roles','ModelHasRolesController@viewModelsHasRoles');

   */

});



