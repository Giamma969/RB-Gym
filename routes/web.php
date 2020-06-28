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

use App\Http\Middleware\ViewBrands;
use App\Http\Middleware\AddBrand;
use App\Http\Middleware\EditBrand;
use App\Http\Middleware\DeleteBrand;
use App\Http\Middleware\ViewHomepages;
use App\Http\Middleware\CustomizeHomepage;
use App\Http\Middleware\AddSale;
use App\Http\Middleware\EditSale;
use App\Http\Middleware\DeleteSale;
use App\Http\Middleware\ViewSales;
use App\Http\Middleware\ProductsSale;
use App\Http\Middleware\ViewShippingCharges;
use App\Http\Middleware\EditShippingCharges;
use App\Http\Middleware\ViewCms;
use App\Http\Middleware\EditCms;
use App\Http\Middleware\ViewMessages;
use App\Http\Middleware\EditMessage;
use App\Http\Middleware\ViewFaqs;
use App\Http\Middleware\AddFaq;
use App\Http\Middleware\EditFaq;
use App\Http\Middleware\DeleteFaq;



Auth::routes();

Route::match(['get','post'],'/admin','AdminController@login');
Route::post('/admin/forgot-password', 'AdminController@forgotPassword');
//Route:: get('/admin/dashboard','AdminController@dashboard');

Route::get('/home', 'HomeController@index')->name('home');

//Home page
Route::get('/','IndexController@index');
//Category/Listing page
Route::match(['get','post'],'/products/{url}','ProductsController@products');
//Search products route
Route::match(['get','post'],'/search-products','ProductsController@searchProducts');
//Outlet  route
Route::match(['get','post'],'/outlet','ProductsController@outlet');
//Products filter page
Route::match(['get','post'],'/products-filter', 'ProductsController@filter');
//Product detail page
Route::get('/product/{id}','ProductsController@product');
//add to cart Route
Route::post('/add-cart', 'ProductsController@addtocart');
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
//users forget password
Route::match(['get','post'],'/forgot-password','UsersController@forgotPassword');

//user confirm account
Route::get('confirm/{code}','UsersController@confirmAccount');
//check if email already exists
Route::match(['get','post'],'/check-email','UsersController@checkEmail');
//users register form submit
Route::match(['get','post'],'/user-register','UsersController@register');
//users login
Route::match(['get','post'],'/user-login','UsersController@login');
//users logout
Route::get('/user-logout','UsersController@logout');
//Brand
Route::get('/brand/{name}','BrandsController@showBrand');
//contact us
Route::match(['get','post'],'/contact-us','ProductsController@contactUs');
//FAQ
Route::get('/faq','ProductsController@faq');
//About us 
Route::get('/about-us','CmsController@aboutUs');
//Privacy policy us 
Route::get('/privacy','CmsController@privacy');



