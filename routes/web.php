<?php

use App\Http\Controllers\Logic\TransactionController;
use App\Http\Controllers\Logic\BillController;
use App\Http\Controllers\Logic\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Logic\CategoryController;
use App\Http\Controllers\Logic\FoodController;
use App\Http\Controllers\Logic\IngrediantController;
use App\Http\Controllers\Logic\PlatsController;
use App\Http\Controllers\Logic\InventoryController;
use App\Http\Controllers\Logic\InvoicesController;
use App\Http\Controllers\Logic\OrderController;
use App\Http\Controllers\Logic\OrderItemController;
use App\Http\Controllers\Logic\PackController;
use App\Http\Controllers\Logic\ReportsController;
use App\Http\Controllers\Logic\RoomsController;
use App\Http\Controllers\Logic\SettingsController;
use App\Http\Controllers\Logic\TypesController;
use App\Http\Controllers\Logic\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\Logic\ChartController;
use App\Http\Controllers\PermissionsController;
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

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
Route::get('/chart',  [ChartController::class, 'stock'])->name('chart');

/* Cashier */
Route::get('/cashier', 'App\Http\Controllers\Cashier\CashierController@index');
Route::get('/cashier/getTable', 'App\Http\Controllers\Cashier\CashierController@getTables');
Route::get('/cashier/getMenuByCategory/{category_id}', 'App\Http\Controllers\Cashier\CashierController@getMenuByCategory');
Route::get('/cashier/getSaleDetailsByTable/{table_id}', 'App\Http\Controllers\Cashier\CashierController@getSaleDetailsByTable');

Route::post('/cashier/orderFood', 'App\Http\Controllers\Cashier\CashierController@orderFood');
Route::post('/cashier/confirmOrderStatus', 'App\Http\Controllers\Cashier\CashierController@confirmOrderStatus');
Route::post('/cashier/cancelOrder', 'App\Http\Controllers\Cashier\CashierController@cancelOrder');
Route::post('/cashier/deleteSaleDetail', 'App\Http\Controllers\Cashier\CashierController@deleteSaleDetail');
Route::post('/cashier/cancelSaleDetail', 'App\Http\Controllers\Cashier\CashierController@cancelSaleDetail');

Route::post('/cashier/savePayment', 'App\Http\Controllers\Cashier\CashierController@savePayment');
Route::post('/cashier/displayNote', 'App\Http\Controllers\Cashier\CashierController@displayNote');

Route::post('/cashier/increaseQuantity', 'App\Http\Controllers\Cashier\CashierController@increaseQuantity');
Route::post('/cashier/decreaseQuantity', 'App\Http\Controllers\Cashier\CashierController@decreaseQuantity');


//Printing
Route::get('/cashier/showReceipt/{saleID}', 'App\Http\Controllers\Cashier\CashierController@showReceipt');
Route::get('/cashier/showNote/{saleID}', 'App\Http\Controllers\Cashier\CashierController@showNote');
/* End Cashier */

//post
Route::get('/bill/view/{id}', [BillController::class, 'show'])
    ->name('billView');
Route::post('/foods/store', [FoodController::class, 'store'])
    ->name('FoodStore');
Route::post('/rooms/store', [RoomsController::class, 'store'])
->name('RoomStore');
Route::post('/inventory/store', [InventoryController::class, 'store'])
    ->name('InventoryStore');
Route::post('/plats/store', [PlatsController::class, 'store'])
    ->name('PlatStore');
Route::post('/packs/store', [PackController::class, 'store'])
    ->name('PackStore');
Route::get('/packs/show', [PackController::class, 'index'])
    ->name('Packs');
Route::post('/categories/store', [CategoryController::class, 'store'])
    ->name('CategoriesStore');
Route::post('/settings/create', [SettingsController::class, 'create'])
->name('SettingsStore');
Route::post('/orders/store', [OrderController::class, 'store'])
->name('OrdersStore');
Route::post('/order-item/bulk-insert', [OrderItemController::class, 'bulkInsert'])
->name('OrdersITemStore');
Route::post('/users/store', [UsersController::class, 'store'])
    ->name('UserStore');

// get
Route::post('/categories/update/{id}', [CategoryController::class, 'update'])
    ->name('CategoriesUpdate');
Route::post('/rooms/update/{id}', [RoomsController::class, 'update'])
    ->name('RoomsUpdate');
Route::post('/inventory/update/{id}', [InventoryController::class, 'update'])
    ->name('InventoryUpdate');
Route::post('/users/update/{id}', [UsersController::class, 'update'])
    ->name('UsersUpdate');


//entities controller
Route::middleware('isAdmin')->group(function () {
    Route::resource('bill', BillController::class);
});

Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware'=>'isAdmin','prefix'=>'gestion','as'=>'gestion'],function(){
        
    });
   
    Route::resource('bill', BillController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('foods', FoodController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('invoices', InvoicesController::class);
    Route::resource('ingrediants', IngrediantController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('orderItems', OrderItemController::class);
    Route::resource('plats', PlatsController::class);
    Route::resource('packs', PackController::class);
    Route::resource('reports', ReportsController::class);
    Route::resource('rooms', RoomsController::class);
    Route::resource('settings', SettingsController::class);
    Route::resource('transactions', TransactionController::class);
    Route::resource('users', UsersController::class);
});


Route::resource('roles', App\Http\Controllers\RolesController::class);
Route::resource('permissions', App\Http\Controllers\PermissionsController::class);
//Tables 
Route::resource('/tables', App\Http\Controllers\Logic\TableController::class);
Route::resource('/suppliers', App\Http\Controllers\SupplierController::class);


require __DIR__ . '/auth.php';
