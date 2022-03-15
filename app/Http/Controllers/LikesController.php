<?php

namespace App\Http\Controllers;

use App\Models\Comments;
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
    public function __invoke(Request $request, Comments $comments)
    {
        $this->validate($request, []);

        $likes = new Likes();
        // $likes->liked = $request->input(1);
        $likes->liked = 1;

        $likes->user_id = Auth::id();
        $likes->comment_id = $comments->id;
        $likes->save();
    }
}
