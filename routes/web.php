<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\RecipeController;
use App\Http\Controllers\PublicResepController;

Route::get('/', [PublicResepController::class, 'index'])->name('home');
Route::get('/lihat-resep/{id}', [PublicResepController::class, 'show'])->name('public.show');



// =======================
// Login Admin
// =======================
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// =======================
// Area Admin (harus login & is_admin)
// =======================
Route::middleware('is_admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [RecipeController::class, 'index'])->name('dashboard');

    // CRUD resep mancanegara
    Route::get('/resep/create', [RecipeController::class, 'create'])->name('resep.create');
    Route::post('/resep', [RecipeController::class, 'store'])->name('resep.store');
    Route::get('/resep/{id}/edit', [RecipeController::class, 'edit'])->name('resep.edit');
    Route::put('/resep/{id}', [RecipeController::class, 'update'])->name('resep.update');
    Route::delete('/resep/{id}', [RecipeController::class, 'destroy'])->name('resep.destroy');
});

// =======================
// Area User Umum (tidak perlu login)
// =======================
Route::get('/resep', [ResepController::class, 'index'])->name('resep.public.index');
Route::get('/resep/{id}', [ResepController::class, 'show'])->name('resep.public.show');
