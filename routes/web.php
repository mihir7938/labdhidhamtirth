<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/donor', [PageController::class, 'donor'])->name('donor');
Route::get('/donor/{id}', [PageController::class, 'getDonor'])->name('get.donor');
Route::get('/room', [PageController::class, 'room'])->name('room');
Route::get('/room/searchRooms', [PageController::class, 'searchRooms'])->name('search-rooms');
Route::get('/amenities', [PageController::class, 'amenities'])->name('amenities');
Route::post('/room/bookingRooms', [PageController::class, 'bookingRooms'])->name('booking-rooms');
Route::get('/booking', [PageController::class, 'booking'])->name('booking');
Route::post('/update-room', [PageController::class, 'updateRoomDetails'])->name('booking.room.update');
Route::post('/booking', [PageController::class, 'saveBooking'])->name('booking.save');
Route::get('/summary', [PageController::class, 'bookingSummary'])->name('booking.summary');
Route::post('/booking/paynow', [PageController::class, 'paynow'])->name('booking.paynow');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/gallery/album/{id}', [PageController::class, 'getAlbum'])->name('gallery.album');
Route::get('/room-gallery', [PageController::class, 'roomGallery'])->name('room.gallery');
Route::get('/room-gallery/album/{id}', [PageController::class, 'getRoomAlbum'])->name('room.gallery.album');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'saveContact'])->name('save.contact');
Route::get('/news/{id}', [PageController::class, 'getSingleNews'])->name('get.news');
Route::get('/setSession', [PageController::class, 'setSession'])->name('set_session');

Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('authenticate');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
    Route::get('/register', [UserController::class, 'getRegister'])->name('register');
    Route::post('/register', [UserController::class, 'register'])->name('create');
});

Route::group(['prefix' => 'password'], function () {
    Route::get('/forget', [AuthController::class, 'forgetPassword'])->name('forget_password');
    Route::post('/reset', [AuthController::class, 'resetPassword'])->name('check_password_reset');
    Route::get('/reset/{token}', [AuthController::class, 'getChangePassword'])->name('reset_password_link');
    Route::post('/reset/new/{token}', [AuthController::class, 'postChangePassword'])->name('change_password');
});

