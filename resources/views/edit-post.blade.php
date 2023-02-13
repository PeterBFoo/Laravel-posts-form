<x-app-layout>
    <x-slot name="header">
        <div class="d-flex">
            <div class="p-2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Posts') }}
                </h2>
                <h2 class="font-semibold text-lg text-gray-500 leading-tight"> {{__('post.update')}} </h2>
            </div>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="bg-white p-6 rounded-lg" method="post" action="/dashboard/post/update/{{$post->id}}">
                        @csrf
                        <label for="commentable">{{ __('post.commentable') }}</label>
                        <input class="w-1 border border-gray-400 p-2 rounded-lg" type="checkbox" name="commentable" id="commentable" value="{{$post->commentable}}">
                        <br>
                        <label for="expirable">{{ __('post.expires') }}</label>
                        <input class="w-1 border border-gray-400 p-2 rounded-lg" type="checkbox" name="expirable" id="expirable" value="{{$post->expirable}}">
                        <br>
                        <label>
                            <select class="w-48 border border-gray-400 p-2 rounded-lg" name="is_public">
                                <option value="1">{{ __('post.public') }}</option>
                                <option value="0">{{ __('post.private') }}</option>
                            </select>
                        </label>
                        <br>
                        <br>
                        <label class="block font-medium mb-2" for="title"> {{ __('post.title') }} </label>
                        <input class="w-full border border-gray-400 p-2 rounded-lg"
                               type="text" name="title" id="title" value="{{ $post->title }}"
                               placeholder="{{ __('post.ph_title') }}">
                        @if ($errors->has('title'))
                            <span class="invalid-feedback accent-red-600">
                            <strong>{{ __('post.required_field') }}</strong>
                            </span>
                        @endif
                        <label class="block font-medium mb-2 mt-4" for="subtitle"> {{ __('post.subtitle') }} </label>
                        <input class="w-full border border-gray-400 p-2 rounded-lg"
                               type="text" name="subtitle" id="subtitle" value="{{ $post->extract }}"
                               placeholder="{{ __('post.ph_subtitle') }}">
                        @if ($errors->has('subtitle'))
                            <span class="invalid-feedback accent-red-600">
                            <strong>{{ __('post.required_field') }}</strong>
                            </span>
                        @endif
                        <label class="block font-medium mb-2 mt-4" for="content"> {{ __('post.content') }} </label>
                        <input class="w-full border border-gray-400 p-2 rounded-lg" type="text"
                               name="content" id="content" value="{{ $post->content }}"
                               placeholder="{{ __('post.ph_content') }}">
                        @if ($errors->has('content'))
                            <span class="invalid-feedback accent-red-600">
                            <strong>{{ __('post.required_field') }}</strong>
                            </span>
                        @endif
                        <br>
                        <br>
                        <br>
                        <button class="bg-blue-500 hover:bg-blue-700 space-y-6 text-white font-bold py-2 px-4 rounded"> {{ __('post.publish') }}  </button>
                    </form>
                    <form action="{{ route("post.delete", $post->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="bg-blue-500 hover:bg-blue-700 space-y-6 text-white font-bold py-2 px-4 rounded" type="submit"> {{ __('post.delete') }} </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
