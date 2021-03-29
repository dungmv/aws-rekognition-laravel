<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = App::make('aws')->createClient('rekognition');
        $result = $client->listCollections([
            // 'MaxResults' => <integer>,
            // 'NextToken' => '<string>',
        ]);
        $collections = $result->get('CollectionIds');
        return \view('collections.index', \compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $client = App::make('aws')->createClient('rekognition');
        $result = $client->listFaces([
            'CollectionId' => $id, // REQUIRED
            'MaxResults' => 100,
            'NextToken' => $request->input('next_token'),
        ]);
        $faces = $result->get('Faces');
        $nextToken = $result->get('NextToken');
        return \view('collections.show', compact('id', 'faces', 'nextToken'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addFaces(Request $request, $id)
    {
        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile($id, $image, ['public']);
        $client = App::make('aws')->createClient('rekognition');
        $client->indexFaces([
            'CollectionId' => $id, // REQUIRED
            'DetectionAttributes' => ['DEFAULT'],
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('filesystems.disks.s3.bucket'),
                    'Name' => $path,
                ],
            ],
            'MaxFaces' => 5,
            'QualityFilter' => 'NONE',
        ]);

        return \redirect()->route('collections.show', $id);
    }
}
