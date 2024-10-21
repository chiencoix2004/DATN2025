<?php

namespace Modules\Admin\App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
public function listComment(){

    $listComment = Comment::join('users', 'users.id', '=', 'comments.users_id')
        ->join('products', 'products.id', '=', 'comments.products_id')
        ->select(
            'comments.id',
            'users.user_name',
            'products.name',
            'comments.comments',
            'comments.rating',
            'comments.comment_date',
            'comments.status'
        )->orderBy('comments.comment_date', 'DESC')
        ->get();

    foreach ($listComment as $comment) {
        $commentDate = Carbon::parse($comment->comment_date);
        $comment->isNewComment = $commentDate->diffInDays(Carbon::now()) <= 1;
    }

    // Truyền dữ liệu vào view
    return view('admin::contents.comments.listComment', compact('listComment'));
}

public function editComment($id) {
    $detailComment = Comment::join('users', 'users.id', '=', 'comments.users_id')
    ->join('products', 'products.id', '=', 'comments.products_id')
    ->select(
        'comments.id',
        'users.user_name',
        'products.name',
        'comments.comments',
        'comments.rating',
        'comments.comment_date',
        'comments.status'
    )->find($id);
    return view('admin::contents.comments.editComment', compact('detailComment'));
}

public function updateComment($id, Request $request){
    $detailComment = Comment::findOrFail($id);
    
        $detailComment->update([
            'status' => $request['status']
        ]);
        return redirect()->route('admin.comment.listComment');
}
}
