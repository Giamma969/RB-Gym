/*********** This file is used to manage dependencies between services *********/
 

$(document).ready(function(){
    //********************* Products ******************************/
    $('#edit_product_permission, #view_products_permission').change(function () {
        var view_products = $("#view_products_permission");
        var edit_product = $("#edit_product_permission");
        var IsCheckedEditProduct = edit_product[0].checked;
        var IsCheckedViewProducts = view_products[0].checked;

        if (IsCheckedEditProduct && !IsCheckedViewProducts) {
            alert("To edit a product it is necessary to select \"View products\"!");
            edit_product.removeAttr('checked') ;
        }
    });

    $('#delete_product_permission, #view_products_permission').change(function () {
        var view_products = $("#view_products_permission");
        var delete_product = $("#delete_product_permission");
        var IsCheckedDeleteProduct = delete_product[0].checked;
        var IsCheckedViewProducts = view_products[0].checked;

        if (IsCheckedDeleteProduct && !IsCheckedViewProducts) {
            alert("To delete a product it is necessary to select \"View products\"!");
            delete_product.removeAttr('checked') ;
        }
    });

    $('#delete_product_permission, #view_products_permission').change(function () {
        var view_products = $("#view_products_permission");
        var delete_product = $("#delete_product_permission");
        var IsCheckedDeleteProduct = delete_product[0].checked;
        var IsCheckedViewProducts = view_products[0].checked;

        if (IsCheckedDeleteProduct && !IsCheckedViewProducts) {
            alert("To delete a product it is necessary to select \"View products\"!");
            delete_product.removeAttr('checked') ;
        }
    });

    $('#manage_alternative_images, #view_products_permission').change(function () {
        var view_products = $("#view_products_permission");
        var manage_images = $("#manage_alternative_images");
        var IsCheckedManageImages = manage_images[0].checked;
        var IsCheckedViewProducts = view_products[0].checked;

        if (IsCheckedManageImages && !IsCheckedViewProducts) {
            alert("To manage products images it is necessary to select \"View products\"!");
            manage_images.removeAttr('checked') ;
        }
    });
    //********************* Categories ******************************/
    $('#edit_category_permission, #view_categories_permission').change(function () {
        var view_categories = $("#view_categories_permission");
        var edit_category = $("#edit_category_permission");
        var IsCheckedEditCatgory = edit_category[0].checked;
        var IsCheckedViewCategories = view_categories[0].checked;

        if (IsCheckedEditCatgory && !IsCheckedViewCategories) {
            alert("To edit a category it is necessary to select \"View categories\"!");
            edit_category.removeAttr('checked') ;
        }
    });

    $('#delete_category_permission, #view_categories_permission').change(function () {
        var view_categories = $("#view_categories_permission");
        var delete_category = $("#delete_category_permission");
        var IsCheckedDeleteCatgory = delete_category[0].checked;
        var IsCheckedViewCategories = view_categories[0].checked;

        if (IsCheckedDeleteCatgory && !IsCheckedViewCategories) {
            alert("To delete a category it is necessary to select \"View categories\"!");
            delete_category.removeAttr('checked') ;
        }
    });
    //********************* Coupons ******************************/
    $('#edit_coupon_permission, #view_coupons_permission').change(function () {
        var view_coupons = $("#view_coupons_permission");
        var edit_coupon = $("#edit_coupon_permission");
        var IsCheckedEditCoupon = edit_coupon[0].checked;
        var IsCheckedViewCoupons = view_coupons[0].checked;

        if (IsCheckedEditCoupon && !IsCheckedViewCoupons) {
            alert("To edit a coupon it is necessary to select \"View coupons\"!");
            edit_coupon.removeAttr('checked') ;
        }
    });

    $('#delete_coupon_permission, #view_coupons_permission').change(function () {
        var view_coupons = $("#view_coupons_permission");
        var delete_coupon = $("#delete_coupon_permission");
        var IsCheckedDeleteCoupon = delete_coupon[0].checked;
        var IsCheckedViewCoupons = view_coupons[0].checked;

        if (IsCheckedDeleteCoupon && !IsCheckedViewCoupons) {
            alert("To delete a coupon it is necessary to select \"View coupons\"!");
            delete_coupon.removeAttr('checked') ;
        }
    });

    //********************* Orders ******************************/
    $('#update_order_status_permission, #view_orders_permission').change(function () {
        var view_orders = $("#view_orders_permission");
        var update_order_status = $("#update_order_status_permission");
        var IsCheckedUpdateOrderStatus = update_order_status[0].checked;
        var IsCheckedViewOrders = view_orders[0].checked;

        if (IsCheckedUpdateOrderStatus && !IsCheckedViewOrders) {
            alert("To update order status it is necessary to select \"View orders\"!");
            update_order_status.removeAttr('checked') ;
        }
    });

    //********************* Banners ******************************/
    $('#edit_banner_permission, #view_banners_permission').change(function () {
        var view_banners = $("#view_banners_permission");
        var edit_banner = $("#edit_banner_permission");
        var IsCheckedEditBanner = edit_banner[0].checked;
        var IsCheckedViewBanners = view_banners[0].checked;

        if (IsCheckedEditBanner && !IsCheckedViewBanners) {
            alert("To edit a banner it is necessary to select \"View banners\"!");
            edit_banner.removeAttr('checked') ;
        }
    });

    $('#delete_banner_permission, #view_banners_permission').change(function () {
        var view_banners = $("#view_banners_permission");
        var delete_banner = $("#delete_banner_permission");
        var IsCheckedDeleteBanner = delete_banner[0].checked;
        var IsCheckedViewBanners = view_banners[0].checked;

        if (IsCheckedDeleteBanner && !IsCheckedViewBanners) {
            alert("To delete a banner it is necessary to select \"View banners\"!");
            delete_banner.removeAttr('checked') ;
        }
    });

    //********************* Developers ******************************/
    $('#edit_developer_permission, #view_developers_permission').change(function () {
        var view_developers = $("#view_developers_permission");
        var edit_developer = $("#edit_developer_permission");
        var IsCheckedEditDeveloper = edit_developer[0].checked;
        var IsCheckedViewDevelopers = view_developers[0].checked;

        if (IsCheckedEditDeveloper && !IsCheckedViewDevelopers) {
            alert("To edit a developer it is necessary to select \"View developers\"!");
            edit_developer.removeAttr('checked') ;
        }
    });

    $('#delete_developer_permission, #view_developers_permission').change(function () {
        var view_developers = $("#view_developers_permission");
        var delete_developer = $("#delete_developer_permission");
        var IsCheckedDeleteDeveloper = delete_developer[0].checked;
        var IsCheckedViewDevelopers = view_developers[0].checked;

        if (IsCheckedDeleteDeveloper && !IsCheckedViewDevelopers) {
            alert("To delete a developer it is necessary to select \"View developers\"!");
            delete_developer.removeAttr('checked') ;
        }
    });

    //********************* Groups ******************************/
    $('#edit_group_permission, #view_groups_permission').change(function () {
        var view_groups = $("#view_groups_permission");
        var edit_group = $("#edit_group_permission");
        var IsCheckedEditGroups = edit_group[0].checked;
        var IsCheckedViewGroups = view_groups[0].checked;

        if (IsCheckedEditGroups && !IsCheckedViewGroups) {
            alert("To edit a group it is necessary to select \"View groups\"!");
            edit_group.removeAttr('checked') ;
        }
    });

    $('#delete_group_permission, #view_groups_permission').change(function () {
        var view_groups = $("#view_groups_permission");
        var delete_group = $("#delete_group_permission");
        var IsCheckedDeleteGroups = delete_group[0].checked;
        var IsCheckedViewGroups = view_groups[0].checked;

        if (IsCheckedDeleteGroups && !IsCheckedViewGroups) {
            alert("To delete a group it is necessary to select \"View groups\"!");
            delete_group.removeAttr('checked') ;
        }
    });

    



   




});