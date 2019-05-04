<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\UploadTrait;
use Illuminate\Http\UploadedFile;

use App\Review;
use App\Post;

use Illuminate\Support\Facades\DB;



class ReviewController extends Controller{

	public function index(){
		$reviews = Review::all();

		return view("admin.review.index", ["reviews" => $reviews]);
	}


	public function create($id, Request $request){
		$review = new Review();

		if ($request->isMethod('post')){

			$review->comment = $request->input("comment");
			$review->product_id = $id;
			$review->rating = $request->input("rating");

			if(Auth::check()){
				$review->user_id = Auth::id();
				$review->status = Review::PUBLISHED;
			}else{
				$review->name = $request->input("name");
				$review->email = $request->input("email");
				$review->phone = $request->input("phone");
			}

			$review->save();

			return redirect()->route("site.product", ["id" => $id]);
		}

		return;
	}


	public function update($id, Request $request){
		$review = Review::find($id);

		if ($request->isMethod('post')){

			$review->comment = $request->input("comment");
			$review->rating = $request->input("rating");
			$review->status = $request->input("status");

			if($review->user_id){
				$review->name = $request->input("name");
				$review->email = $request->input("email");
				$review->phone = $request->input("phone");
			}


			$review->save();

			return redirect()->route("review.index");
		}

		return view("admin.review.update", ["model" => $review, "statuses" => Review::$statuses, "form_url" => "review.update"]);
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