Route::group(['prefix' => 'users', 'middleware' => 'user'], function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('user.profile.edit');
    Route::post('/edit-profile', [UserController::class, 'saveProfile'])->name('user.profile.save');
    Route::post('/change-password', [UserController::class, 'changePassword'])->name('user.password.change');
    Route::get('/bookings', [UserController::class, 'bookings'])->name('user.bookings');
    Route::get('/booking/{id}', [UserController::class, 'viewBooking'])->name('user.booking.view');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/booking/{id}', [AdminController::class, 'viewBooking'])->name('admin.booking.view');
    Route::get('/news', [AdminController::class, 'getNews'])->name('admin.news');
    Route::get('/news/add', [AdminController::class, 'addNews'])->name('admin.news.add');
    Route::post('/news/save', [AdminController::class, 'saveNews'])->name('admin.news.add.save');
    Route::get('/news/edit/{id}', [AdminController::class, 'editNews'])->name('admin.news.edit');
    Route::post('/news/update', [AdminController::class, 'updateNews'])->name('admin.news.update.save');
    Route::get('/news/delete/{id}', [AdminController::class, 'deleteNews'])->name('admin.news.delete');
    Route::get('/donors', [AdminController::class, 'getDonors'])->name('admin.donors');
    Route::get('/donors/add', [AdminController::class, 'addDonors'])->name('admin.donors.add');
    Route::post('/donors/save', [AdminController::class, 'saveDonors'])->name('admin.donors.add.save');
    Route::get('/donors/edit/{id}', [AdminController::class, 'editDonor'])->name('admin.donors.edit');
    Route::post('/donors/update', [AdminController::class, 'updateDonor'])->name('admin.donors.update.save');
    Route::get('/donors/delete/{id}', [AdminController::class, 'deleteDonor'])->name('admin.donors.delete');
    Route::get('/donors/categories', [AdminController::class, 'getDonorCategories'])->name('admin.donors.categories');
    Route::get('/donors/add-category', [AdminController::class, 'addDonorCategory'])->name('admin.donors.addcategory');
    Route::post('/donors/save-category', [AdminController::class, 'saveDonorCategory'])->name('admin.donors.addcategory.save');
    Route::get('/donors/edit-category/{id}', [AdminController::class, 'editDonorCategory'])->name('admin.donors.editcategory');
    Route::post('/donors/update-category', [AdminController::class, 'updateDonorCategory'])->name('admin.donors.updatecategory.save');
    Route::get('/donors/delete-category/{id}', [AdminController::class, 'deleteDonorCategory'])->name('admin.donors.deletecategory');
    Route::get('/room_photos', [AdminController::class, 'getRoomPhotos'])->name('admin.room.photos');
    Route::get('/room_photos/add', [AdminController::class, 'addRoomPhotos'])->name('admin.room.photos.add');
    Route::post('/room_photos/save', [AdminController::class, 'saveRoomPhotos'])->name('admin.room.photos.add.save');
    Route::get('/room_photos/edit/{id}', [AdminController::class, 'editRoomPhotos'])->name('admin.room.photos.edit');
    Route::post('/room_photos/update', [AdminController::class, 'updateRoomPhotos'])->name('admin.room.photos.update.save');
    Route::get('/room_photos/delete/{id}', [AdminController::class, 'deleteRoomPhotos'])->name('admin.room.photos.delete');
    Route::get('/room_photos/add-bulk', [AdminController::class, 'addBulkRoomPhotos'])->name('admin.room.photos.addbulk');
    Route::post('/room_photos/save-bulk', [AdminController::class, 'saveBulkRoomPhotos'])->name('admin.room.photos.addbulk.save');
    Route::get('/room_photos/categories', [AdminController::class, 'getRoomPhotoCategories'])->name('admin.room.photos.categories');
    Route::get('/room_photos/add-category', [AdminController::class, 'addRoomPhotoCategory'])->name('admin.room.photos.addcategory');
    Route::post('/room_photos/save-category', [AdminController::class, 'saveRoomPhotoCategory'])->name('admin.room.photos.addcategory.save');
    Route::get('/room_photos/edit-category/{id}', [AdminController::class, 'editRoomPhotoCategory'])->name('admin.room.photos.editcategory');
    Route::post('/room_photos/update-category', [AdminController::class, 'updateRoomPhotoCategory'])->name('admin.room.photos.updatecategory.save');
    Route::get('/room_photos/delete-category/{id}', [AdminController::class, 'deleteRoomPhotoCategory'])->name('admin.room.photos.deletecategory');
    Route::get('/albums', [AdminController::class, 'getAlbums'])->name('admin.albums');
    Route::get('/albums/add', [AdminController::class, 'addAlbum'])->name('admin.albums.add');
    Route::post('/albums/save', [AdminController::class, 'saveAlbum'])->name('admin.albums.add.save');
    Route::get('/albums/edit/{id}', [AdminController::class, 'editAlbum'])->name('admin.albums.edit');
    Route::post('/albums/update', [AdminController::class, 'updateAlbum'])->name('admin.albums.update.save');
    Route::get('/albums/delete/{id}', [AdminController::class, 'deleteAlbum'])->name('admin.albums.delete');
    Route::get('/photos', [AdminController::class, 'getPhotos'])->name('admin.photos');
    Route::get('/photos/add', [AdminController::class, 'addPhoto'])->name('admin.photos.add');
    Route::post('/photos/save', [AdminController::class, 'savePhoto'])->name('admin.photos.add.save');
    Route::get('/photos/edit/{id}', [AdminController::class, 'editPhoto'])->name('admin.photos.edit');
    Route::post('/photos/update', [AdminController::class, 'updatePhoto'])->name('admin.photos.update.save');
    Route::get('/photos/delete/{id}', [AdminController::class, 'deletePhoto'])->name('admin.photos.delete');
    Route::get('/packages', [AdminController::class, 'getPackages'])->name('admin.packages');
    Route::get('/packages/add', [AdminController::class, 'addPackage'])->name('admin.packages.add');
    Route::post('/packages/save', [AdminController::class, 'savePackage'])->name('admin.packages.add.save');
    Route::get('/packages/edit/{id}', [AdminController::class, 'editPackage'])->name('admin.packages.edit');
    Route::post('/packages/update', [AdminController::class, 'updatePackage'])->name('admin.packages.update.save');
    Route::get('/packages/delete/{id}', [AdminController::class, 'deletePackage'])->name('admin.packages.delete');
    Route::get('/events', [AdminController::class, 'getEvents'])->name('admin.events');
    Route::get('/events/add', [AdminController::class, 'addEvent'])->name('admin.events.add');
    Route::post('/events/save', [AdminController::class, 'saveEvent'])->name('admin.events.add.save');
    Route::get('/events/edit/{id}', [AdminController::class, 'editEvent'])->name('admin.events.edit');
    Route::post('/events/update', [AdminController::class, 'updateEvent'])->name('admin.events.update.save');
    Route::get('/events/delete/{id}', [AdminController::class, 'deleteEvent'])->name('admin.events.delete');
    Route::get('/amenities', [AdminController::class, 'getAmenities'])->name('admin.amenities');
    Route::get('/amenities/add', [AdminController::class, 'addAmenity'])->name('admin.amenities.add');
    Route::post('/amenities/save', [AdminController::class, 'saveAmenity'])->name('admin.amenities.add.save');
    Route::get('/amenities/edit/{id}', [AdminController::class, 'editAmenity'])->name('admin.amenities.edit');
    Route::post('/amenities/update', [AdminController::class, 'updateAmenity'])->name('admin.amenities.update.save');
    Route::get('/amenities/delete/{id}', [AdminController::class, 'deleteAmenity'])->name('admin.amenities.delete');
});