<x-app-layout>
    <x-slot name="header">
        <div class="d-flex">
            <div class="p-2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    @if($user->id == $post->user_id)
                        {{ __('post.your_post') }}
                    @else
                    {{$post->user->name . "'s post"}}
                    @endif
                </h2>
            </div>
        </div>

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>{{ __('post.created_at') }}: {{ $post->created_at }}</h3>
                    <br>
                    <strong>
                        <h1>{{ __('post.title') }}</h1>
                    </strong>
                    <h1>{{ $post->title }}</h1>
                    <br>
                    <br>
                    <strong>
                        <h2>{{ __('post.subtitle') }}</h2>
                    </strong>
                    <h2>{{ $post->extract }}</h2>
                    <br>
                    <br>
                    <strong>
                        <h3>{{ __('post.content') }}</h3>
                    </strong>
                    <p>{{ $post->content }}</p>
                    <br>
                    @if ($user->id == $post->user_id)
                        <ul>
                            <li> {{$post->commentable ? "Is commentable" : "Is not commentable"}}</li>
                            <li> {{$post->expires ? "Is expirable" : "Is not expirable"}}</li>
                            <li> {{$post->is_public ? "Your publication is public" : "Your publication is private"}}</li>
                        </ul>
                        <br>
                        <br>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="Edit post">
                            <a href="{{ route('edit-post', $post->id) }}">{{ __('post.edit') }}</a>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
