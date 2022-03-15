<p>
    Hello, {{ $user->name }}! Do you want to <a href="logout">logout</a>?</p>
</p>

<img src="{{url('/images/IMG_3577.jpg')}}" alt="Image" width="50%" />
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<!-- comment section here -->
<div class="comment-section">
    <h3>Add a comment here</h3>
    <form action="/comments" method="post">
        @csrf
        <label for="content"></label>
        <textarea type="text" name="content" id="content"></textarea>
        <button type="submit">Submit</button>
    </form>

    <ul>
        @foreach ($comments as $comment)
        <li>
            <p>
                {{ $comment->user->name }}:
                {{ $comment->content }}
            </p>
            <form action="{{ route('like.comment', $comment) }}" method="POST">
                @csrf
                <input type="hidden" name="true" id="true" />
                <label for="true"></label>
                <div><button type="submit">Like</button><p>{{$comment->likes->count()}} Likes</p></div>
            </form>
        </li>
        @endforeach
    </ul>
</div>
