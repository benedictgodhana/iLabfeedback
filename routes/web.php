<?php

use App\Exports\UsersExport;
use App\Http\Controllers\ActivationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DataImportController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GuestBookingController;
use App\Http\Controllers\MiniAdminController;
use App\Http\Controllers\ResetController;
use App\Models\Appointment;
use App\Models\Room;
use App\Models\User;

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

Route::get('/', function () {
   
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'loadRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', function () {
    return redirect('/');
});
Route::get('/login', [AuthController::class, 'loadLogin'])->name('LoginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/login/validate', [AuthController::class, 'validateLogin'])->name('login.validate');





// ********** Super Admin Routes *********
Route::group(['prefix' => 'super-admin', 'middleware' => ['web', 'isSuperAdmin','no.cache']], function () {
    Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('sdashboard');

    Route::get('/users', [SuperAdminController::class, 'users'])->name('superAdminUsers');
    Route::get('/doctors', [SuperAdminController::class, 'doctors'])->name('superAdminDoctors');
    Route::get('/department', [SuperAdminController::class, 'Department'])->name('superAdminDepartment');
    Route::get('/items', [SuperAdminController::class, 'items'])->name('superAdminItems');
    Route::post('/Items', [SuperAdminController::class, 'storeItems'])->name('superAdminAddItems');
    Route::get('/manage-role', [SuperAdminController::class, 'manageRole'])->name('manageRole');
    Route::post('/update-role', [SuperAdminController::class, 'updateRole'])->name('updateRole');
    Route::get('/reservation', [SuperAdminController::class, 'reservation'])->name('sadminreservation');
    Route::get('/reservationstatus', [SuperAdminController::class, 'changeStatus'])->name('changeStatus');
    Route::post('/users', [SuperAdminController::class, 'store'])->name('users.store');
    Route::post('/doctors/store', [SuperAdminController::class, 'StoreDoctor'])->name('doctors.store');
    Route::post('/superadmin/create-reservation', [SuperAdminController::class, 'createReservation'])->name('superadmin.createReservation'); // You can name the route as you prefer
    Route::get('/activities', [SuperAdminController::class, 'showActivities'])->name('superadminactivities');
    Route::get('/profile', [SuperAdminController::class, 'showProfile'])->name('superadmin.profile.show');
    Route::post('/profile/update-password', [SuperAdminController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::get('/search-reservations', [SuperAdminController::class,'searchReservations'])->name('superadmin.searchReservations');
    Route::get('/generate-pdf', [SuperAdminController::class, 'generatePDF'])->name('generate-pdf');
    Route::delete('/items/{item}', [SuperAdminController::class, 'deleteItem'])->name('superAdminDeleteItem');
    Route::put('/items/{id}', [SuperAdminController::class, 'updateItem'])->name('superAdminUpdateItem');
    Route::post('/departments', [SuperAdminController::class,'storeDepartment'])->name('departments.store');
    Route::put('/departments/{department}', [SuperAdminController::class, 'updateDepartment'])->name('departments.update');
    Route::delete('/departments/{department}', [SuperAdminController::class, 'destroy'])->name('departments.destroy');
    Route::get('/rooms', [SuperAdminController::class, 'rooms'])->name('superAdminRooms');
    Route::post('/rooms', [SuperAdminController::class,'storeRoom'])->name('rooms.store');
    Route::put('/rooms/{room}/edit', [SuperAdminController::class,'updateRoom'])->name('rooms.update');
    Route::delete('/rooms/{room}', [SuperAdminController::class,'Roomdestroy'])->name('rooms.destroy');
    Route::post('/categories', [SuperAdminController::class,'Categorystore'])->name('categories.store');
    Route::get('/sadmincategories', [SuperAdminController::class, 'feedbackcategories'])->name('sadmincategories');
    Route::post('/users/store', [SuperAdminController::class, 'storeUSers'])->name('store.users');
    Route::put('/users/{userId}', [SuperAdminController::class, 'editUser'])->name('users.update');
    Route::put('/categories/{category}', [SuperAdminController::class, 'updateUser'])->name('categories.update');


    





    // web.php

    Route::patch('/admin/reservation/update/{id}', [SuperAdminController::class, 'updateReservationStatus'])
        ->name('superadmin.updateReservationStatus');
});

// ********** Sub Admin Routes *********
Route::group(['prefix' => 'sub-admin', 'middleware' => ['web', 'isSubAdmin','no.cache']], function () {
    Route::get('/dashboard', [SubAdminController::class, 'dashboard'])->name('subdashboard');
    Route::get('/resevation', [SubAdminController::class, 'reservation'])->name('subadminreservation');
    Route::put('/subadmin/reservation/update/{id}', [SubAdminController::class, 'updateReservationStatus'])->name('subadmin.update');
    Route::get('/profile', [SubAdminController::class, 'showProfile'])->name('subadmin.profile.show');
    Route::get('/search-reservations', [SubAdminController::class,'searchReservations'])->name('subadmin.searchReservations');
    Route::post('/subadmin/create-reservation', [SubAdminController::class, 'createReservation'])->name('subadmin.createReservation'); // You can name the route as you prefer
    Route::post('/profile/update-password', [SubAdminController::class, 'updatePassword'])->name('updateprofilePassword');


});

// ********** Admin Routes *********
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'isAdmin','no.cache']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admindashboard');
    Route::get('/reservation', [AdminController::class, 'reservation'])->name('adminreservation');
    Route::patch('/admin/reservation/update/{id}', [AdminController::class, 'updateReservationStatus'])->name('admin.update');
    Route::get('/profile', [AdminController::class, 'showProfile'])->name('admin.profile.show');
    Route::get('/search-reservations', [AdminController::class,'searchReservations'])->name('admin.searchReservations');
    Route::post('/profile/update-password', [AdminController::class, 'updatePassword'])->name('Adminprofile');
    Route::post('/admin/create-reservation', [AdminController::class, 'createReservation'])->name('create.reservation'); 


});
Route::middleware(['auth', 'miniadmin','no.cache'])->group(function () {
    Route::get('/miniadmin/dashboard', [MiniAdminController::class, 'dashboard'])->name('minidashboard');
    Route::get('/miniadmin/reservation', [MiniAdminController::class, 'reservation'])->name('miniadminreservation');
    Route::put('/miniadmin/reservation/update/{id}', [MiniAdminController::class, 'updateReservationStatus'])->name('miniadmin.update');
    Route::get('/miniadmin/profile', [MiniAdminController::class, 'showProfile'])->name('miniadmin.profile.show');
    Route::post('/miniadmin/profile/update-password', [MiniAdminController::class, 'updatePassword'])->name('Edit.Password');
    Route::get('/search-reservations', [MiniAdminController::class,'searchReservations'])->name('miniadmin.searchReservations');
    Route::post('/miniadmin/create-reservation', [AdminController::class, 'createReservation'])->name('minicreate.reservation'); 







    // Routes accessible only to authenticated users with the MiniAdmin role
    // Define your MiniAdmin-specific routes here
});

