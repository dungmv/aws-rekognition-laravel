@extends('layouts.app')

@section('content')
<div class="shadow bg-white p-4">
    <form action="{{ route('analyze') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="confidence" class="text-gray-600 font-light">Minimum Confidence</label>
            <input type="number" id="confidence" name="confidence" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="50">
        </div>
        <div class="mb-4 ">
            <label for="photo" class="text-gray-600 font-light">Upload a Photo</label>
            <div class="mt-2 relative border-dotted h-48 rounded-lg border-dashed border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                <div class="absolute">
                    <div class="flex flex-col items-center"> <i class="fa fa-folder-open fa-4x text-blue-700"></i> <span class="block text-gray-400 font-normal">Attach you files here</span> </div>
                </div>
                <input type="file" class="h-full w-full opacity-0" name="photo">
            </div>
        </div>
        <div class="mb-4">
            <input type="submit" value="Submit" class="bg-blue-700 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">
        </div>
    </form>
</div>
@endsection
