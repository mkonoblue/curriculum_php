@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-2">
                    <div class="card-header">ホーム</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ action('SnsController@create') }}" type="text" method="post">
                            {{ csrf_field() }}
                            @if (count($errors) > 0)
                                <ul>
                                    @foreach ($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="container">
                                <div class="row">
                                    <input class="col-12" type="text" id="body" name="body"
                                        placeholder="　いまどうしてる？">
                                    <div class="col p-0 text-right">
                                        <button class="mt-3 btn btn-light" type="submit">つぶやく</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @foreach ($posts as $post)
                    <div class="container p-4 bg-white border ">
                        <div class="row">
                            <div class="col-6 font-weight-bold"> {{ $post->user->name }}</div>
                            <div class="col-6 text-right"> {{ date('Y/m/d H:i', strtotime($post->created_at)) }}</div>
                            <div class="col-10  mt-3  break-all">{{ $post->body }}</div>
                            <div class="col-2  mt-3 text-right">
                                
                                @if (Auth::id() === $post->user_id )
                                    <a href= "{{ action('SnsController@delete', ['id' => $post->id]) }}" class="text-danger">削除</a>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    </div>
@endsection
