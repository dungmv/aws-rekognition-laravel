<?php

namespace App\Http\Controllers;

use Aws\Rekognition\RekognitionClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function index()
    {
        $client = App::make('aws')->createClient('rekognition');
        $result = $client->listCollections([
            // 'MaxResults' => <integer>,
            // 'NextToken' => '<string>',
        ]);
        $collections = $result->get('CollectionIds');
        return view('index', \compact('collections'));
    }

    public function analyze(Request $request)
    {
        $client = App::make('aws')->createClient('rekognition');
        $threshold = \intval($request->input('threshold'));
        $collection = $request->input('collection');
        $image = $request->file('photo');

        $path = Storage::disk('s3')->putFile('search', $image, ['public']);

        $result = $client->searchFacesByImage([
            'CollectionId' => $collection, // REQUIRED
            'FaceMatchThreshold' => $threshold,
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('filesystems.disks.s3.bucket'),
                    'Name' => $path,
                ],
            ],
            'MaxFaces' => 5,
            'QualityFilter' => 'NONE',
        ]);

        return view('dashboard', \compact('result'));
    }
}
