@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12">
        <div class="p-6">
            <h1 class="text-2xl font-medium mb-1">Yousif</h1>
            <p>posted {{$user->posts()->count()}} post and {{$user->likes()->count()}} received likes</p>
        </div>
        <div class="bg-white p-6 rounded-lg">
            @foreach ($user->posts as $post)    
                    <div class="mb-4">
                        <a href="" class="font-bold">{{$post->user->name}}</a><span class="text-gray-600 text-sm">
                            {{$post->created_at->diffForHumans() }}
                        </span>
                        <p class="mb-2">{{$post->body}}</p>
                            @can('delete', $post)                              
                                <form action="{{route('posts.destroy',$post)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-blue-500">Delete</button>
                                </form>
                            @endcan
                            <div class="flex items-center">
                                @auth
                                    @if (!$post->likes->contains('user_id',auth()->user()->id))
                                        <form action="{{route('posts.like',$post)}}" method="post">
                                            @csrf
                                            <button type="submit" class="text-blue-500">Like</button>
                                        </form>
                                    @else
                                        <form action="{{route('posts.like.destroy',$post)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="text-blue-500">Unlike</button>
                                        </form> 
                                    @endif
                                @endauth
                                <span>&nbsp;{{$post->likes()->count()}} {{ Str::plural('Like', $post->likes()->count()) }}</span>
                            </div>       
                    </div>
                    @endforeach
        </div>
    </div>
</div>
@endsection