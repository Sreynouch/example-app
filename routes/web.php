<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
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

Route::get('/', function () {
    // return view('welcome');

    //fetch all users
    // $users = DB::select("select * from user");
    //$users = DB::table('user')->get();
    $users = User::get();

    //create new user
    // $user = DB::insert('insert into user(username, password) values(?, ?)', [
    //     'nouch',
    //     '12345678'
    // ]);
    // $user = DB::table('user')->insert([
    //     'username' => 'tenn',
    //     'password' => 'nouch123'
    // ]);
    // $user = User::create([
    //     'name' => 'sreyten',
    //     'email' => 'srey@gmail.com',
    //     'password' => 'tenn'
    // ]);
    
    //update user
    // $user = DB::update('update user set password=? where id = ?',[
    //     '234567890',
    //     2,
    // ]);
    // $user = DB::table('user')->where('id',2)->update([
    //     'password' => 'nouch',
    // ]);
    // $user = User::find(1);
    // $user->update([
    //     'email' => "nana@gmail.com"
    // ]);

    //delete user
    //$user = DB::delete("delete from user where id=5");
    //$user = DB::table('user')->where('id', 2)->delete();
    // $user = User::find(1);
    // $user->delete();
    
    dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
