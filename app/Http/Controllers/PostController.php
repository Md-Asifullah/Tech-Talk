<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\View;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\CommentController;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->check()) {
            $categories = Category::orderBy('name', 'asc')
                ->get();
            return view('Posts.create', ['categories' => $categories]);
        } else {
            return view('unauthorized');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'image' => ['max:500', 'image', 'mimes:jpg,png'],
            'category_id' => ['required', 'integer'],
            'description' => 'required'
        ]);

        $post = new Post();

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->image->getClientOriginalName();
            $filepath = $request->image->storeAs('public/uploads', $filename);
            $post->image = 'storage/uploads/' . $filename;
        } else {
            $post->image = 'storage/uploads/default.png';
        }
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->user_id = auth()->user()->id;
        $post->save();
        $msg = 'Post ' . $request->title . ' has been created successfully';
        return redirect('/posts/manage')->with('success', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $post = Post::findOrFail($id);
        $postComments = $post->comments()->latest()->paginate(5);
        $author = $post->user->first_name . " " .  $post->user->last_name;
        $category = Category::findOrFail($post->category_id);
        $categories = Category::all();
        $relatedPosts = Post::all()->where('category_id', $post->category_id);

        // Incremeting views logic
        $total_views = 0;


        if (View::where('post_id', '=', $id)->exists()) {
            $view = View::where('post_id', '=', $id)->get()[0];
            // return $view->view_count;
            $total_views = $view->view_count + 1;
            $view->view_count = $total_views;
            $view->save();
        } else {
            $view = new View();
            $view->post_id = $id;
            $view->view_count = 1;
            $view->save();
            $total_views = 1;
        }

        if ($total_views <= 9) {
            $total_views = '0' . $total_views;
        }

        if (Auth::check()) {
            $like = Like::where('post_id', $post->id)
                ->where('user_id', auth()->user()->id)
                ->count();
        } else {
            $like = 0;
        }



        return view('posts.show', ['post' => $post, 'category' => $category, 'total_views' => $total_views, 'categories' => $categories, 'relatedPosts' => $relatedPosts, 'author' => $author, 'likeStatus' => $like, 'postComments' => $postComments]);
    }

    public function manage()
    {
        if (auth()->check() && auth()->user()->can('manage category')) {
            $posts = Post::paginate(5);
            $categories = Category::all();
            return view('posts.manage', ['posts' => $posts, 'categories' => $categories]);
        } else if (auth()->check()) {
            $user = auth()->user()->id;
            // $posts = Post::paginate(5);
            // return $posts;
            $posts = Post::where('user_id', '=', $user)->paginate(5);
            $categories = Category::all();
            return view('posts.manage', ['posts' => $posts, 'categories' => $categories]);
        } else {
            return view('unauthorized');
        }
    }

    public function manageSpecificCategory(Request $request)
    {
        // Need a session variable for fixing pagination issue
        // $data = $request->session()->get('_token');
        // return $data;

        // $request->session()

        if (isset($request->category_id)) {
            $request->session()->put('manage_specific_category_fetch_result_id', $request->category_id);
        }

        // return session()->get('manage_specific_category_fetch_result_id');

        //////
        if (auth()->check() && auth()->user()->can('manage category')) {
            $posts = Post::paginate(5);
            if (session()->get('manage_specific_category_fetch_result_id') != "all") {
                $posts = Post::where('category_id', session()->get('manage_specific_category_fetch_result_id'))->paginate(5);
            }
        } else {
            $user = auth()->user()->id;
            // $posts = Post::where('user_id', '=', $user)->paginate(5);
            if (session()->get('manage_specific_category_fetch_result_id') != "all") {
                $posts = Post::where('category_id', session()->get('manage_specific_category_fetch_result_id'))->where('user_id', '=', $user)->paginate(5);
            }
        }
        //////


        // $posts = Post::paginate(5);
        // if (session()->get('manage_specific_category_fetch_result_id') != "all") {
        //     $posts = Post::where('category_id', session()->get('manage_specific_category_fetch_result_id'))->paginate(5);
        // }
        $categories = Category::all();
        return view('posts.manage', ['posts' => $posts, 'categories' => $categories]);
    }
    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('Posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $request->validate([
            'title' => ['required', 'max:255'],
            'category_id' => ['required', 'integer'],
            'description' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['max:500', 'image', 'mimes:jpg,png']
            ]);
            $filename = time() . '_' . $request->image->getClientOriginalName();
            $filepath = $request->image->storeAs('public/uploads', $filename);
            if ($post->image != 'storage/uploads/default.png') {
                File::delete(public_path($post->image));
            }
            $post->image = 'storage/uploads/' . $filename;
        }
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->save();
        $msg = 'Post ' . $request->title . ' has been updated successfully';
        return redirect('/posts/manage')->with('success', $msg);
        // return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        $msg = 'Post ' . $post->title . ' has been trashed successfully';
        return redirect('/posts/manage')->with('delete', $msg);
    }

    static function destroyPost(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    }

    public function show_trash()
    {
        if (auth()->check() && auth()->user()->can('manage category')) {
            $posts = Post::onlyTrashed()->paginate(5);
            $trashedCategories = Category::onlyTrashed()->get();
            return view('Posts.trash', ['posts' => $posts, 'trashedCategories' => $trashedCategories]);
        } else if (auth()->check()) {
            $user = auth()->user()->id;
            // $posts = Post::paginate(5);
            // return $posts;
            $posts = Post::onlyTrashed()->where('user_id', '=', $user)->paginate(5);
            $trashedCategories = Category::onlyTrashed()->get();
            return view('Posts.trash', ['posts' => $posts, 'trashedCategories' => $trashedCategories]);
        } else {
            return view('unauthorized');
        }
    }

    public function restore($id)
    {
        // return $id;
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        $msg = 'Post ' . $post->name . ' has been restored successfully';
        return redirect('/posts/trash')->with('success', $msg);
    }

    static function restorePost($id)
    {
        // return $id;
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
    }

    public function forceDelete($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        // return $post;
        $viewChecker = count(View::where('post_id', $post->id)->get());
        // return $viewChecker;
        if ($viewChecker > 0) {
            $view = View::where('post_id', $post->id)->get()[0];
            $view->delete();
        }
        if ($post->image != 'storage/uploads/default.png') {
            File::delete(public_path($post->image));
        }
        LikeController::delete($post->id);
        CommentController::delete($post->id);
        $post->forceDelete();
        $msg = 'Post ' . $post->title . ' has been deleted permanently';
        return redirect('/posts/trash')->with('delete', $msg);
    }

    static function forceDeletePost($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        // return $post;
        $viewChecker = count(View::where('post_id', $post->id)->get());
        // return $viewChecker;
        if ($viewChecker > 0) {
            $view = View::where('post_id', $post->id)->get()[0];
            $view->delete();
        }
        if ($post->image != 'storage/uploads/default.png') {
            File::delete(public_path($post->image));
        }
        LikeController::delete($post->id);
        CommentController::delete($post->id);
        $post->forceDelete();
    }
}
