<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $post_id = $request->id;
        $post = Post::findOrFail($post_id);
        $user_id = auth()->user()->id;
        $like = new Like();
        $like->post_id = $post_id;
        $like->user_id = $user_id;
        $like->save();
        $msg = 'You have liked ' . $post->title . ' post';
        return back()->with('success', $msg);;
    }

    static function delete($id)
    {
        // return $id;
        $associatedLikes = Like::where('post_id', $id);
        $associatedLikes->delete();
    }

    public function destroy($id)
    {
        $like = Like::where('post_id', $id)
            ->where('user_id', auth()->user()->id)->get();
        $like->each->delete();
        $msg = 'Successfully unliked the post';
        return back()->with('success', $msg);;
    }
}
