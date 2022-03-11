<p>
    Hello, {{ $user->name }}! Do you want to <a href="logout">logout</a>?</p>
</p>

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
        @foreach ($user->comments as $comment)
        <li>
            <p>
                {{ $user->name }}:
                {{ $comment->content }}
            </p>
        </li>
        @endforeach
    </ul>

</div>
