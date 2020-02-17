@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>

    @if(Session::has('deleted_post'))
      <p class="bg-danger">{{ session('deleted_post') }} </p>
    @endif 

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Owner</th>
                <th>Photo</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @if ($posts)
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }} </td>
                    <td>{{ $post->user->name }} </td>
                    <td><img height="50px" class="img-rounded" src="{{ $post->photo ? $post->photo->file : '/images/placeholder-photo.png' }}" alt=""> </td>
                    <td>{{ $post->category ? $post->category->name : 'Uncategorized' }} </td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}} ">{{ $post->title }}</a></td>
                    <td>{{ Str::limit($post->body, 15) }} </td>
                    <td>{{ $post->created_at->diffForHumans() }} </td>
                    <td>{{ $post->updated_at->diffForHumans() }} </td>
                    <td><a href="{{ route('home.post', $post->id) }} ">View Post</a></td>
                    <td><a href="{{ route('admin.comments.show', $post->id) }} ">View Comments</a></td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    
@endsection