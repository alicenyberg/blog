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
        // $this->validate($request, []);

        $checkIfLiked = Likes::where('user_id', auth()->user()->id)->where('comment_id', $comment->id)->first();
        // $countLikes = Likes::where('comment_id', auth()->user()->id)->where('comment_id', $comment->id)->first();

        // $countLikes = Likes::all();

        // dd($checkIfLiked);

        // dd($comment);

        if ($checkIfLiked) {
            return back();
        } else {
            // $likes = new Likes();
            // $likes->liked = $request->input(1);
            // $likes->liked = 1;
            // $likes->user_id = Auth::id();
            // $likes->comment_id = $comments->id;
            // $likes->save();

            $comment->likes()->create([
                'user_id' => auth()->user()->id,
                'comment_id' => $comment->id
            ]);

            return redirect('dashboard');
        }
    }
}
