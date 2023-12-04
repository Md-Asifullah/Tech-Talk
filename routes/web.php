<?php

use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Models\Like;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

// Index Page / All Categories
Route::get('/', [CategoryController::class, 'displayAllCategories'])->name('all_categories');

// New Categories
Route::get('/newcategories', [CategoryController::class, 'sortAllCategories']);

// Popular Categories
Route::get('/popular-categories', [CategoryController::class, 'sortPopularCategories']);

/*############## Categories ##############*/

// Show create form
Route::get('/categories/create', [CategoryController::class, 'create']);

// store
Route::post('/categories/create', [CategoryController::class, 'store']);

// Show single category

Route::get('/category/{category}', [CategoryController::class, 'showSingleCategory']);

// Show All Categories along with manage options 
Route::get('/categories/manage', [CategoryController::class, 'manage']);

// Trash Category
Route::get('/categories/trash', [CategoryController::class, 'show_trash']);

// Restore Category
Route::get('/categories/{id}/restore', [CategoryController::class, 'restore']);

// Show Edit Category Form
Route::get('/category/{category}/edit', [CategoryController::class, 'edit']);

// Update Category
Route::put('/category/{category}', [CategoryController::class, 'update']);

// Delete Category
Route::delete('/category/{category}', [CategoryController::class, 'destroy']);

// Delete Permanently
Route::delete('/category/{category}/force-delete', [CategoryController::class, 'forceDelete']);

// Show All Posts along with manage options 
Route::get('/posts/manage', [PostController::class, 'manage']);

// Show All Posts along with manage options under specific category 
Route::get('/posts/manage-specific-category', [PostController::class, 'manageSpecificCategory']);

// Trash Posts
Route::get('/posts/trash', [PostController::class, 'show_trash']);

// Restore Post
Route::get('/posts/{id}/restore', [PostController::class, 'restore']);

// Forece Delete
Route::delete('/posts/{id}/force-delete', [PostController::class, 'forceDelete']);

// Resource Controller Posts
Route::resource('posts', PostController::class);

Route::get('/like/{id}', [LikeController::class, 'store']);

Route::delete('/unlike/{id}', [LikeController::class, 'destroy']);

Route::get('/test/{id}', [LikeController::class, 'delete']);

Route::post('/comment', [CommentController::class, 'store']);

// User Related Routes

Route::get('/register', [UserController::class, 'create']);

Route::post('/register', [UserController::class, 'store'])->name('users.store');

Route::get('/login', [UserController::class, 'login']);

Route::post('/login', [UserController::class, 'authenticate'])->name('users.authenticate');

Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');

Route::get('/profile', [UserController::class, 'show'])->name('users.profile');

Route::post('/profile', [UserController::class, 'update'])->name('profile.update');

Route::get('/password', [UserController::class, 'showPasswordForm'])->name('users.password');

Route::post('/password', [UserController::class, 'updatePassword'])->name('password.update');

Route::get('/members', [UserController::class, 'index'])->name('members');

Route::delete('/comment/{id}', [CommentController::class, 'destroy']);

Route::post('/comment/update/{id}', [CommentController::class, 'update']);

// Route::get('/create-role', function () {
    // $role = Role::create(['name' => 'member']);
    // return $role;
    // $permission = Permission::create(['name' => 'manage all likes and comments']);
    // return $permission;
    // $user = auth()->user();
    // $user->assignRole('member');
    // return $user;
    // $user->givePermissionTo('manage all likes and comments');

    // return $user->can('create posts');
// });
