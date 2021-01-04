<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function write_comment(Request $request) {
    	
    	$comment = new Comment;
    	$comment->content = $request->content;
    	$comment->mobile_id = $request->mobile_id;
    	$comment->user_id = Auth::user()->id;
    	$comment->save();
    	
    	return redirect()->back()->with('success_comment', 'Comment has been added successfully');
    }

    public function delete_comment($id) {

        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success_delete_comment', 'Delete was successful!');
    }
}
