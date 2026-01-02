<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('article')
            ->orderBy('is_approved', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('admin.comments.index', compact('comments'));
    }

    public function approve(Comment $comment)
    {
        $comment->update(['is_approved' => true]);
        return back()->with('success', 'Komentar berhasil disetujui.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Komentar berhasil dihapus.');
    }
}
