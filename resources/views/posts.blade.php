<x-app-layout>
    <x-slot name="header">
        <div class="d-flex">
            <div class="p-2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Posts') }}
                </h2>
            </div>
        </div>

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        @if($posts->isEmpty())
                            <li class="text-lg">
                                <strong>
                                    {{ __('post.no_posts') }}
                                </strong>
                            </li>
                        @endif
                        @if($posts->isNotEmpty())
                            <li class="text-lg">
                                <strong>
                                    {{ __('post.your_posts') }}
                                </strong>
                            </li>
                        @endif
                            <br>
                        @foreach ($posts as $post)
                            @if($user->id == $post->user_id)
                                <li class="text-lg">
                                    <strong>
                                        <a href="/dashboard/post/{{ $post->id }}">
                                            {{ $post->title }}
                                        </a>
                                    </strong>
                                </li>
                            @endif
                        @endforeach
                            <br>
                        @if($posts->isNotEmpty())
                            <li class="text-lg">
                                <strong>
                                    {{ __('post.other_posts') }}
                                </strong>
                            </li>
                        @endif
                            <br>
                        @foreach($posts as $post)
                            @if($user->id != $post->user_id)
                                <li class="text-lg">
                                    <strong>
                                        <a href="/dashboard/post/{{ $post->id }}">
                                            {{ $post->title }}
                                        </a>
                                    </strong>
                                    Created by {{ $post->user->name }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
