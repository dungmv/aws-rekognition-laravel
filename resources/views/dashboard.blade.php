@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">SearchedFaceConfidence:</div>
                <div class="col-md-8">{{ $result['SearchedFaceConfidence'] }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">SearchedFaceBoundingBox:</div>
                <div class="col-md-8">{{ json_encode($result['SearchedFaceBoundingBox']) }}</div>
            </div>
            <div class="row">
                <div class="col-md-12">FaceMatches:</div>
            </div>
            @foreach ($result['FaceMatches'] as $match)
            <div class="row">
                <div class="col-md-4">FaceId</div>
                <div class="col-md-8">{{ $match['Face']['FaceId'] }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Similarity</div>
                <div class="col-md-8">{{ $match['Similarity'] }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Confidence</div>
                <div class="col-md-8">{{ $match['Face']['Confidence'] }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">BoundingBox</div>
                <div class="col-md-8">{{ json_encode($match['Face']['BoundingBox']) }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">ImageId</div>
                <div class="col-md-8">{{ $match['Face']['ImageId'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
