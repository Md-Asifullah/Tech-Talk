<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class CategoryController extends Controller
{
    public function displayAllCategories()
    {
        $categories = Category::orderBy('name', 'asc')->paginate(4);
        return view('Categories.show_all', ['categories' => $categories]);
    }

    public function sortAllCategories()
    {
        $categories = Category::latest()->paginate(4);
        return view('Categories.show_all', ['categories' => $categories]);
    }

    public function sortPopularCategories()
    {
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->paginate(4);
        return view('Categories.show_all', ['categories' => $categories]);
    }

    public function showSingleCategory(Category $category)
    {
        // return $category;
        $posts = Post::where('category_id', $category->id)->orderBy('created_at', 'desc')
            ->get();
        $likes = Like::all();
        // $posts = $category->id;
        $categories = Category::all();
        return view("Categories.show", ['category' => $category, 'posts' => $posts, 'categories' => $categories, 'likes' => $likes]);
    }

    public function create()
    {
        if (auth()->check() && auth()->user()->can('create category')) {
            return view('Categories.create');
        } else {
            return view('unauthorized');
        }
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', Rule::unique('categories', 'name')],
            'description' => ['required', 'max:255']
        ]);
        Category::create($formFields);
        $msg = 'Category ' . $request->name . ' has been created successfully';
        return redirect('/categories/manage')->with('success', $msg);
    }

    public function manage()
    {
        if (auth()->check() && auth()->user()->can('manage category')) {
            $categories = Category::paginate(5);
            return view('Categories.manage', ['categories' => $categories]);
        } else {
            return view('unauthorized');
        }
    }

    public function show_trash()
    {
        if (auth()->check() && auth()->user()->can('manage category')) {
            $categories = Category::onlyTrashed()->paginate(5);
            return view('Categories.trash', ['categories' => $categories]);
        } else {
            return view('unauthorized');
        }
    }

    public function edit(Category $category)
    {
        return view('Categories.edit', ['category' => $category]);
    }

    public function update(Request $request, string $id)
    {
        $formFields = $request->validate([
            'name' => ['required', Rule::unique('categories', 'name')],
            'description' => ['required', 'max:255']
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        $msg = 'Category ' . $request->name . ' has been updated successfully';
        return redirect('/categories/manage')->with('success', $msg);
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        // Tring to trash associated posts as well.
        $posts = Post::where('category_id', '=', $id)->get();

        $postsToBeTrashed = array();

        if (count($posts) > 0) {
            foreach ($posts as $post) {
                // array_push($postsToBeTrashed, $post->id);
                PostController::destroyPost($post->id);
            }
        }

        // return $postsToBeTrashed;

        // return count($posts);
        // PostController::destroyPost();
        $category->delete();
        $msg = 'Category ' . $category->name . ' has been trashed successfully';
        return redirect('/categories/manage')->with('delete', $msg);
    }

    public function restore($id)
    {

        // Testing environment Starts
        $postsToBeRestored = Post::onlyTrashed()->where('category_id', $id)->get();
        if (count($postsToBeRestored) > 0) {
            foreach ($postsToBeRestored as $post) {
                PostController::restorePost($post->id);
            }
        }
        // Testing environment Ends

        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();

        // Make Arrangement to restore the posts associated with the category


        $msg = 'Category ' . $category->name . ' has been restored successfully';
        return redirect('/categories/manage')->with('success', $msg);
    }

    public function forceDelete($id)
    {
        // Testing environment Starts
        $postsToBeDeleted = Post::onlyTrashed()->where('category_id', $id)->get();
        if (count($postsToBeDeleted) > 0) {
            foreach ($postsToBeDeleted as $post) {
                PostController::forceDeletePost($post->id);
            }
        }
        // Testing environment Ends
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        $msg = 'Category ' . $category->name . ' has been deleted permanently';
        return redirect('/categories/manage')->with('delete', $msg);
    }
}
