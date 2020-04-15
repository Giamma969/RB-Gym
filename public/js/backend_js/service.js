$(document).ready(function(){
    //categories
    $("#full_access_categories").click(function(){
        if(this.checked) {
            $("#view_categories_permission").prop('checked', true);
            $("#add_category_permission").prop('checked', true);
            $("#edit_category_permission").prop('checked', true);
            $("#delete_category_permission").prop('checked', true);
            // $("#category_description_permission").prop('checked', true);
            // $("#enable_disable_categories").prop('checked', true);
        }else{
            $("#view_categories_permission").prop('checked', false);
            $("#add_category_permission").prop('checked', false);
            $("#edit_category_permission").prop('checked', false);
            $("#delete_category_permission").prop('checked', false);
            // $("#category_description_permission").prop('checked', false);
            // $("#enable_disable_categories").prop('checked', false);

        }
    });
    //products
    $("#full_access_products").click(function(){
        if(this.checked) {
            $("#view_products_permission").prop('checked', true);
            $("#add_product_permission").prop('checked', true);
            $("#edit_product_permission").prop('checked', true);
            $("#delete_product_permission").prop('checked', true);
            $("#manage_alternative_images").prop('checked', true);
            // $("#product_main_image").prop('checked', true);
            // $("#product_description_permission").prop('checked', true);
            // $("#product_price_permission").prop('checked', true);
            // $("#product_stock_permission").prop('checked', true);
            // $("#enable_disable_product").prop('checked', true);
            
        }else{
            $("#view_products_permission").prop('checked', false);
            $("#add_product_permission").prop('checked', false);
            $("#edit_product_permission").prop('checked', false);
            $("#delete_product_permission").prop('checked', false);
            $("#manage_alternative_images").prop('checked', false);
            // $("#product_main_image").prop('checked', false);
            // $("#product_description_permission").prop('checked', false);
            // $("#product_price_permission").prop('checked', false);
            // $("#product_stock_permission").prop('checked', false);
            // $("#enable_disable_product").prop('checked', false);

        }
    });

    //coupons 
    $("#full_access_coupons").click(function(){
        if(this.checked) {
            $("#view_coupons_permission").prop('checked', true);
            $("#add_coupon_permission").prop('checked', true);
            $("#edit_coupon_permission").prop('checked', true);
            $("#delete_coupon_permission").prop('checked', true);
        }else{
            $("#view_coupons_permission").prop('checked', false);
            $("#add_coupon_permission").prop('checked', false);
            $("#edit_coupon_permission").prop('checked', false);
            $("#delete_coupon_permission").prop('checked', false);

        }
    }); 
    //orders
    $("#full_access_orders").click(function(){
        if(this.checked) {
            $("#view_orders_permission").prop('checked', true);
            $("#update_order_status_permission").prop('checked', true);
        }else{
            $("#view_orders_permission").prop('checked', false);
            $("#update_order_status_permission").prop('checked', false);

        }
    });
    //banners
    $("#full_access_banners").click(function(){
        if(this.checked) {
            $("#view_banners_permission").prop('checked', true);
            $("#add_banner_permission").prop('checked', true);
            $("#edit_banner_permission").prop('checked', true);
            $("#delete_banner_permission").prop('checked', true);
        }else{
            $("#view_banners_permission").prop('checked', false);
            $("#add_banner_permission").prop('checked', false);
            $("#edit_banner_permission").prop('checked', false);
            $("#delete_banner_permission").prop('checked', false);

        }
    });  
    //users
    $("#full_access_users").click(function(){
        if(this.checked) {
            $("#view_users_permission").prop('checked', true);
        }else{
            $("#view_users_permission").prop('checked', false);

        }
    });
    //reviews
    $("#full_access_reviews").click(function(){
        if(this.checked) {
            $("#view_reviews_permission").prop('checked', true);
        }else{
            $("#view_reviews_permission").prop('checked', false);

        }
    });

});