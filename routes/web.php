<?php

use App\Http\Livewire\BusinessWheel\BusinessWheelDashboard;
use App\Http\Livewire\BusinessWheel\BusinessWheelUpdate;
use App\Http\Livewire\Calendar\CalendarCreate;
use App\Http\Livewire\Calendar\CalendarDashboard;
use App\Http\Livewire\Calendar\CalendarUpdate;
use App\Http\Livewire\Fair\FairCreate;
use App\Http\Livewire\Fair\FairDashboard;
use App\Http\Livewire\Fair\FairUpdate;
use App\Http\Livewire\Fair\Stand;
use App\Http\Livewire\Home\Home;
use App\Http\Livewire\Home\Pavilion;
use App\Http\Livewire\Home\Stand as HomeStand;
use App\Http\Livewire\Information\InformationCreate;
use App\Http\Livewire\Information\InformationDashboard;
use App\Http\Livewire\Information\InformationUpdate;
use App\Http\Livewire\Pavilion\PavilionCreate;
use App\Http\Livewire\Pavilion\PavilionDashboard;
use App\Http\Livewire\Pavilion\PavilionUpdate;
use App\Http\Livewire\Product\ProductCreate;
use App\Http\Livewire\Product\ProductDashboard;
use App\Http\Livewire\Product\ProductUpdate;
use App\Http\Livewire\ProductCategory\ProductCategoryCreate;
use App\Http\Livewire\ProductCategory\ProductCategoryDashboard;
use App\Http\Livewire\ProductCategory\ProductCategoryUpdate;
use App\Http\Livewire\Publication\PublicationCreate;
use App\Http\Livewire\Publication\PublicationDashboard;
use App\Http\Livewire\Publication\PublicationUpdate;
use App\Http\Livewire\ReadingReport\ReadingReportPrint;
use App\Http\Livewire\Role\RoleCreate;
use App\Http\Livewire\Role\RoleDashboard;
use App\Http\Livewire\Role\RoleUpdate;
use App\Http\Livewire\Setting\SettingDashboard;
use App\Http\Livewire\Setting\SettingUpdate;
use App\Http\Livewire\Stand\StandCreate;
use App\Http\Livewire\Stand\StandDashboard;
use App\Http\Livewire\Stand\StandUpdate;
use App\Http\Livewire\StandRequest\StandRequestCreate;
use App\Http\Livewire\StandRequest\StandRequestDashboard;
use App\Http\Livewire\StandRequest\StandRequestExternal;
use App\Http\Livewire\StandRequest\StandRequestUpdate;
use App\Http\Livewire\TypeCompany\TypeCompanyCreate;
use App\Http\Livewire\TypeCompany\TypeCompanyDashboard;
use App\Http\Livewire\TypeCompany\TypeCompanyUpdate;
use App\Http\Livewire\User\UserCreate;
use App\Http\Livewire\User\UserDashboard;
use App\Http\Livewire\User\UserUpdate;
use App\Http\Livewire\Webinar\WebinarCreate;
use App\Http\Livewire\Webinar\WebinarDashboard;
use App\Http\Livewire\Webinar\WebinarUpdate;
use Illuminate\Support\Facades\App;
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


