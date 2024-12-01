<?php
use App\Http\Controllers\{
	DashboardController,
	DashboardPenggunaController,
	LaundryController,
	RegisterController,
	LoginController,
	ResetPassword,
	ChangePassword,
	PembayaranController,
	PembayaranWifiController,
	PembayaranKostController,
	KostController,
	DaftarMakananController,
    KelolaDataCustomerController,
    ListrikController,
	PembayaranListrikController,
	WifiController,
	SearchFilter,
	ProfileController,
	CartController,
	OrderController,
	HistoryOrderController,
	HistoryOrderCustomerController
}; 
use Illuminate\Support\Facades\Route;



//login
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');

//Logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


// Route::group(['middleware', 'auth'], function () {
// 	// Laundry
// 	// Route::get('/laundry/{auth}', [PembayaranController::class, 'index'])->name('home_laundry')->middleware('auth');
// 	Route::get('/dashboard/{auth}', [DashboardController::class, 'admin'])->name('dashboard')->middleware('auth');
// 	Route::get('/pembayaranlaundry/{auth}', [PembayaranController::class, 'index'])->name('pembayaran');
// 	// Route::get('/ubahStatus/{id}/{status}/laundry', [PembayaranController::class, 'ubah'])->name('ubah-status-laundry');
// 	// Route::get('/tambahLaundry', [LaundryController::class, 'index'])->name('tambah.laundry');
// 	// Route::post('/tambahLaundry', [LaundryController::class, 'tambah'])->name('tambah-laundry.perform');
// 	// Route::post('/upload/{id}', [LaundryController::class, 'upload'])->name('upload-bukti');
// 	// Route::delete('/hapuslaundry/{id}', [PembayaranController::class, 'destroy'])->name('delete-laundry');
// 	Route::get('/dashboard/{auth}/category-laundry', [LaundryController::class, 'index'])->name('pages.categorylaundry');
Route::group(['middleware', 'auth'], function () {
	Route::get('/dashboard/{auth}', [DashboardController::class, 'admin'])->name('dashboard')->middleware('auth');
	Route::get('/pembayaranlaundry/{auth}', [PembayaranController::class, 'index'])->name('pembayaran');
	Route::get('/dashboard/{auth}/category-laundry', [LaundryController::class, 'index'])->name('pages.categorylaundry');
	Route::get('/dashboard/{auth}/cart-laundry', [LaundryController::class, 'cart'])->name('pages.cartlaundry');
	Route::get('/dashboard/{auth}/input-detail/{category}', [LaundryController::class, 'inputDetail'])->name('pages.inputdetail');
	Route::get('/dashboard/{auth}/history-laundry', [LaundryController::class, 'historyLaundry'])->name('pages.historylaundry');

	

	// Profile
	Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile');
	Route::put('/update-profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

	// Dashboard
	Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('home');
	Route::get('/test',[DashboardController::class, 'test']);
	Route::get('/dashboardcustomer/{auth}',[DashboardController::class, 'test2'])->middleware('auth')->name('dashboard_customer');
	Route::get('/dashboardcustomer/{auth}',[DashboardPenggunaController::class, 'dashboard'])->middleware('auth')->name('dashboard_customer');   

	// Kelola Data Customer
	Route::get('/dashboard/{auth}/kelolaDataCustomer', [KelolaDataCustomerController::class, 'index'])->name('kelola.data.customer');
	Route::delete('/hapuscustomer/{id}', [KelolaDataCustomerController::class, 'destroy'])->name('delete-customer');

	// Kelola Data Pemesanan Makanan
	Route::get('dashboard/{auth}/history-orders', [HistoryOrderController::class, 'showHistoryOrders'])->name('pages.historyorders');
	Route::get('/ubah-status/{id}/{status}', [HistoryOrderController::class, 'ubah'])->name('ubah-status-order');
	Route::delete('/hapus-order/{id}', [HistoryOrderController::class, 'destroy'])->name('hapus-order');

	// History
	Route::get('/dashboard/{auth}/order-history', [HistoryOrderCustomerController::class, 'index'])->name('order-history');

	// Cart
	Route::get('/dashboard/{auth}/cart', [CartController::class, 'index'])->name('cart')->middleware('auth');
	Route::post('/addToCart/{id}/perform', [CartController::class, 'addToCart'])->name('add-cart.perform')->middleware('auth');
	Route::delete('/hapuscart/{id}', [CartController::class, 'destroy'])->name('delete-cart');
	Route::post('/bayar', [CartController::class, 'bayar'])->name('bayar-cart');
	Route::get('/dashboard/{auth}/pembayaranmakanan', [CartController::class, 'pembayaranview']);
	Route::put('/uploadbukti/{id}/perform', [CartController::class, 'uploadbukti'])->name('upload-bukti.perform');
	Route::get('/dashboard/{auth}/terimakasih', [CartController::class, 'terimakasih'])->name('terimakasih')->middleware('auth');

	// Notifikasi
	Route::get('/dashboard/{auth}/notification', [CartController::class, 'showNotifications'])->name('notifications.index')->middleware('auth');
	Route::get('/notifications/mark-as-read/{id}', [CartController::class, 'markAsRead'])->name('notifications.markAsRead');
});