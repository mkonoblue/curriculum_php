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
<form action="{{ url('home') }}" type ="text" method="post">
    {{-- @if (count($errors) > 0)
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif --}}
    <input type="text" id="body" name="body" required  size="60">
    <button type="submit" >つぶやく</button>
</form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
