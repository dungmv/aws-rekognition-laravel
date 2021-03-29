@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        <div class="form-group">{{ session('success') }}</div>
        <a href="/" class="btn btn-success">Try Again</a>
    </div>
@endif

{{ dd($results) }}
@endsection
