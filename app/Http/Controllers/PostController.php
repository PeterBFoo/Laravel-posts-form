<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $post = new Post();
        return $this->extracted($validated, $post, $request);
    }

    public function show($id)
    {
        $post = Post::find($id);
        $user = auth()->user();
        return view('post', ["post" => $post, "user" => $user]);
    }

    public function index() {
        $publicPosts = Post::all()->where('is_public', true);
        $userPosts = Post::all()->where('user_id', auth()->user()->id);
        $posts = $publicPosts->merge($userPosts);
        $posts = $posts->sortByDesc('created_at');
        return view('posts', ["posts" => $posts, "user" => auth()->user()]);
    }

    public function edit($id) {
        $post = Post::find($id);

        if (! Gate::allows('edit-post', $post)) {
            abort(403);
        } else {
            return view('edit-post', ["post" => $post]);
        }
    }

    public function update(StorePostRequest $request, $id) {
        $post = Post::find($id);

        if (! Gate::allows('update-post', $post)) {
            abort(403);
        } else {
            $validated = $request->validated();
            return $this->extracted($validated, $post, $request);
        }
    }

    public function destroy($id) {
        $post = Post::find($id);

        if (! Gate::allows('delete-post', $post)) {
            abort(403);
        } else {
            $post->delete();
            return redirect()->route('posts');
        }
    }

    /**
     * @param mixed $validated
     * @param $post
     * @param StorePostRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    private function extracted(mixed $validated, $post, StorePostRequest $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $post->title = $validated["title"];
        $post->extract = $validated["subtitle"];
        $post->content = $validated["content"];
        $post->user_id = $request->user()->id;
        $post->commentable = $request->has('commentable');
        $post->is_public = (bool)$validated["is_public"];
        $post->expires = $request->has('expirable');
        $post->save();

        return view('post', ["post" => $post, "user" => $request->user()]);
    }
}
