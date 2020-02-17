@extends('layouts.admin')

@section('content')
    <h1>Media</h1>

    @if($photos)
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($photos as $photo)
                <tr>
                    <td>{{ $photo->id }} </td>
                    <td><img height="50px" class="img-rounded" src="{{ $photo->file ? $photo->file : '/images/placeholder-photo.png' }}" alt=""></td>
                    <td>{{ $photo->created_at ? $photo->created_at : 'no date' }} </td>
                    <td>{{ $photo->id }} </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]])!!}
                        
                        <div class='form-group'>
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop