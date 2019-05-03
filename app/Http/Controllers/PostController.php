<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\UploadTrait;
use Illuminate\Http\UploadedFile;

use App\Post;
use Illuminate\Support\Facades\DB;



// GOT UPLOAD Trait FROM https://www.larashout.com/laravel-image-upload-made-easy

class PostController extends Controller{
	use UploadTrait;

	public function __construct(){
		$this->middleware('auth');
	}


	public function index(){
		$posts = Post::all();

		return view("admin.post.index", ["posts" => $posts]);
	}


	public function create(Request $request){
		$post = new Post();

		if ($request->isMethod('post')){
			$this->validateForm($request, $post);

			$post->title = $request->input("title");
			$post->slug = $request->input("slug");
			$post->content = $request->input("content");


			if ($request->has('thumbnail')) {
				$post->thumbnail = $this->evalThumbnail($request);
			}

			$post->save();



			return redirect()->route("post.index");
		}

		return view("admin.post.create", ["model" => $post, "form_url" => "post.create"]);
	}


	public function update($id, Request $request){
		$post = Post::find($id);

		
		if ($post && $request->isMethod('post')){
			$this->validateForm($request, $post);

			$post->title = $request->input("title");
			$post->slug = $request->input("slug");
			$post->content = $request->input("content");


			if ($request->has('thumbnail')) {
				$post->thumbnail = $this->evalThumbnail($request);
			}

			$post->save();

			return redirect()->route("post.index");
		}

		return view("admin.post.update", ["model" => $post, "form_url" => "post.update"]);
	}

	public function delete($id){
		$post = Post::find($id);

		if($post){
			$post->delete();
		}

		return redirect()->route('post.index');
	}

	protected function validateForm(Request $request, $model){
		$request->validate([
			'title' => 'required|max:100|min:5',
			'slug' => 'required|unique:post,slug,'.$model->id.'|max:20|min:5',
			"content" => "required",
		]);
	}


	protected function evalThumbnail(Request $request){
		$image = $request->file('thumbnail');
		$name = str_slug($request->input('name')).'_'.time();
		$folder = '/uploads/post/';
		$filePath = $folder.$name.'.'.$image->getClientOriginalExtension();

		$this->uploadOne($image, $folder, 'public', $name);

		return $filePath;
	}

}
