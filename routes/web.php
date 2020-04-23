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
use App\Http\Middleware\ViewCategories;
use App\Http\Middleware\AddCategory;
use App\Http\Middleware\EditCategory;
use App\Http\Middleware\DeleteCategory;
use App\Http\Middleware\ViewProducts;
use App\Http\Middleware\AddProduct;
use App\Http\Middleware\EditProduct;
use App\Http\Middleware\DeleteProduct;
use App\Http\Middleware\AltImagesProduct;
use App\Http\Middleware\ViewCoupons;
use App\Http\Middleware\AddCoupon;
use App\Http\Middleware\EditCoupon;
use App\Http\Middleware\DeleteCoupon;
use App\Http\Middleware\ViewBanners;
use App\Http\Middleware\AddBanner;
use App\Http\Middleware\EditBanner;
use App\Http\Middleware\DeleteBanner;
use App\Http\Middleware\ViewReviews;
use App\Http\Middleware\ViewUsers;
use App\Http\Middleware\ViewOrders;
use App\Http\Middleware\UpdateOrderStatus;
use App\Http\Middleware\ViewDevelopers;
use App\Http\Middleware\AddDeveloper;
use App\Http\Middleware\EditDeveloper;
use App\Http\Middleware\DeleteDeveloper;
use App\Http\Middleware\ViewGroups;
use App\Http\Middleware\AddGroup;
use App\Http\Middleware\EditGroup;
use App\Http\Middleware\DeleteGroup;
use App\Http\Middleware\ViewServices;


Auth::routes();

Route::match(['get','post'],'/admin','AdminController@login');
Route::post('/admin/forgot-password', 'AdminController@forgotPassword');
//Route:: get('/admin/dashboard','AdminController@dashboard');

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
//user remove wishlist
Route::match(['get','post'],'/remove-wishlist/{id}','ProductsController@removeWishlist');
//delete product from cart page
Route::get('/cart/delete-product/{id}','ProductsController@deleteCartProduct');
//update product quantity in cart
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');
//users forgot password
Route::match(['get','post'],'/forgot-password','UsersController@forgotPassword');

//user confirm account
Route::get('confirm/{code}','UsersController@confirmAccount');
//check if username already exists
Route::match(['get','post'],'/check-username','UsersController@checkUsername');
//check if email already exists
Route::match(['get','post'],'/check-email','UsersController@checkEmail');
//users register form submit
Route::match(['get','post'],'/user-register','UsersController@register');
//users login
Route::match(['get','post'],'/user-login','UsersController@login');
//users logout
Route::get('/user-logout','UsersController@logout');
//Search products route
Route::post('/search-products','ProductsController@searchProducts');
//contact us
Route::match(['get','post'],'/contact-us','ProductsController@contactUs');

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
    //apply coupon 
    Route::post('/cart/apply-coupon','ProductsController@applyCoupon');
    //forget coupon
    Route::get('cart/forget-coupon','ProductsController@forgetCoupon');
   
    
    
});



Route::group(['middleware'=>['auth']],function(){
    Route::get('/admin/dashboard','AdminController@dashboard');
    Route::get('/admin/settings','AdminController@settings');
    Route::get('/admin/check-pwd','AdminController@chkPassword');
    Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');
    Route::get('/logout', 'AdminController@logout');
   
    //Admin Categories Routes
    Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory')->middleware(AddCategory::class);
    Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory')->middleware(EditCategory::class);
    Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory')->middleware(DeleteCategory::class);
    Route::get('/admin/view-categories','CategoryController@viewCategories')->middleware(ViewCategories::class);
   
    //Admin Products Routes
    Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct')->middleware(AddProduct::class);
    Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct')->middleware(EditProduct::class);
    Route::get('/admin/view-products','ProductsController@viewProducts')->middleware(ViewProducts::class);
    Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct')->middleware(DeleteProduct::class);
    Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');
    Route::get('/admin/delete-alt-image/{id}','ProductsController@deleteAltImage')->middleware(AltImagesProduct::class);
    Route::match(['get','post'], 'admin/add-images/{id}', 'ProductsController@addImages')->middleware(AltImagesProduct::class);

    //Admin Coupon Routes
    Route::match(['get','post'], '/admin/add-coupon', 'CouponsController@addCoupon')->middleware(AddCoupon::class);
    Route::match(['get','post'], '/admin/edit-coupon/{id}', 'CouponsController@editCoupon')->middleware(EditCoupon::class);
    Route::get('/admin/delete-coupon/{id}','CouponsController@deleteCoupon')->middleware(DeleteCoupon::class);
    Route::get('/admin/view-coupons','CouponsController@viewCoupons')->middleware(ViewCoupons::class);

    //Admin Banners Routes
    Route::match(['get','post'],'/admin/add-banner', 'BannersController@addBanner')->middleware(AddBanner::class);
    Route::match(['get','post'],'/admin/edit-banner/{id}','BannersController@editBanner')->middleware(EditBanner::class);
    Route::get('/admin/view-banners','BannersController@viewBanners')->middleware(ViewBanners::class);
    Route::get('/admin/delete-banner/{id}','BannersController@deleteBanner')->middleware(DeleteBanner::class);

    //Admin Orders Routes
    Route::get('/admin/view-orders','ProductsController@viewOrders')->middleware(ViewOrders::class);

    //Admin Orders Details Routes
    Route::get('/admin/view-order/{id}','ProductsController@viewOrderDetails')->middleware(ViewOrders::class);

    //Admin update order status
    Route::post('/admin/update-order-status','ProductsController@updateOrderStatus')->middleware(UpdateOrderStatus::class);

    //Admin users route
    Route::get('/admin/view-users','UsersController@viewUsers')->middleware(ViewUsers::class);

    //Admin reviews route
    Route::get('/admin/view-reviews','ProductsController@viewReviews')->middleware(ViewReviews::class);

    //Admin - Developers routes
    Route::match(['get','post'],'/admin/add-developer','DevelopersController@addDeveloper')->middleware(AddDeveloper::class);
    Route::get('/admin/view-developers','DevelopersController@viewDevelopers')->middleware(ViewDevelopers::class);
    Route::get('/admin/view-dev-groups/{id}','DevelopersController@viewDeveloperGroups')->middleware(ViewDevelopers::class);
    Route::match(['get','post'],'/admin/edit-developer/{id}','DevelopersController@editDeveloper')->middleware(EditDeveloper::class);
    Route::get('/admin/delete-developer/{id}','DevelopersController@deleteDeveloper')->middleware(DeleteDeveloper::class);
    
    //Admin - Groups routes
    Route::match(['get','post'],'/admin/add-group','GroupsController@addGroup')->middleware(AddGroup::class);
    Route::match(['get','post'],'/admin/edit-group/{id}','GroupsController@editGroup')->middleware(EditGroup::class);
    Route::get('/admin/view-groups','GroupsController@viewGroups')->middleware(ViewGroups::class);
    Route::get('/admin/delete-group/{id}','GroupsController@deleteGroup')->middleware(DeleteGroup::class);
    
    //Admin - Services routes
    Route::match(['get','post'],'/admin/view-services','ServicesController@viewServices')->middleware(ViewServices::class);

    //Admin - view messages
    Route::get('/admin/view-messages','MessagesController@viewMessages');
    Route::match(['get','post'],'/admin/edit-message/{id}','MessagesController@editMessage');

});



