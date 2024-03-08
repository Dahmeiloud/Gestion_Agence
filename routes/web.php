<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AgenceController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CoulieController;
use App\Http\Controllers\TrajetController;
use App\Http\Controllers\BilletController;

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
//     return view('home');
// });

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group (['middleware' => ['auth', 'admin']],function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });


    //--------------------------- Agencess-----------------------//

Route::get('/agences', [AgenceController::class, 'index'])->name('agences.index');
Route::get('/agences/create', [AgenceController::class, 'create'])->name('agences.create');
Route::post('/agences', [AgenceController::class, 'store'])->name('agences.store');
Route::get('/agences/{agence}', [AgenceController::class, 'show'])->name('agences.show');
Route::get('/agences/{agence}/edit', [AgenceController::class, 'edit'])->name('agences.edit');
Route::put('/agences/{agence}', [AgenceController::class, 'update'])->name('agences.update');
Route::delete('/agences/{agence}', [AgenceController::class, 'destroy'])->name('agences.destroy');

//----------------------------- Trajet -----------------------------//

Route::get('/trajets', [TrajetController::class, 'index'])->name('trajets.index');
Route::get('/trajets/create', [TrajetController::class, 'create'])->name('trajets.create');
Route::post('/trajets', [TrajetController::class, 'store'])->name('trajets.store');
Route::get('/trajets/{trajet}', [TrajetController::class, 'show'])->name('trajets.show');
Route::get('/trajets/{trajet}/edit', [TrajetController::class, 'edit'])->name('trajets.edit');
Route::put('/trajets/{trajet}', [TrajetController::class, 'update'])->name('trajets.update');
Route::delete('/trajets/{trajet}', [TrajetController::class, 'destroy'])->name('trajets.destroy');

//...........................  Client ................................//

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

//.....................  Chauffeur ...................//

Route::get('/chauffeurs', [ChauffeurController::class, 'index'])->name('chauffeurs.index');
Route::get('/chauffeurs/create', [ChauffeurController::class, 'create'])->name('chauffeurs.create');
Route::post('/chauffeurs', [ChauffeurController::class, 'store'])->name('chauffeurs.store');
Route::get('/chauffeurs/{chauffeur}', [ChauffeurController::class, 'show'])->name('chauffeurs.show');

Route::get('/chauffeurs/{chauffeur}/edit', [ChauffeurController::class, 'edit'])->name('chauffeurs.edit');
Route::put('/chauffeurs/{chauffeur}', [ChauffeurController::class, 'update'])->name('chauffeurs.update');
Route::delete('/chauffeurs/{chauffeur}', [ChauffeurController::class, 'destroy'])->name('chauffeurs.destroy');



//................................ BUS  .....................//

Route::get('/buses', [BusController::class, 'index'])->name('buses.index');
Route::get('/buses/create', [BusController::class, 'create'])->name('buses.create');
Route::post('/buses', [BusController::class, 'store'])->name('buses.store');
Route::get('/buses/{bus}', [BusController::class, 'show'])->name('buses.show');
Route::get('/buses/{bus}/edit', [BusController::class, 'edit'])->name('buses.edit');
Route::put('/buses/{bus}', [BusController::class, 'update'])->name('buses.update');
Route::delete('/buses/{bus}', [BusController::class, 'destroy'])->name('buses.destroy');

//............................  Billets .......................//

Route::get('/billets', [BilletController::class, 'index'])->name('billets.index');
Route::get('/billets/create', [BilletController::class, 'create'])->name('billets.create');
Route::post('/billets', [BilletController::class, 'store'])->name('billets.store');
Route::get('/billets/{billet}', [BilletController::class, 'show'])->name('billets.show');
Route::get('/billets/{billet}/edit', [BilletController::class, 'edit'])->name('billets.edit');
Route::put('/billets/{billet}', [BilletController::class, 'update'])->name('billets.update');
Route::delete('/billets/{billet}', [BilletController::class, 'destroy'])->name('billets.destroy');


//........................ Coulies .........................//

Route::get('coulies', [CoulieController::class, 'index'])->name('coulies.index');
Route::get('coulies/create', [CoulieController::class, 'create'])->name('coulies.create');
Route::post('coulies', [CoulieController::class, 'store'])->name('coulies.store');
Route::get('coulies/{coulie}', [CoulieController::class, 'show'])->name('coulies.show');
Route::get('coulies/{coulie}/edit', [CoulieController::class, 'edit'])->name('coulies.edit');
Route::put('coulies/{coulie}', [CoulieController::class, 'update'])->name('coulies.update');
Route::delete('coulies/{coulie}', [CoulieController::class, 'destroy'])->name('coulies.destroy');



});

Route::get('/ ', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//............................Service ....................................//

Route::get('/services', [AgenceController::class, 'index'])->name('services.index');
Route::get('/services/create', [AgenceController::class, 'create'])->name('services.create');
Route::post('/services', [AgenceController::class, 'store'])->name('services.store');
Route::get('/services/{agence}', [AgenceController::class, 'show'])->name('services.show');
Route::get('/services/{agence}/edit', [AgenceController::class, 'edit'])->name('services.edit');
Route::put('/services/{agence}', [AgenceController::class, 'update'])->name('services.update');
Route::delete('/services/{agence}', [AgenceController::class, 'destroy'])->name('services.destroy');
