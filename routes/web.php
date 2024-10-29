<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\VideoController;

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\VideoBannerController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\ActivityGalleryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GrafischartController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::resource('/questionnaires', QuestionnaireController::class);
Route::delete('/questionnaires/{questionnaire}', [QuestionnaireController::class, 'destroy'])->name('questionnaires.destroy');

Route::get('/questionnaires/{questionnaire}/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/questionnaires/{questionnaire}/questions', [QuestionController::class, 'store']);
Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
Route::put('/questions/{question}', [QuestionController::class, 'update']);
Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
Route::get('/questionnaires/{questionnaire}/question', [QuestionController::class, 'index'])->name('questions.index');



Route::get('/questionnaires/{id}/responses', [QuestionnaireController::class, 'showResponses'])
    ->name('questionnaires.responses');
Route::get('/questionnaires/{questionnaire}/fill', [ResponseController::class, 'create']);

Route::post('/questionnaires/{questionnaire}/responses', [ResponseController::class, 'store'])->name('responses.store');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {


    // Route::get('/questionnaires/{questionnaire}/thankyou', [QuestionnaireController::class, 'thankyou'])
    //      ->name('questionnaires.thankyou');
    // Route::resource('activity-galleries', ActivityGalleryController::class);
    // Route::resource('videos', VideoController::class);
    // Route::POST('logout', [AuthenticatedSessionController::class, 'destroy']);
    // Route::resource('users', UserController::class);

    // Route::resource('faqs', FaqController::class);
    // Route::resource('documents', DocumentController::class);

    Route::resource('import-data', GrafischartController::class);
});

Route::middleware(['auth', 'can:manage video banner'])->group(function () {
    Route::resource('video_banners', VideoBannerController::class);
});
Route::middleware(['auth', 'can:manage banner'])->group(function () {
    Route::resource('banner', BannerController::class);
});

Route::middleware(['auth', 'can:manage gallery'])->group(function () {
    Route::resource('activity-galleries', ActivityGalleryController::class);
});

Route::middleware(['auth', 'can:manage berita'])->group(function () {
    Route::resource('berita', BeritaController::class);
});

Route::middleware(['auth', 'can:manage videos'])->group(function () {
    Route::resource('videos', VideoController::class);
});

Route::middleware(['auth', 'can:manage users'])->group(function () {
    Route::resource('users', UserController::class);
});

Route::middleware(['auth', 'can:manage merchant'])->group(function () {
    Route::resource('merchant', MerchantController::class);
});

Route::middleware(['auth', 'can:manage faq'])->group(function () {
    Route::resource('faqs', FaqController::class);
});

Route::get('/kritikdansaran', [FaqController::class, 'indexkritikdansaran']);

Route::middleware(['auth', 'can:manage documents'])->group(function () {
    Route::resource('documents', DocumentController::class);
});

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/index2', [FrontController::class, 'index2'])->name('home2');
Route::get('/kajian', [FrontController::class, 'kajian'])->name('kajian');
Route::get('/petasebaran', [FrontController::class, 'petasebaran'])->name('petasebaran');
Route::get('/bantuan', [FrontController::class, 'bantuan'])->name('bantuan');
Route::get('/infografis', [FrontController::class, 'infografis'])->name('infografis');
Route::get('/profile', [FrontController::class, 'profile'])->name('profile');
Route::get('/questionnaires/{questionnaire}/thankyou', [QuestionnaireController::class, 'thankyou'])
    ->name('questionnaires.thankyou');
Route::post('/questionnaires/{questionnaire}/responses', [ResponseController::class, 'store'])->name('responses.store');
// Route::get('/questionnaires/{questionnaire}/responses', [QuestionnaireController::class, 'responses'])
//     ->name('questionnaires.responses');
Route::post('/kritikdansaran', [FrontController::class, 'kritikdansaran']);
Route::post('/setratingus', [FrontController::class, 'setratingus']);
Route::get('/getkoordinatpdam', [FrontController::class, 'getkoordinatpdam']);
Route::get('/getkoordinatkawankumuh', [FrontController::class, 'getkoordinatkawankumuh']);
Route::get('/getkoordinattransport', [FrontController::class, 'getkoordinattransport']);
Route::get('/getkoordinatirigasi', [FrontController::class, 'getkoordinatirigasi']);
Route::get('/getkoordinattaklayakhuni', [FrontController::class, 'getkoordinattaklayakhuni']);


Route::get('/responses/{id}', [ResponseController::class, 'show'])->name('responses.show');
Route::get('chart', function () {
    return view('chart.chart');
});





require __DIR__ . '/auth.php';