//all routes after login
Route::group(['middleware'=>['frontlogin']],function(){
    //users account page
    // Route::match(['get','post'],'account','UsersController@account');
    //update info account
    Route::match(['get','post'],'/account-informations','UsersController@accountInformations');
    //check user current password
    Route::get('/check-user-pwd','UsersController@chkUserPassword');
    //update user password
    Route::match(['get','post'],'/update-user-pwd','UsersController@updatePassword');
    //checkout page
    Route::match(['get','post'],'/checkout','ProductsController@checkout');
    //order review page
    Route::match(['get','post'],'order-review','ProductsController@orderReview');
    //place order
    Route::match(['get','post'],'/place-order','ProductsController@placeOrder');
    //thanks page
    Route::get('/thanks','ProductsController@thanks');
    //thanks payment page
    Route::get('/thanks-payment','ProductsController@thanksPayment');  
    //paypal page
    Route::get('/payment','ProductsController@payment');  
    //user orders page
    Route::get('/orders','ProductsController@userOrders');
    //details product ordered
    Route::post('/product-ordered','ProductsController@productOrdered');

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

    //Admin Coupons Routes
    Route::match(['get','post'], '/admin/add-coupon', 'CouponsController@addCoupon')->middleware(AddCoupon::class);
    Route::match(['get','post'], '/admin/edit-coupon/{id}', 'CouponsController@editCoupon')->middleware(EditCoupon::class);
    Route::get('/admin/delete-coupon/{id}','CouponsController@deleteCoupon')->middleware(DeleteCoupon::class);
    Route::get('/admin/view-coupons','CouponsController@viewCoupons')->middleware(ViewCoupons::class);

    //Admin Brands Routes
    Route::match(['get','post'],'/admin/add-brand', 'BrandsController@addBrand')->middleware(AddBrand::class);
    Route::match(['get','post'],'/admin/edit-brand/{name}','BrandsController@editBrand')->middleware(EditBrand::class);
    Route::get('/admin/view-brands','BrandsController@viewBrands')->middleware(ViewBrands::class);
    Route::get('/admin/delete-brand/{name}','BrandsController@deleteBrand')->middleware(DeleteBrand::class);

    //Admin Banners Routes
    Route::match(['get','post'],'/admin/add-banner', 'BannersController@addBanner')->middleware(AddBanner::class);
    Route::match(['get','post'],'/admin/edit-banner/{id}','BannersController@editBanner')->middleware(EditBanner::class);
    Route::get('/admin/view-banners','BannersController@viewBanners')->middleware(ViewBanners::class);
    Route::get('/admin/delete-banner/{id}','BannersController@deleteBanner')->middleware(DeleteBanner::class);

    //Admin Homepages Routes
    Route::match(['get','post'],'/admin/customize-homepage/{id}', 'HomepagesController@customizeHomepage')->middleware(CustomizeHomepage::class);
    Route::get('/admin/view-homepages','HomepagesController@viewHomepages')->middleware(ViewHomepages::class);

    //Admin CMS Routes
    Route::match(['get','post'],'/admin/edit-cms/{id}', 'CmsController@editCms')->middleware(EditCms::class);
    Route::get('/admin/view-cms','CmsController@viewCms')->middleware(ViewCms::class);
    
    //Admin Shipping charges Routes
    Route::match(['get','post'],'/admin/edit-shipping-charges/{id}', 'ShippingChargesController@editSippingCharges')->middleware(EditShippingCharges::class);
    Route::get('/admin/view-shipping-charges','ShippingChargesController@viewSippingCharges')->middleware(ViewShippingCharges::class);

    //Admin Sales Routes
    Route::match(['get','post'],'/admin/add-sale', 'SalesController@addSale')->middleware(AddSale::class);
    Route::match(['get','post'],'/admin/edit-sale/{id}','SalesController@editSale')->middleware(EditSale::class);
    Route::match(['get','post'],'/admin/edit-products-sale/{id}','SalesController@editProductsSale')->middleware(ProductsSale::class);
    Route::get('/admin/view-sales','SalesController@viewSales')->middleware(ViewSales::class);
    Route::get('/admin/delete-sale/{id}','SalesController@deleteSale')->middleware(DeleteSale::class);


    //Admin Orders Routes
    Route::get('/admin/view-orders','ProductsController@viewOrders')->middleware(ViewOrders::class);

    //Admin Orders Details Routes
    Route::get('/admin/view-order/{id}','ProductsController@viewOrderDetails')->middleware(ViewOrders::class);

    //Admin update order status
    Route::post('/admin/update-order-status','ProductsController@updateOrderStatus')->middleware(UpdateOrderStatus::class);

    //Admin users route
    Route::get('/admin/view-users','UsersController@viewUsers')->middleware(ViewUsers::class);
    Route::match(['get','post'],'/admin/edit-user-status/{id}','UsersController@editUserStatus')->middleware(ViewUsers::class);


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

    //Admin - Messages routes
    Route::get('/admin/view-messages','MessagesController@viewMessages')->middleware(ViewMessages::class);
    Route::match(['get','post'],'/admin/edit-message/{id}','MessagesController@editMessage')->middleware(EditMessage::class);

    //Admin - Faqs
    Route::get('/admin/view-faqs','FaqsController@viewFaqs')->middleware(ViewFaqs::class);
    Route::match(['get','post'], '/admin/add-faq', 'FaqsController@addFaq')->middleware(AddFaq::class);
    Route::match(['get','post'], '/admin/edit-faq/{id}', 'FaqsController@editFaq')->middleware(EditFaq::class);
    Route::get('/admin/delete-faq/{id}','FaqsController@deleteFaq')->middleware(DeleteFaq::class);


});



