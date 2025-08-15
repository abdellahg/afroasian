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


//---------------- guest routes -----------------
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' =>[ 'web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'], 'namespace' => 'site' ],
    function(){
       
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/login', 'authController@login');
        Route::get('/register', 'authController@register');
        
        Route::get('/category/{slug}', 'ListController@index');
        Route::get('/destination/{slug}', 'ListController@destination');
        Route::get('/tour/{slug}', 'ItemController@index');
        Route::get('/reserve/tour', 'ReserveController@index');
        
        Route::get('/gallery/{slug}', 'GalleryController@index')->name('gallery');
        Route::get('/blogs', 'BlogController@index')->name('blogs');
        Route::get('/blogs/category/{slug}', 'BlogController@category')->name('blogs');
        Route::get('/blog/{slug}', 'BlogController@blog')->name('blogs');
        Route::get('/about-us', 'PagesController@about')->name('about');
        Route::get('/contact-us', 'PagesController@contact')->name('contact');
        Route::get('/terms-and-conditions', 'PagesController@terms');
        Route::get('/survey', 'SurveyController@index');
        Route::get('/survey/success', 'SurveyController@success');
        
        
    });
    
//------------ user routes --------------------
Route::post('/store-user', 'site\authController@storeUser');
Route::post('/new-reservation', 'site\ReserveController@newReservation');
Route::post('/new-survey', 'site\SurveyController@newSurvey');
Route::post('/getdestinations', 'site\SurveyController@getdestinations');
Route::post('/contactform', 'site\PagesController@contactform');
Route::post('/reviewform', 'site\ReviewController@reviewform');

//------------ global routes ------------------
Route::group(['namespace' => 'General' ], function () {
Route::post('/sessionstore', 'SessionController@sessionstore');

//logout
Route::get('/logout', 'SessionController@destroy');

});


//------------- Admin routes -------------------
Route::get('/admin', function () {
        return view('admin.pages.login.index');
    });

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Admin' ], function () {
    
Route::get('/dashboard', 'DashboardController@index');

//------------------ Categories ----------------
Route::get('/categories/main', 'CategoryController@main');
Route::get('/categories/main/add', 'CategoryController@addMain');
Route::post('/categories/main/store', 'CategoryController@storeMain');
Route::get('/categories/main/edit/{id}', 'CategoryController@editMain');
Route::post('/categories/main/update/{id}', 'CategoryController@updateMain');

Route::get('/categories/sub', 'CategoryController@sub');
Route::get('/categories/sub/add', 'CategoryController@addSub');
Route::post('/categories/sub/store', 'CategoryController@storeSub');
Route::get('/categories/sub/edit/{id}', 'CategoryController@editSub');
Route::post('/categories/sub/update/{id}', 'CategoryController@updateSub');

Route::post('/categories/category-status/{id}', 'CategoryController@categoryStatus');

//------------------ Destinations ----------------
Route::get('/destinations/local', 'DestinationController@local');
Route::get('/destinations/foreign', 'DestinationController@foreign');
Route::get('/destinations/add', 'DestinationController@add');
Route::post('/destinations/store', 'DestinationController@store');
Route::get('/destinations/edit/{id}', 'DestinationController@edit');
Route::post('/destinations/update/{id}', 'DestinationController@update');

Route::post('/destinations/destination-status/{id}', 'DestinationController@destinationStatus');
Route::post('/destinations/delete-image', 'DestinationController@deleteImage');

//------------------ Items ----------------
Route::get('/items', 'ItemController@index');
Route::get('/items/add', 'ItemController@add');
Route::post('/items/store', 'ItemController@store');
Route::get('/items/edit/{id}', 'ItemController@edit');
Route::post('/items/update/{id}', 'ItemController@update');

Route::post('/items/item-status/{id}', 'ItemController@itemStatus');
Route::post('/items/delete-primary-image', 'ItemController@deletePrimaryImage');
Route::post('/items/delete-image', 'ItemController@deleteImage');
//------------------ Payments ----------------
Route::get('/payments', 'PaymentController@payments');

