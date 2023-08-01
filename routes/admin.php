
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlanesController;


Route::view('/dashboard', 'admin.dashboard');


Route::prefix('brands')->group(function(){
    Route::get('/',[BrandsController::class , 'all'])->name('brand-list');
    Route::get('/add',[BrandsController::class,'addNew'])->name('brand-add')->middleware('auth');
    Route::post('/add',[BrandsController::class,'saveNew']);
    Route::get('/edit/{id}',[BrandsController::class,'edit'])->name('brand-edit');
    Route::post('/edit/{id}',[BrandsController::class,'saveEdit']);
    Route::get('/delete/{id}',[BrandsController::class,'delete'])->name('brand-delete');

});

Route::prefix('planes')->group(function(){
    Route::get('/',[PlanesController::class , 'all'])->name('plane-list');
    Route::get('/add',[PlanesController::class,'addNew'])->name('plane-add');
    Route::post('/add',[PlanesController::class,'saveNew']);
    Route::get('/edit/{id}',[PlanesController::class,'edit'])->name('plane-edit');
    Route::post('/edit/{id}',[PlanesController::class,'saveEdit']);
    Route::get('/delete/{id}',[PlanesController::class,'delete'])->name('plane-delete');
});

Route::get('/login',[LoginController::class , 'viewLogin'])->name('login');
Route::post('/login',[LoginController::class, 'login']);
Route::get('/signup', [LoginController::class, 'viewSignup'])->name('signup');
Route::post('/signup',[LoginController::class, 'signup']);
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');




?>
