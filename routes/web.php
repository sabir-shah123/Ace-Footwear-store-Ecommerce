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

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Session;

Route::get('/cache',function(){
\Artisan::call('cache:clear');
\Artisan::call('config:clear');
\Artisan::call('view:clear');
});
Route::get('/', 'HomeController@show')->name('ace');

Route::get('/admin/login', function () {
    return view('auth.login');
});

Route::get('/contact-us', function () {
    return view('layout_ace.ace_master.contact_us');
});
Route::get('/about-us', function () {
    return view('layout_ace.ace_master.about_us');
});
Route::post('admin/login/check','Auth\LoginController@adminlogin')->name('login.admin');
Route::post('cust/login/check','Auth\LoginController@login11')->name('login11');
Route::get('/home', function () {
    return view('layout_ace.ace_master.ace_home');
});

Route::get('/reset/password', function () {
    return view('layout_ace.ace_master.reset_email');
});
Route::get('/forget/password', function () {
    return view('layout_ace.ace_master.reset');
});

Route::get('/home', 'HomeController@show')->name('showt');
Route::get('/search', 'HomeController@search')->name('searcht');


Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/add-to-cart', 'HomeController@AddToCart')->name('product-detail');
Route::get('/delete-to-cart/{id}', 'HomeController@deleteToCart')->name('product-detail');


Route::get('/customer/signup','HomeController@signup');
Route::get('/customer/login', 'HomeController@login');








Auth::routes();


//--------------Filter Products-----------------
/*Route::get('/shop/filter/{cat}/{keyword}', 'HomeController@CatFilter')->name('filter');
Route::get('/shop/filter/{cat}/{subcat}/{keyword}', 'HomeController@CatFilter2')->name('filter-2');*/
/*Route::get('/shop/filter/{?cat}/{?subcat}/{?price}/', 'HomeController@priceRangeSubbcat')->name('price-range');*/



//-------------Product Detail-----------
Route::get('/product_detail/{id}', 'HomeController@showProductDetail')->name('product-detail');
Route::get('/product_stock/{id}/{pcolor}', 'HomeController@getStock');



Route::get('/brand/{catalog}', 'HomeController@showBrands');
Route::get('/brand/{catalog}/{category?}/{filter}', 'HomeController@showDataFilterBrand');

Route::get('/shop/{catalog?}/{category?}', 'HomeController@showData');
Route::get('/shop/{catalog?}/{category?}/{filter}', 'HomeController@showDataFilter');




Route::post('/admin/register', 'AdminUserController@Adminstore')->name('admin-store');

Route::post('/customer/signup', 'AdminUserController@customerStore')->name('customer-store');


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('/add/newsletter', 'Controller@NewsLetter')->name('newsletter1');
Route::post('/contactus', 'Controller@Contactus')->name('contactus');


