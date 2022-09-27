@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ホーム</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<form action="{{ action('SnsController@create') }}" type ="text" method="post">
    {{ csrf_field() }}
    {{-- @if (count($errors) > 0)
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif --}}
    <input type="text" id="body" name="body" required  size="60">
    {{-- <input type="hidden" id="user_id" name="user_id" required> --}}
    <button type="submit" >つぶやく</button>
</form>

    <table>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <th>{{ $post->id }}</th>
            <td>{{ str_limit($post->user_id, 100) }}</td>
            <td>{{ str_limit($post->body, 300) }}</td>
            <td>{{ str_limit($post->created_at, 100) }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
