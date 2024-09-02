<?php

use App\Http\Controllers\AwardsController;
use App\Http\Controllers\CertifContoller;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CountController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\ExpController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CertifController;
use App\Models\Awards;
use App\Models\Education;

Route::get('user/dashboard', [HomeController::class, 'indexUser'])->middleware(['auth', 'user']);
//Profile
Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('admin/profiles', [ProfController::class, 'index'])->name('profiles.index')->middleware(['auth', 'admin']);
Route::get('admin/profiles/create', [ProfController::class, 'create'])->name('profiles.create')->middleware(['auth', 'admin']);
Route::post('admin/profiles/store', [ProfController::class, 'store'])->name('profiles.store')->middleware(['auth', 'admin']);
Route::get('admin/profiles/edit/{id}', [ProfController::class, 'edit'])->name('profiles.edit')->middleware(['auth', 'admin']);
Route::put('admin/profiles/edit/{id}', [ProfController::class, 'update'])->name('profiles.update')->middleware(['auth', 'admin']);
Route::get('admin/profiles/recycle', [ProfController::class, 'recycle'])->name('profiles.recycle')->middleware(['auth', 'admin']);
Route::get('admin/profiles/restore/{id}', [ProfController::class, 'restore'])->name('profiles.restore')->middleware(['auth', 'admin']);
Route::delete('admin/profiles/softdelete/{id}', [ProfController::class, 'softdelete'])->name('profiles.softdelete')->middleware(['auth', 'admin']);
Route::delete('admin/destroy/{id}', [ProfController::class, 'destroy'])->name('profiles.destroy');
Route::get('profile/generate-pdf/{id}', [ProfController::class, 'show'])->name('generate-pdf');

// Experience
Route::get('admin/experience', [ExpController::class, 'index'])->name('experience.index')->middleware(['auth', 'admin']);
Route::get('admin/experience/create', [ExpController::class, 'create'])->name('experience.create')->middleware(['auth', 'admin']);
Route::post('admin/experience/store', [ExpController::class, 'store'])->name('experience.store')->middleware(['auth', 'admin']);
Route::get('admin/experience/edit/{id}', [ExpController::class, 'edit'])->name('experience.edit')->middleware(['auth', 'admin']);
Route::put('admin/experience/edit/{id}', [ExpController::class, 'update'])->name('experience.update')->middleware(['auth', 'admin']);
Route::get('admin/experience/recycle', [ExpController::class, 'recycle'])->name('experience.recycle')->middleware(['auth', 'admin']);
Route::get('admin/profiles/restore/{id}', [ExpController::class, 'restore'])->name('experience.restore')->middleware(['auth', 'admin']);
Route::delete('admin/experience/softdelete/{id}', [ExpController::class, 'softdelete'])->name('experience.softdelete')->middleware(['auth', 'admin']);
Route::delete('admin/destroy/{id}', [ExpController::class, 'destroy'])->name('experience.destroy');

// Education
Route::get('admin/education', [EducationController::class, 'index'])->name('education.index')->middleware(['auth', 'admin']);
Route::get('admin/education/create', [EducationController::class, 'create'])->name('education.create')->middleware(['auth', 'admin']);
Route::post('admin/education/store', [EducationController::class, 'store'])->name('education.store')->middleware(['auth', 'admin']);
Route::get('admin/education/edit/{id}', [EducationController::class, 'edit'])->name('education.edit')->middleware(['auth', 'admin']);
Route::put('admin/education/edit/{id}', [EducationController::class, 'update'])->name('education.update')->middleware(['auth', 'admin']);
Route::get('admin/education/recycle', [EducationController::class, 'recycle'])->name('education.recycle')->middleware(['auth', 'admin']);
Route::get('admin/profiles/restore/{id}', [EducationController::class, 'restore'])->name('education.restore')->middleware(['auth', 'admin']);
Route::delete('admin/education/softdelete/{id}', [EducationController::class, 'softdelete'])->name('education.softdelete')->middleware(['auth', 'admin']);
Route::delete('admin/destroy/{id}', [EducationController::class, 'destroy'])->name('education.destroy');

// Skill
Route::get('admin/skill', [SkillController::class, 'index'])->name('skill.index')->middleware(['auth', 'admin']);
Route::get('admin/skill/create', [SkillController::class, 'create'])->name('skill.create')->middleware(['auth', 'admin']);
Route::post('admin/skill/store', [SkillController::class, 'store'])->name('skill.store')->middleware(['auth', 'admin']);
Route::get('admin/skill/edit/{id}', [SkillController::class, 'edit'])->name('skill.edit')->middleware(['auth', 'admin']);
Route::put('admin/skill/edit/{id}', [SkillController::class, 'update'])->name('skill.update')->middleware(['auth', 'admin']);
Route::get('admin/skill/recycle', [SkillController::class, 'recycle'])->name('skill.recycle')->middleware(['auth', 'admin']);
Route::get('admin/profiles/restore/{id}', [SkillController::class, 'restore'])->name('skill.restore')->middleware(['auth', 'admin']);
Route::delete('admin/skill/softdelete/{id}', [SkillController::class, 'softdelete'])->name('skill.softdelete')->middleware(['auth', 'admin']);
Route::delete('admin/destroy/{id}', [SkillController::class, 'destroy'])->name('skill.destroy');

