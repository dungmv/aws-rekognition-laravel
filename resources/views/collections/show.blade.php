@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <ul class="list-group list-group-flush">
            @foreach ($faces as $item)
                <li class="list-group-item">{{ $item['FaceId'] }}</li>
            @endforeach
        </ul>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-face-modal">Add Face</button>
    </div>
    <div id="add-face-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{route('collections.faces.add', $id)}}" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Face</h5>
                        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        @csrf
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
