<?php

namespace Modules\Blog\Http\Controllers;

use App\Website;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Modules\Blog\Entities\Post;
use Modules\Blog\Forms\PostForm;

class PostController extends Controller
{
    use FormBuilderTrait;

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        if (\Illuminate\Support\Facades\Request::getHttpHost() === 'admin.atomsit.com') {
            $environment = app(\Hyn\Tenancy\Environment::class);
            $website = Website::query()
                ->where('uuid', \Request::segment(1))
                ->firstOrFail();
            $environment->tenant($website);
            $this->website = $website;
        }
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('blog::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Website $website)
    {
        $form = $this->form(PostForm::class, [
            'method' => 'POST',
            'url' => route('admin.blog.posts.store', ['website' => $website])
        ]);
        return view('blog::application.posts.model')
            ->with('form', $form);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $post = new Post([
            'title' => $request->title,
            'body' => $request->body
        ]);
        $post->save();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Website $website, Post $post)
    {
        $form = $this->form(PostForm::class, [
            'method' => 'PUT',
            'url' => route('admin.blog.posts.update', ['website' => $website, 'post' => $post]),
            'model' => $post
        ]);
        return view('blog::application.posts.model')
            ->with('form', $form);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Website $website, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