Route::group(['middleware' => ['auth:sanctum', 'verified', 'language'], 'prefix' => 'dashboard'], function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    //Admin User
    Route::get('user', UserDashboard::class)->name('user.dashboard')->middleware('auth', 'role:admin');
    Route::get('user-create', UserCreate::class)->name('user.create')->middleware('auth', 'role:admin');
    Route::get('user-update/{slug}', UserUpdate::class)->name('user.update')->middleware('auth', 'role:admin');

    //Admin Pabellon
    Route::get('pavilion', PavilionDashboard::class)->name('pavilion.dashboard')->middleware('auth', 'role:admin');
    Route::get('pavilion-create', PavilionCreate::class)->name('pavilion.create')->middleware('auth', 'role:admin');
    Route::get('pavilion-update/{slug}', PavilionUpdate::class)->name('pavilion.update')->middleware('auth', 'role:admin');

    //Admin Product-Category
    Route::get('product-category', ProductCategoryDashboard::class)->name('product-category.dashboard')->middleware('auth', 'role:admin');
    Route::get('product-category-create', ProductCategoryCreate::class)->name('product-category.create')->middleware('auth', 'role:admin');
    Route::get('product-category-update/{slug}', ProductCategoryUpdate::class)->name('product-category.update')->middleware('auth', 'role:admin');

    //Admin Product
    Route::get('role', RoleDashboard::class)->name('role.dashboard')->middleware('auth', 'role:admin');
    Route::get('role-create', RoleCreate::class)->name('role.create')->middleware('auth', 'role:admin');
    Route::get('role-update/{slug}', RoleUpdate::class)->name('role.update')->middleware('auth', 'role:admin');

    //Admin Product
    Route::get('product', ProductDashboard::class)->name('product.dashboard')->middleware('auth', 'role:admin');
    Route::get('product-create', ProductCreate::class)->name('product.create')->middleware('auth', 'role:admin');
    Route::get('product-update/{slug}', ProductUpdate::class)->name('product.update')->middleware('auth', 'role:admin');

    //Admin Webinar
    Route::get('webinar', WebinarDashboard::class)->name('webinar.dashboard')->middleware('auth', 'role:admin');
    Route::get('webinar-create', WebinarCreate::class)->name('webinar.create')->middleware('auth', 'role:admin');
    Route::get('webinar-update/{slug}', WebinarUpdate::class)->name('webinar.update')->middleware('auth', 'role:admin');

    //Admin Calendar
    Route::get('calendar', CalendarDashboard::class)->name('calendar.dashboard')->middleware('auth', 'role:admin');
    Route::get('calendar-create', CalendarCreate::class)->name('calendar.create')->middleware('auth', 'role:admin');
    Route::get('calendar-update/{slug}', CalendarUpdate::class)->name('calendar.update')->middleware('auth', 'role:admin');

    //Admin Calendar
    Route::get('publication', PublicationDashboard::class)->name('publication.dashboard')->middleware('auth', 'role:admin');
    Route::get('publication-create', PublicationCreate::class)->name('publication.create')->middleware('auth', 'role:admin');
    Route::get('publication-update/{slug}', PublicationUpdate::class)->name('publication.update')->middleware('auth', 'role:admin');

    //Admin Stand Request
    Route::get('stand-request', StandRequestDashboard::class)->name('stand-request.dashboard')->middleware('auth', 'role:admin');
    Route::get('stand-request-create', StandRequestCreate::class)->name('stand-request.create')->middleware('auth', 'role:admin');
    Route::get('stand-request-update/{slug}', StandRequestUpdate::class)->name('stand-request.update')->middleware('auth', 'role:admin');

    //Admin Stand
    Route::get('stand', StandDashboard::class)->name('stand.dashboard')->middleware('auth', 'role:admin');
    Route::get('stand-create', StandCreate::class)->name('stand.create')->middleware('auth', 'role:admin');
    Route::get('stand-update/{slug}', StandUpdate::class)->name('stand.update')->middleware('auth', 'role:admin');

    //Admin Information
    Route::get('information', InformationDashboard::class)->name('information.dashboard')->middleware('auth', 'role:admin');
    Route::get('information-create', InformationCreate::class)->name('information.create')->middleware('auth', 'role:admin');
    Route::get('information-update/{slug}', InformationUpdate::class)->name('information.update')->middleware('auth', 'role:admin');

    //Admin Fair
    Route::get('fair', FairDashboard::class)->name('fair.dashboard')->middleware('auth', 'role:admin');
    Route::get('fair-create', FairCreate::class)->name('fair.create')->middleware('auth', 'role:admin');
    Route::get('fair-update/{slug}', FairUpdate::class)->name('fair.update')->middleware('auth', 'role:admin');

    //Admin typeCompany
    Route::get('type-company', TypeCompanyDashboard::class)->name('type-company.dashboard')->middleware('auth', 'role:admin');
    Route::get('type-company-create', TypeCompanyCreate::class)->name('type-company.create')->middleware('auth', 'role:admin');
    Route::get('type-company-update/{slug}', TypeCompanyUpdate::class)->name('type-company.update')->middleware('auth', 'role:admin');

    //Admin BusinessWheel
    Route::get('business-wheel', BusinessWheelDashboard::class)->name('business-wheel.dashboard')->middleware('auth', 'role:admin');
    Route::get('business-wheel-update', BusinessWheelUpdate::class)->name('business-wheel.update')->middleware('auth', 'role:admin');

    //Admin settings
    Route::get('setting', SettingDashboard::class)->name('setting.dashboard')->middleware('auth', 'role:admin');
    Route::get('setting-update/{slug}', SettingUpdate::class)->name('setting.update')->middleware('auth', 'role:admin');

    //Admin Transaction
    Route::get('reading-report-print/{slug}', ReadingReportPrint::class)->name('reading-report.print')->middleware('auth', 'role:admin');
});


//Feria
Route::get('home', Home::class)->name('home')->middleware('auth');
Route::get('pavilion-detail/{slug}', Pavilion::class)->name('pavilion.detail');
Route::get('stand-detail/{slug}', HomeStand::class)->name('stand.detail');
Route::get('stand-request', StandRequestExternal::class)->name('stand.request');

//Route::get('stand/{slug}', Stand::class)->name('stand.detail');

Route::get('/', function () {
    return redirect()->route('login');
    //return view('welcome');
});

//Set language
Route::get('/greeting/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'es'])) {
        abort(403, "Lenguaje no disponible.");
    }
    App::setLocale($locale);
    session()->put('locale', $locale);
    //dd(session()->all());

    return redirect()->back();
    //return view('dashboard');
    //return redirect()->route('category.dashboard');
})->name('greeting.lang');


// storage-link ( OJO DESPUES DE EJECUTAR ESTA DIRECCION COMENTAR TODO ESTE CODIGO)
Route::get('storage-link', function () {
    if (file_exists(public_path('storage'))) {
        return 'The "public/storage" directory already exists.';
    }
    app('files')->link(
        storage_path('app/public'),
        public_path('storage')
    );

    return 'The "public/storage" directory has been linked';
});
