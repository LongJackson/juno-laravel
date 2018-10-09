<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    //
    public function index()
    {
    	$comments  = Comment::all();
    	return view('backend.comment.index', compact('comments'));
    }

    public function destroy($id)
    {
    	Comment::destroy($id);
    	return redirect()->back()->with('success', 'Bình luận được xóa thành công');
    }

    public function edit($id)
    {
    	$comment = Comment::findOrFail($id);
    	return view('backend.comment.edit', compact('comment'));
    }

    public function update($id, Request $request)
    {
    	$comment = Comment::findOrFail($id);
    	$comment->update([
    		'comment_content' => $request->content,
    		'comment_status' => $request->status
    	]);
    	return redirect()->back()->with('success', 'Cập nhật bình luận thành công');
    }	
}
