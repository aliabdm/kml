@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('upload.process') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="kml_file">Upload KML file:</label>
                    <input type="file" name="kml_file" id="kml_file">
                    <button type="submit" class="btn btn-outline-primary">Upload</button>
                </form>

            </div>
        </div>
    </div>
@endsection
