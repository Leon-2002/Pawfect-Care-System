<?php

use App\Http\Controllers\PersonalBooking;
use App\Models\User;
use App\Http\Controllers\ProfileUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EmployeeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    
    return view('homepage.index');
});

Route::get('/about', function () {
    return view('homepage.about');
});

Route::get('/service', function () {
    return view('homepage.service');
});








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    // service info
Route::get('/profile/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/profile/store', [ServiceController::class, 'store'])->name('services.store');
 Route::get('/profile/edit', [ServiceController::class, 'edit'])->name('services.edits');
Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
});

require __DIR__.'/auth.php';

// admin dashboard
Route::middleware(['auth', 'role:admin'])->group(function(){
Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

// user controller
Route::resource('users', UserController::class);
Route::get('/admin/dashboard', [UserController::class, 'index'])->name('users.index');
Route::get('/admin/dashboard/show', [UserController::class, 'show'])->name('users.show');
Route::get('/admin/dashboard/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/admin/dashboard/update/{user}', [UserController::class, 'update'])->name('users.update');
// Route::delete('/admin/dashboard/delete/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::delete('/admin/dashboard/delete/{user}', function($id){
    $user = User::findOrFail($id);
    $user->delete();
    return redirect('/admin/dashboard');
});
});


// employee dashboard
Route::middleware(['auth', 'role:employee'])->group(function(){
    Route::get('/employee/dashboard', [EmployeeController::class, 'EmployeeDashboard'])->name('employee.dashboard');
    Route::get('/employee/customer', [BookingController::class, 'viewBookings'])->name('employee.customer');

    //accept or reject client
    // View booking details
Route::get('/employee/bookings/{bookingId}', [BookingController::class, 'show'])->name('booking.show');
// Employee actions (accept or reject)
Route::post('/employee/bookings/{bookingId}/accept', [BookingController::class, 'acceptBooking'])->name('accept.booking');
Route::post('/employee/bookings/{bookingId}/reject', [BookingController::class, 'rejectBooking'])->name('reject.booking');


Route::get('/employee/client', [BookingController::class, 'ShowClient'])->name('user.service');

// to finish the transaction
Route::post('/booking/{bookingId}/complete', [BookingController::class, 'complete'])->name('complete.booking');
Route::post('/booking/{bookingId}/cancel', [BookingController::class, 'cancel'])->name('cancel.booking');

});


//user Dashboard
Route::middleware(['auth', 'role:user'])->group(function(){
    Route::get('/dashboard', function () {

        if (auth()->user()->region == '') {
            notify()->warning('Please update your Profile', 'Update your Profile');
            return view('user.dashboard');
        }
        else{
            return view('user.dashboard');
        }
    });
     Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
   
    //  Route::get('/user/service', function () {
    //     return view('user.service');
    // });

    Route::get('/user/service', [BookingController::class, 'showAcceptedBookings'])->name('user.service');

    Route::get('/user/service/profile', function () {
        return view('user.service_profile');
    });


    Route::get('/user/service/booking', function () {
        return view('user.book');
    });

   
    // booking
    //  Route::get('/user/bookings/service/profile', function () {
    //      return view('user.service_profile');
    //  });

    
    Route::get('/user/bookings/service/profile/{worker}', [BookingController::class, 'profile'])->name('worker.profile');

    Route::get('/user/bookings', function () {
        return view('user.book');
    });

    Route::get('/user/bookings/service', function () {
        return view('user.service');
    });
    // Booking service
    Route::post('/user/bookings/create', [BookingController::class, 'create'])->name('create-booking');
    Route::post('user/booking/{bookingId}/cancel', [BookingController::class, 'Usercancel'])->name('cancel.user');
    // Route::get('/user/bookings/select-worker/{BookingID}', [BookingController::class, 'selectWorker'])->name('select-worker');
    // Route::post('/user/bookings/confirm', [BookingController::class, 'confirmBooking'])->name('confirm-booking');

    // pay Booking
    // routes/web.php

    Route::post('/pay-booking/{bookingId}', [BookingController::class, 'payBooking'])->name('pay.booking');

    //recent activity dahboard

Route::get('/user/recent-Activity', [UserController::class, 'UserActivity'])->name('user.activity');
    
Route::post('/user/recent-Activity/review', [BookingController::class, 'reviewstore'])->name('review.store');

Route::get('/service-providers/{id}', [EmployeeController::class, 'showProfile'])->name('service-provider.profile');


    // Personal Booking
    Route::get('/user/personalBooking', [PersonalBooking::class, 'getRandomEmployees'])->name('employee.list');
    Route::post('/user/personalBooking/request', [PersonalBooking::class, 'submitBooking'])->name('booking.request');

    // search bar in personal booking

    Route::get('/employee/search', [PersonalBooking::class, 'search'])->name('employee.search');

});






//function for logout

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');