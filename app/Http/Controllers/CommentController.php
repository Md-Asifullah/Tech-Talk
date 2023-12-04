<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $postId = $request->post_id;
        $request->validate([
            'text' => 'required | max:255'
        ]);

        $comment = new Comment();
        $comment->text = $request->text;
        $comment->post_id = $postId;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        $msg = 'Your comment has been posted successfully!';
        return redirect()->route('posts.show', $postId)->with('success', $msg);
    }

    static function delete($id)
    {
        $associatedComments = Comment::where('post_id', $id);
        $associatedComments->delete();
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        $msg = 'Your comment has been deleted successfully';
        return back()->with('delete', $msg);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => 'required | max:255'
        ]);
        $comment = Comment::findOrFail($id);
        $comment->text = $request->text;
        $comment->save();
        $msg = 'Comment has been updated successfully';
        return back()->with('success', $msg);
    }
}