// ********** User Routes *********
Route::group(['middleware' => ['web', 'isUser', 'verified']], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('userdashboard');
    Route::get('/booking', [UserController::class, 'booking'])->name('booking');
    Route::get('/reservation', [UserController::class, 'reservation'])->name('reservation');
    Route::resource('appointments', BookingController::class);
    Route::get('/profile', [UserController::class, 'showProfile'])->name('user.profile.show');
    Route::post('/profile/update-password', [UserController::class, 'updatePassword'])->name('updatePassword');

});
Route::get('/get-bookings', [BookingController::class, 'getBookings']);

Route::get('/login/google', [AuthController::class, 'redirectToGoogle']);
Route::get('/callback-url', [AuthController::class, 'googleCallback']);
Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('/activate-account', [AuthController::class, 'showActivationPage'])->name('account.activate');

// Route to handle the activation request
Route::post('/account/activate', [AuthController::class, 'activate'])
    ->name('account');
Route::get('/reservation-ended/{reservationId}', [UserController::class, 'reservationEnded'])->name('reservation.ended');


Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Handle the Password Reset Request Submission
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');

Route::get('activate/{token}', [ActivationController::class, 'activateAccount'])->name('activate.account');
// routes/web.php

Route::post('/import-data', [DataImportController::class, 'import'])->name('import.data');
Route::get('/export-users', function () {
    return Excel::download(new UsersExport, 'users.xlsx');
});

Route::view('/activation-success', 'activation_success')->name('activation.success');
// Activation Route
Route::post('/users/activate/{user}', [UserController::class, 'activateUser'])->name('user.activate');

// Deactivation Route
Route::post('/deactivate-user/{user}', [UserController::class, 'deactivateUser'])->name('deactivate.user');

Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.updateProfile');


// routes/web.php
Route::get('/guest-booking', [GuestBookingController::class, 'showForm'])->name('guest.booking.form');
// routes/web.php
Route::post('/guest-booking', [GuestBookingController::class, 'submitBooking'])->name('guest.booking.submit');
Route::get('/guest/thankyou', [GuestBookingController::class, 'thankYou'])->name('guest.thankyou');



Route::get('/change-password', [AuthController::class, 'changePasswordForm'])->name('change-password');
Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change-password.post');
Route::get('/activate/{user}/{token}', [AuthController::class, 'activateAccount'])->name('activate');

Route::post('/send-reservation-email', [ReservationController::class, 'sendEmail']);
Route::post('/filter-reservations', [ReservationController::class,'filterReservations'])->name('filter');
Route::delete('/reservations/{id}/cancel',[ReservationController::class,'cancelReservation'])->name('cancelReservation');
Route::get('/user/searchReservations', [UserController::class,'searchReservations'])->name('user.searchReservations');





Route::post('/account/check-activation', [UserController::class, 'checkActivation'])->name('account.check-activation');
Route::post('/password/change', [UserController::class, 'changePassword'])->name('password.change'); // Implement this method in UserController
Route::get('/filter/pending-reservations', [ReservationController::class,'filter'])->name('filter.pendingReservations');
Route::put('/reservations/{id}', [ReservationController::class,'updateReservation'])->name('updateReservation');

Route::get('/user-guide-pdf', [UserController::class, 'generateUserGuidePdf'])->name('user-guide-pdf');
Route::get('custom-reset', [ResetController::class, 'showResetForm'])->name('custom-reset');
Route::post('/update-password', [ResetController::class, 'updatePassword'])->name('update-password');
// In your routes/web.php or routes/api.php

Route::get('/feedback/categories-data', [FeedbackController::class, 'getFeedbackCategoriesData']);
Route::put('/reservations/{id}/update-status', [FeedbackController::class, 'updateStatus'])->name('update.status');