//------------------ Reservations ----------------
Route::get('/reservations', 'ReserveController@index');
Route::get('/reservation-user/{user_id}', 'ReserveController@reservationUser');
Route::get('/reservations/{id}', 'ReserveController@reservationDetails');
Route::post('/reservations/update/{id}', 'ReserveController@update');

//------------------ Messages ----------------
Route::get('/messages', 'PagesController@messages');
Route::get('/messages/{id}', 'PagesController@message');

//------------------ Reviews ----------------
Route::get('/reviews', 'ReviewController@reviews');
Route::get('/reviews/{id}', 'ReviewController@review');
Route::post('/reviews/review-status/{id}', 'ReviewController@reviewStatus');
Route::post('/reviews/review-featured/{id}', 'ReviewController@reviewFeatured');

//------------------ Blog Categories ----------------
Route::get('/blog/categories/', 'BcategoryController@index');
Route::get('/blog/categories/add', 'BcategoryController@add');
Route::post('/blog/categories/store', 'BcategoryController@store');
Route::get('/blog/categories/edit/{id}', 'BcategoryController@edit');
Route::post('/blog/categories/update/{id}', 'BcategoryController@update');

Route::post('/blog/categories/bcategory-status/{id}', 'BcategoryController@bcategoryStatus');
Route::post('/blog/categories/delete-image', 'BcategoryController@deleteImage');

//------------------ Blogs ----------------
Route::get('/blogs', 'BlogController@index');
Route::get('/blogs/add', 'BlogController@add');
Route::post('/blogs/store', 'BlogController@store');
Route::get('/blogs/edit/{id}', 'BlogController@edit');
Route::post('/blogs/update/{id}', 'BlogController@update');

Route::post('/blogs/blog-status/{id}', 'BlogController@blogStatus');
Route::post('/blogs/delete-image', 'BlogController@deleteImage');
    
//------------------ Galleries ----------------
Route::get('/galleries', 'GalleryController@index');
Route::get('/galleries/add', 'GalleryController@add');
Route::post('/galleries/store', 'GalleryController@store');
Route::get('/galleries/edit/{id}', 'GalleryController@edit');
Route::post('/galleries/update/{id}', 'GalleryController@update');

Route::post('/galleries/gallery-status/{id}', 'GalleryController@itemStatus');
Route::post('/galleries/delete-image', 'GalleryController@deleteImage');

//---------------Site Setting --------------
Route::get('/settings', 'SettingsController@index');
Route::get('/social', 'SettingsController@social');
Route::get('/meta-settings', 'SettingsController@metaSettings');
Route::post('/save-settings', 'SettingsController@saveSettings');

//--------------Pages Setting --------------
Route::get('/home-settings', 'PagesController@homeSettings');
Route::post('/save-home-settings', 'PagesController@saveHomeSettings');
Route::get('/home-services', 'PagesController@homeServices');
Route::post('/save-home-services', 'PagesController@saveHomeServices');
Route::get('/about-settings', 'PagesController@aboutSettings');
Route::post('/save-about-settings', 'PagesController@saveAboutSettings');
Route::get('/contact-settings', 'PagesController@contactSettings');
Route::post('/save-contact-settings', 'PagesController@saveContactSettings');
Route::get('/terms-settings', 'PagesController@termsSettings');
Route::post('/save-terms-settings', 'PagesController@saveTermsSettings');
Route::get('/register-settings', 'PagesController@registerSettings');
Route::post('/save-register-settings', 'PagesController@saveRegisterSettings');

//------------------- admins -------------------
Route::get('/admins', 'AdminController@index');
Route::post('admin-status/{id}', 'AdminController@adminStatus');
Route::get('/add-admin', 'AdminController@addAdmin');
Route::post('/store-admin', 'AdminController@storeAdmin');
Route::get('/edit-admin/{id}', 'AdminController@editAdmin');
Route::post('/update-admin/{id}', 'AdminController@updateAdmin');
Route::post('/changePassword/{id}', 'AdminController@changePassword');

//--------------- users -----------------------
Route::get('/users', 'UserController@index');

//--------------- Surveys -----------------------
Route::get('/surveys', 'SurveyController@index');
Route::get('/survey/{id}', 'SurveyController@survey');

});

