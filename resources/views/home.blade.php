@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <h3>Add a comment here</h3>
                    <form action="/comments" method="post">
                        @csrf
                        <label for="content"></label>
                        <textarea type="text" name="content" id="content"></textarea>
                        <button type="submit">Submit</button>
                    </form>

                    {{-- <ul>
                        @foreach ($user->comments as $comment)
                        <li>
                            <p>
                                {{ $user->name }}:
                                {{ $comment->content }}
                            </p>
                            <button type="submit">Like</button>
                        </li>
                        @endforeach
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
