<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Comment $comment)
    {
        $checkIfLiked = Likes::where('user_id', auth()->user()->id)->where('comment_id', $comment->id)->first();

        if ($checkIfLiked) {
            return back();
        }
        $comment->likes()->create([
            'user_id' => auth()->user()->id,
            'comment_id' => $comment->id
        ]);

        return redirect('dashboard');
    }
}
