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


Route::middleware(['IsAdmin'])->group(function () {
    // Главная страница
    Route::get('/', function () {return view('upanel.main');});
    // Спиоск всех угроз
    Route::get('/usp/treatslist','TreatsController@index');
    // Управление источников угроз
    Route::get('/usp/treatslist/manager/{id?}','TreatsController@manTreats',
        function($id=0){});
    // Удаление угрозы из БД
    Route::post('/usp/treatslist/manager/{id?}','TreatsController@SaveUpdateTreats',
        function($id=0){})->name('managertreats_add_save');;
    // Спиоско все источников угроз
    Route::get('/usp/treatsistochniklist','TreatsController@indexIstochnik');
    // Управление источников угроз
    Route::get('/usp/treatsistochniklist/manager/{id?}','TreatsController@manIstochnik',
        function($id=0){});
    // Добовляем или изменяем данные
    Route::post('/usp/treatsistochniklist/manager/{id?}','TreatsController@SaveUpdateIstochnik',
        function($id=0){})->name('manageristochnik_add_save');
    //Удоляем данные ( источники)
    Route::get('/usp/treatsistochniklist/delete/{id?}','TreatsController@deleteIstochnik',
        function($id=0){});
    // Спиоско все источников угроз
    Route::get('/usp/treatsposledctvies','TreatsController@indexPosledctvies');

    // Управление последствием угроз
    Route::get('/usp/treatsposledctvies/manager/{id?}','TreatsController@manPosledctvie',
        function($id=0){});

    // Добовляем или изменяем данные в таблице последствии угроз
    Route::post('/usp/treatsposledctvies/manager/{id?}','TreatsController@SaveUpdatePosledctvie',
        function($id=0){})->name('managerposledctvies_add_save');

    // Удоляем данные ( источники)
    Route::get('/usp/treatsposledctvies/delete/{id?}','TreatsController@deletePosledctvie',
        function($id=0){});

    // Удоляем данные ( источники)
    Route::get('/usp/treatslist/delete/{id?}','TreatsController@deleteTreats',
        function($id=0){});


    // Спиоск всех барьеров защиты
    Route::get('/usp/scuriteblist','SecuritybController@IndexAll');

    // Управление барьеров защиты
    Route::get('/usp/scuriteblist/manager/{id?}','SecuritybController@manForm',
        function($id=0){});

    // Добовление или изменение угрозы из БД
    Route::post('/usp/scuriteblist/manager/{id?}','SecuritybController@SaveUpdateSecuriteb',
        function($id=0){})->name('managersecuriteb_add_save');

    // Удоляем данные ( источники)
    Route::get('/usp/scuriteblist/delete/{id?}','SecuritybController@deleteRecord',
        function($id=0){});

    // Стойкость
    Route::get('/usp/scuriteblist/stoikost/{id?}','SecuritybController@indexStoikost',
        function($id=0){});
    // Стойкость записываем
    Route::post('/usp/scuriteblist/stoikost/{id?}','SecuritybController@SaveStoikost',
        function($id=0){})->name('save_stoikost');
    // Спиоск защищаемых объктов
    Route::get('/usp/objinfolist','ObjectInform@indexAll');

    // Управление барьеров защиты
    Route::get('/usp/objinfolist/manager/{id?}','ObjectInform@manObjectInfo',
        function($id=0){});
    // Управление барьеров защиты
    Route::post('/usp/objinfolist/manager/{id?}','ObjectInform@AddUpdatObject',
        function($id=0){})->name('add_update_objectinfo');

    // Удоляем данные ( источники)
    Route::get('/usp/objinfolist/delete/{id?}','ObjectInform@deleteRecord',
        function($id=0){});

    // Начало выбора средств защищаемых объектов для моделирования
    Route::get('/usp/model','MathModelController@index');
    // Анализируем
    Route::post('/usp/model','MathModelController@MathAnaliz');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
if (env('ALLOW_USER_REGISTRATION', true))
{
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
}
else
{
    Route::match(['get','post'], 'register', function () {
        return redirect('/');
    })->name('register');
}

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

