<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@HomePage');
Route::get(setting('about_us'), 'HomeController@aboutPage');

Route::get(setting('contact_us'), 'HomeController@contact');
Route::post('/send/contact', 'ContactController@sendContact')->name('send.contact');

Route::get(setting('our_services'), 'HomeController@servicesPage');
Route::get('/services/{id}/{title}', 'HomeController@singleService')->name('service.show');

Route::get(setting('our_projects'), 'HomeController@projectsPage');
Route::get('project/{id}/{title}', 'HomeController@singleProject')->name('project.show');

Route::get('profile', 'HomeController@profilePage')->middleware('auth');

Route::get(setting('blogs'), 'HomeController@blogsPage');
Route::get('/blogs/{id}/{title}', 'HomeController@showBlog')->name('blog.show');

Route::get('/lang/{language}', 'HomeController@changeLanguage');


// Admin ROUTES
Auth::routes(['register' => false]);

Route::get('lang/{lang}','Admin\LanguageController@changeLanguage')->name('admin.lang');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'is_admin'] , function () {

    Route::get('dashboard', 'AdminController@showDashboard')->name('dashboard');

    Route::resource('slider', 'SliderController');

    Route::resource('services', 'ServiceController');

    Route::resource('projects', 'ProjectController');
    Route::post('project/upload/images', 'ProjectController@uploadProjectImages')->name('upload.project.images');
    Route::post('project/remove/image', 'ProjectController@removeProjectImage')->name('remove.project.image');

    Route::resource('contacts', 'ContactController');

    Route::resource('about', 'AboutUsController');

    Route::resource('testimonials', 'TestimonialController');

    Route::resource('blogs', 'BlogController');

    Route::resource('team-members', 'TeamMemberController');

    Route::resource('owners', 'OwnerController');

    Route::resource('contactus', 'ContactUsController');

    Route::resource('clients', 'ClientController');

    Route::get('settings/contact-info', 'ContactInfoController@contactInfo')->name('settings.contact');
    Route::post('settings/contact-info', 'ContactInfoController@store')->name('settings.contact.store');

    Route::get('settings/pages', 'ContactInfoController@showPage')->name('settings.pages');
    Route::post('settings/pages', 'ContactInfoController@storePages')->name('settings.pages.store');

    Route::get('settings/seo', 'SeoController@showSeoPage')->name('settings.seo');
    Route::post('settings/seo', 'SeoController@store')->name('settings.seo.store');

    Route::get('settings/analytics', 'AnalyticsController@showPage')->name('settings.analytics');
    Route::post('settings/analytics', 'AnalyticsController@store')->name('settings.analytics');

    Route::resource('website-settings', 'SettingController');

    Route::resource('logos', 'LogoController');

    Route::resource('users', 'UserController');
    Route::post('user/update/password/{id}', 'UserController@updatePassword')->name('update.password');

    Route::resource('data', 'DataController');
    Route::post('data/upload/images', 'ImageController@uploadDataImages')->name('upload.data.images');
    Route::post('data/remove/image', 'ImageController@removeDataImage')->name('remove.data.image');

    Route::post('upload/image', 'ImageController@uploadPhoto')->name('upload.image');
    Route::post('remove/image', 'ImageController@removePhoto')->name('remove.image');


    Route::get('profile/edit', 'ProfileController@edit')->name('edit.profile');
    Route::post('profile/edit', 'ProfileController@update')->name('update.profile');

    Route::get('themes', 'ThemeController@index')->name('themes.index');
    Route::post('themes/{id}', 'ThemeController@changeTheme')->name('themes.change');

    Route::get('themes/{name}', 'ThemeController@showTheme')->name('theme.show');

    Route::get('settings/tokens', 'FacebookController@showPage')->name('settings.tokens');
    Route::post('settings/tokens', 'FacebookController@store')->name('settings.tokens');

    Route::get('clear/notifications', 'NotificationController@clearAll')->name('clear.notifications');
    Route::get('view/notifications', 'NotificationController@viewAll')->name('view.notifications');

    Route::post('client/image','ImageController@uploadClientImage')->name('client.image');
});
