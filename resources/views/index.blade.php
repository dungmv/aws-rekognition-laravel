@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('analyze') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="threshold" class="form-label">Threshold</label>
                <input type="number" id="threshold" name="threshold" class="form-control" value="80">
            </div>
            <div class="mb-4">
                <label for="collection" class="form-label">Collection</label>
                <select name="collection" id="collection" class="form-control">
                    @foreach ($collections as $item)
                    <option value="{{$item}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4 ">
                <label for="photo" class="form-label">Upload a Photo</label>
                <input type="file" class="form-control" name="photo">
            </div>
            <div class="mb-4">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection
