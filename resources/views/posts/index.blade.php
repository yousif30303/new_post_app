@extends('layouts.app')

@section('content')
        <div class="flex justify-center">
            <div class="w-6/12 bg-white p-6 rounded-lg">
                <form action="{{route('posts')}}" method="post">
                    @csrf   
                    <div class="mb-4">
                        <label for="username" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-400 @enderror" placeholder="Post something"></textarea>
                        @error('body')
                            <div class="text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium">Post</button>
                    </div>
                </form>
                @if ($posts->count())
                    @foreach ($posts as $post)    
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
                    </div>
                    @endforeach
                    {{$posts->links()}}   
                @else
                    <p>there is no post</p>
                @endif
                
            </div>
        </div>

@endsection