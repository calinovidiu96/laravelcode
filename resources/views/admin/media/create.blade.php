@extends('layouts.admin')

@section('medias-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
@endsection



@section('content')
    <h1>Upload Media</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store', 'class'=>'dropzone'])!!}

    {!! Form::close() !!}

    {{-- {!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store', 'files'=>true])!!}
    
    <div class='form-group'>
        {!! Form::label('file', 'Photo') !!}
        {!! Form::file('file', null, ['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!} --}}

@stop

@section('medias-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
@endsection