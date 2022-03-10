<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- blog post here -->

    <h1>Hello</h1>
    <img src="{{url('/images/IMG_3577.jpg')}}" alt="Image" width="50%" />
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <!-- comment section here -->
    <div class="comment-section">
        <h3>Add a comment here</h3>
        <form>
            <label for="comment"></label>
            <textarea type="text" name="comment" id="comment"></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>

    <!-- login -->
    @if ($errors->any())
        <p>
            <u>{{ $errors->first() }}</u>
        </p>
    @endif
    <form action="/login" method="post">
        @csrf
        <div>
            <label for="email">Email</label>
            <input name="email" id="email" type="email" />
        </div>
        <div>
            <label for="password">Password</label>
            <input name="password" id="password" type="password" />
        </div>
        <button type="submit">Login</button>
    </form>

    <!-- register -->

    <form action="/register" method="post">
        @csrf
        <div>
            <label for="name">Name</label>
            <input name="name" id="name" type="text" />
        </div>
        <div>
            <label for="email">Email</label>
            <input name="email" id="email" type="email" />
        </div>
        <div>
            <label for="password">Password</label>
            <input name="password" id="password" type="password" />
        </div>
        <button type="submit">Register</button>
    </form>

</body>

</html>
