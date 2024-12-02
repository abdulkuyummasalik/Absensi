<?php

use App\Http\Controllers\Absen\AbsenAlpaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Absen\AbsenController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RayonController;
use App\Http\Controllers\Route\RouteController;
use App\Http\Controllers\Admin\RombelController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\JamAbsenController;
use App\Http\Controllers\Admin\SortRoleController;
use App\Http\Controllers\Absen\AbsenIzinController;
use App\Http\Controllers\Admin\HariAbsenController;
use App\Http\Controllers\Admin\SortAbsenController;
use App\Http\Controllers\Absen\AbsenSakitController;
use App\Http\Controllers\Admin\AbsenAdminController;
use App\Http\Controllers\Absen\ExportAbsenController;

Route::group(['middleware' => 'guest'], function () {
	Route::get('/', function () {
    return view('welcome');
	})->name('/');
});

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {

	//=============================================================================================
	// STUDENT PAGES
	//=============================================================================================

	Route::name('student.')->prefix('student')->middleware('student')->group(function () {
		Route::get('dashboard', [AbsenController::class, 'index'])->name('dashboard');
		Route::resource('absen', AbsenController::class)->except(['index', 'show', 'edit']);
		Route::post('absen/izin', AbsenIzinController::class)->name('absen.izin');
		Route::post('absen/sakit', AbsenSakitController::class)->name('absen.sakit');
	});

	//=============================================================================================
	// ADMIN PAGES
	//=============================================================================================

	Route::name('admin.')->prefix('admin')->middleware('admin')->group(function () {
		Route::get('dashboard', [RouteController::class, 'dashboardAdmin'])->name('dashboard');
		Route::get('absens', [RouteController::class, 'indexAbsenAdmin'])->name('absens');
		Route::resource('absen', AbsenAdminController::class);
		Route::name('absen.')->group(function () {
			Route::get('daily/absen', [SortAbsenController::class, 'dailySort'])->name('daily-sort');
			Route::get('daily/absen/distinct', [SortAbsenController::class, 'dailySortDistinct'])->name('daily-sort-distinct');
			Route::post('izin/absen', AbsenIzinController::class)->name('izin');
			Route::post('sakit/absen', 	AbsenSakitController::class)->name('sakit');
			Route::get('alpa/absen', 	AbsenAlpaController::class)->name('alpa');
			Route::get('rayonChoose/absen', [SortAbsenController::class, 'chooseRayon'])->name('choose-rayon');
			Route::get('dateChoose/absen', [SortAbsenController::class, 'chooseDate'])->name('choose-date');
			Route::get('rayonDaily/absen', [SortAbsenController::class, 'rayonDailySort'])->name('rayon-daily-sort');
			Route::delete('rayonDaily/absen/{absen}', [SortAbsenController::class, 'destroyRayonDaily'])->name('destroy-rayon-daily');
			Route::get('dateAbsen/absen', [SortAbsenController::class, 'dateAbsenSort'])->name('date-sort');
			Route::get('dateAbsen/{date}/distinct', [SortAbsenController::class, 'dateAbsenSortDistinct'])->name('date-sort-distinct');
			Route::resource('jamAbsen', JamAbsenController::class)->only(['index', 'update']);
			Route::resource('hariAbsen', HariAbsenController::class)->only(['index', 'update']);
		});
		Route::resource('rayon', RayonController::class)->except(['create', 'show', 'edit']);
		Route::resource('rombel', RombelController::class)->except(['create', 'show', 'edit']);
		// Route::resource('user', 'App\Http\Controllers\UserController', ['only' => ['index']]);
		Route::get('user', [RouteController::class, 'regUser'])->name('user.index');
		Route::get('adminSort', [SortRoleController::class, 'admin'])->name('admin-sort');
		Route::get('studentSort', [SortRoleController::class, 'student'])->name('student-sort');
		Route::resource('student', StudentController::class)->except(['index', 'show']);
		Route::resource('admin', AdminController::class)->except(['index', 'show']);
		Route::get('absen/date/export', [ExportAbsenController::class, 'addDate'])->name('export.absen.add-date');
	});

	Route::get('search', SearchController::class)->name('search');

});

//=============================================================================================
	// TEMPLATE PAGES
	//=============================================================================================

	Route::get('/home', [HomeController::class, 'index'])->name('home');

	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');

// Route::group(['middleware' => 'auth'], function () {
	// Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
// });

