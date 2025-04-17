<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\KecamatanController;
use App\Http\Controllers\Api\DesaController;
use App\Http\Controllers\Api\LegalitasUsahaController; // Tambahan controller legalitas
use App\Http\Controllers\Api\KeuanganController; // Tambahan controller keuangan

// Login tanpa AuthController
Route::post('login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Email atau password salah'], 401);
    }

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json(['token' => $token], 200);
});

// Logout tanpa AuthController
Route::middleware(['auth:sanctum'])->post('logout', function (Request $request) {
    $request->user()->tokens()->delete();
    return response()->json(['message' => 'Logout berhasil'], 200);
});

// API yang butuh autentikasi
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/kecamatan', [KecamatanController::class, 'index']);
    Route::get('/desa', [DesaController::class, 'index']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Route untuk legalitas usaha user yang login
    Route::get('/legalitas-usaha', [LegalitasUsahaController::class, 'index']);
    
    // 📌 Route untuk memperbarui data legalitas usaha
    Route::put('/legalitas-usaha/{id}', [LegalitasUsahaController::class, 'update']);

    // 📌 Route untuk keuangan user yang login
    Route::get('/keuangan', [KeuanganController::class, 'index']);
    Route::post('/keuangan', [KeuanganController::class, 'store']);
    Route::get('/keuangan/{id}', [KeuanganController::class, 'show']);
    Route::put('/keuangan/{id}', [KeuanganController::class, 'update']);
    Route::delete('/keuangan/{id}', [KeuanganController::class, 'destroy']);
});
