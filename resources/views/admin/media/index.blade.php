@extends('layouts.admin')

@section('content')
    <h1>Media</h1>

    @if($photos)
        <form action="delete/media" method="post" class="form-inline">
            <div class="form-group">
                <select name="checkBoxArray" id="" class="form-control">
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="delete_all" class="btn-primary">
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="options"></th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($photos as $photo)
                    <tr>
                        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{ $photo->id }} " ></td>
                        <td>{{ $photo->id }} </td>
                        <td><img height="50px" class="img-rounded" src="{{ $photo->file ? $photo->file : '/images/placeholder-photo.png' }}" alt=""></td>
                        <td>{{ $photo->created_at ? $photo->created_at : 'no date' }} </td>
                        <td>{{ $photo->id }} </td>
                        <td>
                            {{-- <input type="hidden" name="photo" value="{{ $photo->id}} ">
                            <div>
                                <input type="submit" name="" value="Delete" class="btn btn-danger">
                                </div> --}}

                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]])!!}
                            
                            <div class='form-group'>
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger', 'name'=>'delete_single']) !!}
                                <input type="hidden" name="photo" value="{{ $photo->id}} ">
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    @endif
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#options').click(function(){
                if(this.checked){
                    $('.checkBoxes').each(function(){
                        this.checked = true;
                    });
                } else {
                    $('.checkBoxes').each(function(){
                        this.checked = false;
                    });
                }
            });
        });
    </script>
@endsection