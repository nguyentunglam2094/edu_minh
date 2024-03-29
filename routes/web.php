<?php

use Illuminate\Support\Facades\Route;

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


Route::group(['namespace' => 'Students'], function () {
    route::get('/dang-nhap', 'AuthController@viewLogin')->name('view.login');
    route::post('/login', 'AuthController@login')->name('post.login');
    route::get('/dang-ky-tai-khoan', 'AuthController@viewSignup')->name('signup.view');
    route::post('/signup', 'AuthController@signup')->name('signup');
    // route::get('trang-chu', 'HomeController@index')->name('home.page');
    route::get('/quen-mat-khau', 'PasswordController@viewReset')->name('view.reset.password');
    route::post('/quen-mat-khau', 'PasswordController@reset')->name('reset.password');
    route::post('/xac-nhan-email', 'PasswordController@confirmEmail')->name('confirm.email');
    route::get('/quen-mat-khau/{token}', 'PasswordController@getViewReset')->name('view.reset.pass');

    route::get('/', 'HomeController@index')->name('home.page');
    route::get('giao-vien/{id}', 'HomeController@detailTeacher')->name('detail.teacher');

    //cần login, thi online cũng cần đăng nhập
    Route::group(['middleware' => ['logged']], function () {
        route::get('notifications', 'NotificationController@getNotifications')->name('get.list.notification');
        route::get('read-notification', 'NotificationController@readNoti')->name('read.notification');

        Route::group(['prefix' => 'dang-bai-tap'], function () {
            route::get('/', 'SubjectController@index')->name('list.subject');
            //chủ đề
            route::get('mon-hoc/{subject}/{class}', 'SubjectController@indexSubject')->name('list.subject.class');
            route::get('/{id}', 'SubjectController@detailSubject')->name('detail.subject');
        });

        Route::group(['prefix' => 'bai-tap'], function () {
            route::get('/chi-tiet/{id}', 'ExerController@detailExer')->name('detail.exersire');
        });
        route::get('/comment-bai-tap', 'ExerController@loadCommentEx')->name('comment.exersire');
        route::get('/comment-bai-thi', 'TestController@loadCommentTest')->name('comment.test');
        route::get('/logout', 'AuthController@logout')->name('logout');

        Route::group(['prefix' => 'lam-bai-thi-online'], function () {

            route::get('/{slug}', 'TestController@indexTest')->name('index.test.online');
            route::get('/loai-de-thi/{id}/{slug}', 'TestController@typeTest')->name('view.type.test');
            // route::get('/{slug}', 'TestController@indexTest')->name('index.test.online');
            route::get('/de-thi/{id}', 'TestController@detail')->name('test.online');
            route::post('/nop-bai', 'TestController@endTest')->name('end.test');
            route::get('/ket-qua/{id}', 'TestController@resultTest')->name('result.test');
        });

        route::post('/update-token-device', 'AuthController@updateDevice')->name('update.token.device');

        route::get('tim-kiem', 'HomeController@searchCode')->name('search.code');
        route::get('cap-nhap-thong-tin-ca-nhan', 'AuthController@updateProfile')->name('update.profile.view');
        route::post('update-profile', 'AuthController@update')->name('update.profile');
        route::get('doi-mat-khau','AuthController@viewChangePassword')->name('change.pass.view');
        route::post('change-password', 'AuthController@changePassword')->name('change.password');

        route::get('lich-su-de-thi', 'StudentController@historyTest')->name('history.test');

        Route::prefix('chu-de')->group(function () {
            route::get('/{code}', 'ThemeController@detailTheme')->name('index.themes');
            route::get('/dang-bai-tap/{code}','ThemeController@indexType')->name('index.type.ex');
        });
    });

});
