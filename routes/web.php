<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/borrow_book/{id}', [HomeController::class, 'borrowBook'])->name('borrow_book');
Route::get('/book_history', [HomeController::class, 'bookHistory'])->name('book_history');
Route::get('/cancel_book/{id}', [HomeController::class, 'cancelBook'])->name('cancel_book');
Route::get('/explore', [HomeController::class, 'exploreBook'])->name('explore');
Route::get('/search-book', [HomeController::class, 'searchBook'])->name('search-book');
Route::get('/search-category/{id?}', [HomeController::class, 'catSearch'])->name('search-category');
Route::get('/show_detail/{id?}', [HomeController::class, 'showDetail'])->name('show_detail');
Route::get('/books_detail', [HomeController::class, 'bookDetail'])->name('books_detail');
Route::get('/category-by-book/{id}', [HomeController::class, 'booksByCategory'])->name('category-by-book');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['IsAdmin:admin'])->group(function(){

Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/category', [AdminController::class, 'category'])->name('category');
Route::post('/addcategory', [AdminController::class, 'addCategory']);
Route::get('/deletecategory/{id}', [AdminController::class, 'deleteCategory'])->name('deletecategory');
Route::get('/editcategory/{id}', [AdminController::class, 'editCategory'])->name('deletecategory');
Route::post('/update/{id}', [AdminController::class, 'updateCategory'])->name('update');

Route::get('/book', [AdminController::class, 'Book'])->name('book');
Route::post('/add_book', [AdminController::class, 'addBook'])->name('add_book');
Route::get('/show_books', [AdminController::class, 'showBook'])->name('show_books');
Route::get('/delete_book/{id}', [AdminController::class, 'deleteBook'])->name('delete_book');
Route::get('/edit_book/{id}', [AdminController::class, 'editBook'])->name('edit_book');
Route::post('/update_book/{id}', [AdminController::class, 'updateBook'])->name('update_book');

// book borrow routes
Route::get('/borrow_request', [AdminController::class, 'borrowRequest'])->name('borrow_request');
Route::get('/approve_book/{id}', [AdminController::class, 'approveBook'])->name('approve_book');
Route::get('/returned_book/{id}', [AdminController::class, 'returnedBook'])->name('returned_book');
Route::get('/rejected_book/{id}', [AdminController::class, 'rejectedBook'])->name('rejected_book');
Route::get('/search-user', [AdminController::class, 'searchUser'])->name('search-user');




});







