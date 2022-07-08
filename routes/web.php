<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return Inertia::render('Home');
    });

    Route::get('/users', function () {
        return Inertia::render('Users/Index', [
            'users' => User::query()
                ->when(request('search'), function ($query) {
                    return $query->where('name', 'like', '%' . request('search') . '%');
                })
                ->paginate(10)
                ->withQueryString()
                ->through(function ($user) {
                    return [
                        'id' => $user->id,
                        'name' => $user->name,
                        'can' => [
                            'edit' => Auth::user()->can('edit', $user)
                        ]
                    ];
                }),
            'filters' => request()->only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
        ]);
    });

    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    })->middleware('can:create,App\Models\User');

    Route::post('/users', function () {
        // validate request
        $validated = request()->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required',
        ]);

        // create user
        User::create($validated);

        // redirect to users index
        return redirect('/users');
    });

    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });

    Route::post("/logout", [LoginController::class, 'logout']);
});