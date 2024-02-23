<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PhotoController;

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

// Basic Routing practicum

// Route::get('/hello', function () {
//     return 'Hello World';
// });

Route::get('/world', function () {
    return 'World';
});

// creating a '/' route that displays a 'Welcome' message
// Route::get('/', function () {
//     return 'Welcome';
// });

// create a '/about' route that displays NIM and name
// Route::get('/about', function () {
//     return 'NIM: 2241720244, Nama: Sri Kresna Maha Dewa';
// });

// Route Parameters practicum

// then create a '/about' route that displays NIM and name
Route::get('/user/{name}', function ($name) {
    return 'Hello, ' . $name;
});

// call the route localhost/PWL_2024/public/user/yourname. Pay attention to the page that appears and decribe your observations
// ANSWER : The page that appears is "Hello, kresna" because the URL is complete

// Try writing the URL:localhost/PWL_2024/public/user/. Pay attention to the page that appears and decribe your observations
// ANSWER : The page that appears is "Not Found" because the URL is not complete

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke- ' . $postId . ', Komentar ke-: ' . $commentId;
});

// call the route localhost/PWL_2024/public/posts/1/comments/5. Pay attention to the page that appears and decribe your observations
// ANSWER : The page that appears is "Pos ke- 1, Komentar ke-: 5" because the URL is complete

// Then create a /articles/{id} route that will display the output "Article Page with ID {id}", replace id according to the input of url.
Route::get('/articles/{id}', function ($id) {
    return 'Article Page with ID ' . $id;
});

// Optional Parameters practicum

// Route::get('/user/{name}', function ($name = null) {
//     return 'My name is ' . $name;
// });

// Run the code by typing the URL: localhost/PWL_2024/public/user/. Pay attention to the page that appears and describe your observations.
// ANSWER : The page would error because the URL is not complete

//  Next write the URL: localhost/PWL_2024/public/user/yourname. Pay attention to the page that appears and describe your observations
// ANSWER : The page that appears is "My name is kresna" because the URL is complete

Route::get('/user/{name?}', function ($name = 'John') {
    return 'Nama saya' . $name;
});

// Run the code by typing the URL: localhost/PWL_2024/public/user/. Pay attention to the page that appears and describe your observations
// ANSWER : The page that appears is "Nama saya John" because $name have default value "John"

// Route Name practicum

/** 

Route::get('/user/profile', function () {
    //
})->name('profile');

Route::get(
    '/user/profile',
    [UserProfileController::class, 'show']
)->name('profile');

// Generating URLs...
$url = route('profile');

// Generating Redirects..
return redirect()->route('profile');

*/

// Route Group and Route Prefixes practicum

Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Uses first & second Middleware
    });

    Route::get('/user/profile', function () {
        // Uses first & second Middleware
    });
});

Route::domain('{account}.examples.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/event', [EventController::class, 'index']);
});

// Route Prefixes practicum

Route::prefix('admin')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/event', [EventController::class, 'index']);
});

// Redirect Routes practicum

Route::redirect('/here', '/there');

// View Routes practicum

Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

// Controller practicum

Route::get('/hello', [WelcomeController::class, 'hello']);

// Modification of results in practicum point 2 (Routing with the concept of controller. Move the execution logic into the controller with the name PageController.

// Route::get('/', [PageController::class, 'index']);
// Route::get('/about', [PageController::class, 'about']);
// Route::get('/articles/{id}', [PageController::class, 'articles']);

// Modify the previous implementation with the concept of Single Action Controller. So for the final result obtained there will be HomeController, AboutController and ArticleController. Modifications are also the routes used

// HomeController
Route::get('/', [HomeController::class, 'index']);

// AboutController
Route::get('/about', [AboutController::class, 'index']);

// ArticleController
Route::get('/articles/{id}', [ArticleController::class, 'index']);

// Resource Controller practicum

Route::resource('photos', PhotoController::class);

Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);

Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);