Route::middleware(['admin'])->group(function (){
    Route::get('/d_home', 'HomeController@home')->name('home');
    Route::get('/show/admin', 'HomeController@showAdmin')->name('show-admin');
    Route::get('/admin/change-password', 'AdminUserController@index2')->name('admin-changepass');
    Route::get('show/all/products', 'HomeController@showallProducts')->name('showallproduct');
    Route::get('show/all/images', 'HomeController@showallImages')->name('showallimage');
    Route::get('show/all/sizes', 'HomeController@showallSizes')->name('showallsize');
    Route::get('show/all/colors', 'HomeController@showallColors')->name('showallcolor');
    Route::get('/show/all/users', 'HomeController@showallCustomers')->name('showallusers');
    Route::get('show/all/orders', 'HomeController@showallOrders')->name('showallorders');
    Route::get('/add/product', 'AddProductController@index');
    Route::get('/add/product', 'AddProductController@showBrandName');
    Route::post('/store', 'AddProductController@store')->name('store');

    Route::get('/add/product/brand', 'AddProductController@index2');
    Route::post('/store-brand', 'AddProductController@storeBrand')->name('store-Brand');



    Route::get('/add/product/image', 'AddProductImageController@index');
    Route::get('/add/product/image', 'AddProductImageController@showTitle');
    Route::post('/store-image', 'AddProductImageController@store')->name('store-image');


    Route::get('/add/product/color', 'AddProductColorController@index');
    Route::get('/add/product/color', 'AddProductColorController@showTitle');
    Route::post('/store-color', 'AddProductColorController@store')->name('store-color');

    Route::get('/add/product/size', 'AddProductSizeController@index');
    Route::get('/add/product/size', 'AddProductSizeController@showTitle');
    Route::post('/store-size', 'AddProductSizeController@store')->name('store-size');



    Route::put('/update/admin/{id}', 'UpdateProductController@updateAdmin')->name('update-admin');
    Route::put('/update/admin/image/{id}', 'UpdateProductController@updateAdminImage')->name('update-adminImage');

    Route::put('/update/product/{id}', 'UpdateProductController@updateProduct')->name('update-product');
    Route::put('/update/product/title/{id}', 'UpdateProductController@updateProductTitle')->name('update-producttitle');
    Route::put('/update/image/{id}', 'UpdateProductController@updateImage')->name('update-image');
    Route::put('/update/brand/{id}', 'UpdateProductController@updateBrand')->name('update-brand');
    Route::put('/update/brand-image/{id}', 'UpdateProductController@updateBrandImage')->name('update-brandimage');
    Route::put('/update/order/status/{id}', 'UpdateProductController@updateOrderStatus')->name('update-orderstatus');

    Route::put('/update/product/{prod}/{id}', 'UpdateProductController@updateProductcolor')->name('update-color');





    Route::delete('/delete/product/{id}', 'DeleteProductController@deleteProduct')->name('delete-product');
    Route::delete('/delete/colorsize/{id}', 'DeleteProductController@deleteColorSize')->name('delete-colorsize');
    Route::delete('/delete/image/{id}', 'DeleteProductController@deleteImage')->name('delete-image');
    Route::delete('/delete/brand/{id}', 'DeleteProductController@deleteBrand')->name('delete-brand');

    Route::post('/change/admin/pass', 'AdminUserController@adminChangePass')->name('adminChangePass');
    Route::post('/remaining/stock', 'AdminUserController@chkStock1')->name('chkStock');


    /*Route::get('/messages', 'Controller@messages')->name('messages');*/
    Route::get('/messages', function () {
        return view('layout_dashboard.d_master.messages');
    });
    Route::get('/remaining/stock', function () {
        return view('layout_dashboard.d_master.d_check_stock');
    });



    Route::post('/laravel-send-email/{id}', 'EmailController@sendEMail')->name('reply.mail');


    Route::post('/laravel-send-newsletter', 'EmailController@sendNewsletter')->name('newsletter.mail');
    Route::get('/send/newsletter', function () {
        return view('layout_dashboard.d_master.newsletter');
    });



});




Route::middleware(['auth'])->group(function (){
    Route::get('/welcome', 'HomeController@welcome');
    Route::get('/welcome1', 'HomeController@welcome1');
});


Route::get('/shopping_cart', function () {
    if(Session::has('cart'))
    {
        $ar = Session::get('cart');
        if(count($ar)==0)
        {
            return view('/layout_ace.ace_master.cart')->with('warning' , 'No items in your cart');
        }
        return view('layout_ace.ace_master.cart');
    }
    else
        return view('layout_ace.ace_master.cart');
});
Route::middleware(['user'])->group(function (){


    /*Route::get('/d_home', 'HomeController@totalUsers')->name('totalUsers');*/





            Route::get('/checkout', function () {
                if (Session::has('cart')) {
                    $ar = Session::get('cart');
                    if (count($ar) == 0) {
                        return redirect('/home')->with('warning' , 'No items in your cart');
                    }
                    return view('layout_ace.ace_master.checkout');
                } else
                    return redirect('/home')->with('warning' , 'No items in your cart');

            });
            Route::post('/proceedcheckout', 'HomeController@checkout');





        Route::put('/customer/accUpdate/{id}', 'AdminUserController@custAccount')->name('cust-accountUpdate');
        Route::get('/customer/account', 'AdminUserController@index3')->name('account');
        Route::get('/customer/change/password', 'AdminUserController@index4')->name('cust-changepass');
        Route::get('/customer/order/history', 'AdminUserController@index5')->name('cust-history');
        Route::get('/customer/order/history', 'HomeController@showOrderHistory')->name('showOrderHistory');
        Route::post('/change/cust/pass', 'HomeController@custChangePass')->name('custChangePass');




    Route::put('/cancel/order/{id}', 'UpdateProductController@updateCancelOrder')->name('update-Cancelorder');


});

