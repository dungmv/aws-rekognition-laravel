@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <ul class="list-group list-group-flush">
            @foreach ($collections as $item)
                <li class="list-group-item"><a href="{{ route('collections.show', $item) }}">{{$item}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
