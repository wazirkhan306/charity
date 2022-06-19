<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\dashboardSettingsController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\dashboardRoleController;
use App\Http\Controllers\dashboardPostController;
use App\Http\Controllers\dashboardCategoryController;
use App\Http\Controllers\dashboardmenuController;
use App\Http\Controllers\dashboardmenu_itemController;
use App\Http\Controllers\dashboardvertiserController;
use App\Http\Controllers\dashboardCauseController;
use App\Http\Controllers\dashboardEventController;
use App\Http\Controllers\dashboardmessageController;
use App\Http\Controllers\dashboardGalleryController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CauseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\messageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\dashboardProjectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\dashboardAssignProjectController;
use App\Http\Controllers\DonorController;

Auth::routes();

Route::get('/login/staff', [LoginController::class, 'showStaffLoginForm'])->name('staff.login_form');
Route::post('/staff/login', [LoginController::class, 'staffLogin'])->name('staff.login');
Route::get('/login/donor', [LoginController::class, 'showDonorLoginForm'])->name('donor.login_form');
Route::post('/login/donor', [LoginController::class, 'donorLogin'])->name('donor.login');
Route::get('/register/donor', [RegisterController::class, 'showDonorRegistrationForm'])->name('donor.register');
Route::post('/create-donor',[RegisterController::class, 'donorRegister'])->name('donor.save');

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/about', [HomeController::class,'about'])->name('about');
Route::get('/Contact', [HomeController::class,'Contact'])->name('contact');
Route::get('missing', function () {
    return view('404');
});

Route::group(['middleware' => ['auth:web,staff']], function () {
Route::resource('/admin', dashboardController::class);
Route::resource('/dashboard/staff', StaffController::class);
Route::resource('/dashboard/dashboardSettings', dashboardSettingsController::class);
Route::resource('/dashboard/dashboardUsers', AdminUserController::class);
Route::resource('/dashboard/Projects', dashboardProjectController::class);
Route::get('/dashboard/assign-project', [dashboardAssignProjectController::class, 'index'])->name('project.assign');
Route::get('/dashboard/assign-project-to-staff', [dashboardAssignProjectController::class, 'create'])->name('project.assign_staff');
Route::post('/dashboard/assign-project-save', [dashboardAssignProjectController::class, 'save'])->name('project.assign_save');
Route::resource('/dashboard/dashboardRoles', dashboardRoleController::class);
Route::resource('/dashboard/dashboardPosts', dashboardPostController::class);
Route::resource('/dashboard/dashboardCategores', dashboardCategoryController::class);
Route::resource('/dashboard/dashboardMenus', dashboardmenuController::class);
Route::resource('/dashboard/dashboardMenu-items', dashboardmenu_itemController::class);
Route::resource('/dashboard/dashboardAds', dashboardvertiserController::class);
Route::resource('/dashboard/dashboardCauses', dashboardCauseController::class);
Route::resource('/dashboard/dashboardEvents', dashboardEventController::class);
Route::resource('/dashboard/dashboardMessages', dashboardmessageController::class);
Route::resource('/dashboard/dashboardGalleres', dashboardGalleryController::class);
});

Route::resource('Causes',CauseController::class);
Route::resource('Events',EventController::class);
Route::resource('Posts',PostController::class);
Route::resource('Comments',CommentController::class);
Route::resource('Messages',messageController::class);
Route::post('paypal', [PaymentController::class,'payWithpaypal']);
Route::get('status', [PaymentController::class,'getPaymentStatus']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth:donor']], function () {
Route::get('donors', [DonorController::class,'donor'])->name('donor');
Route::get('donor-update-profile', [DonorController::class,'donorUpdateProfile'])->name('donor.profile');
Route::post('donor-update/{id}', [DonorController::class,'donorupdate'])->name('donor.update');
Route::get('project-detail/{id}',[DonorController::class,'projectDetail'])->name('project-detail');

});