// Language
Route::get('admin/language', [LanguageController::class, 'index'])->name('language.index')->middleware(['auth', 'admin']);
Route::post('admin/language/store', [LanguageController::class, 'store'])->name('language.store')->middleware(['auth', 'admin']);
Route::get('admin/language/edit/{id}', [LanguageController::class, 'edit'])->name('language.edit')->middleware(['auth', 'admin']);
Route::put('admin/language/edit/{id}', [LanguageController::class, 'update'])->name('language.update')->middleware(['auth', 'admin']);
Route::get('admin/language/recycle', [LanguageController::class, 'recycle'])->name('language.recycle')->middleware(['auth', 'admin']);
Route::get('admin/language/create', [LanguageController::class, 'create'])->name('language.create')->middleware(['auth', 'admin']);
Route::get('admin/language/restore/{id}', [LanguageController::class, 'restore'])->name('language.restore')->middleware(['auth', 'admin']);
Route::delete('admin/language/softdelete/{id}', [LanguageController::class, 'softdelete'])->name('language.softdelete')->middleware(['auth', 'admin']);
Route::delete('admin/destroy/{id}', [LanguageController::class, 'destroy'])->name('language.destroy');

// Certificate
Route::get('admin/certificate', [CertifController::class, 'index'])->name('certificate.index')->middleware(['auth', 'admin']);
Route::post('admin/certificate/store', [CertifController::class, 'store'])->name('certificate.store')->middleware(['auth', 'admin']);
Route::get('admin/certificate/edit/{id}', [CertifController::class, 'edit'])->name('certificate.edit')->middleware(['auth', 'admin']);
Route::put('admin/certificate/edit/{id}', [CertifController::class, 'update'])->name('certificate.update')->middleware(['auth', 'admin']);
Route::get('admin/certificate/recycle', [CertifController::class, 'recycle'])->name('certificate.recycle')->middleware(['auth', 'admin']);
Route::get('admin/certificate/create', [CertifController::class, 'create'])->name('certificate.create')->middleware(['auth', 'admin']);
Route::get('admin/certificate/restore/{id}', [CertifController::class, 'restore'])->name('certificate.restore')->middleware(['auth', 'admin']);
Route::delete('admin/certificate/softdelete/{id}', [CertifController::class, 'softdelete'])->name('certificate.softdelete')->middleware(['auth', 'admin']);
Route::delete('admin/destroy/{id}', [CertifController::class, 'destroy'])->name('certificate.destroy');
Route::get('certificate/generate-pdf/{id}', [CertifController::class, 'show'])->name('generate-pdf');

// Penghargaan
Route::get('admin/awards', [AwardsController::class, 'index'])->name('awards.index')->middleware(['auth', 'admin']);
Route::post('admin/awards/store', [AwardsController::class, 'store'])->name('awards.store')->middleware(['auth', 'admin']);
Route::get('admin/awards/edit/{id}', [AwardsController::class, 'edit'])->name('awards.edit')->middleware(['auth', 'admin']);
Route::put('admin/awards/edit/{id}', [AwardsController::class, 'update'])->name('awards.update')->middleware(['auth', 'admin']);
Route::get('admin/awards/recycle', [AwardsController::class, 'recycle'])->name('awards.recycle')->middleware(['auth', 'admin']);
Route::get('admin/awards/create', [AwardsController::class, 'create'])->name('awards.create')->middleware(['auth', 'admin']);
Route::get('admin/awards/restore/{id}', [AwardsController::class, 'restore'])->name('awards.restore')->middleware(['auth', 'admin']);
Route::delete('admin/awards/softdelete/{id}', [AwardsController::class, 'softdelete'])->name('awards.softdelete')->middleware(['auth', 'admin']);
Route::delete('admin/destroy/{id}', [AwardsController::class, 'destroy'])->name('awards.destroy');



Route::get('compro', [ContentController::class, 'index']);
Route::post('admin/profiles/update-status/{id}', [ProfController::class, 'updateStatus'])->name('profiles.update-status');


Route::get('/', function () {
    return view('welcome');
});

Route::get('latihan', [CountController::class, 'index']);
Route::get('penjumlahan', [CountController::class, 'jumlah'])->name('penjumlahan');
Route::get('pengurangan', [CountController::class, 'kurang'])->name('pengurangan');
Route::get('perkalian', [CountController::class, 'kali'])->name('perkalian');
Route::get('pembagian', [CountController::class, 'bagi'])->name('pembagian');


Route::post('storejumlah', [CountController::class, 'storejumlah'])->name('store_penjumlahan');
Route::post('storekurang', [CountController::class, 'storekurang'])->name('store_pengurangan');
Route::post('storeperkalian', [CountController::class, 'storekali'])->name('store_perkalian');
Route::post('storepembagian', [CountController::class, 'storebagi'])->name('store_pembagian');

Route::get('/dashboard', function () {
    if (Auth::user()->id_level === 1) {
        return view('admin.dashboard');
    } elseif (Auth::user()->id_level === 2) {
        return view('user.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
