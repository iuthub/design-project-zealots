<?php

namespace BrandShop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BrandShop\Category;
use BrandShop\Traits\UploadTrait;


// GOT UPLOAD Trait FROM https://www.larashout.com/laravel-image-upload-made-easy

class CategoryController extends Controller{
	use UploadTrait;

	public function __construct(){
		$this->middleware('auth');
	}


	public function index(){
		$categories = Category::all();

		return view("admin.category.index", ["categories" => $categories]);
	}

	public function create(Request $request){
		$category = new Category();
		$categories = Category::all();


		if ($request->isMethod('post')){
			$this->validateForm($request, $category);

			$category->name = $request->input("name");
			$category->slug = $request->input("slug");
			$category->desc = $request->input("desc");
			$category->parent = $request->input("parent");

			if ($request->has('thumbnail')) {
				$category->thumbnail = $this->evalThumbnail($request);
			}

			$category->save();

			return redirect()->route("category.index");
		}

		return view("admin.category.create", ["model" => $category, "categories" => $categories, "form_url" => "category.create"]);
	}

	public function update($id, Request $request){
		$category = Category::find($id);
		$categories = Category::all();

		
		if ($category && $request->isMethod('post')){
			$this->validateForm($request, $category);


			$category->name = $request->input("name");
			$category->slug = $request->input("slug");
			$category->desc = $request->input("desc");
			$category->parent = $request->input("parent");

			if ($request->has('thumbnail')) {
				$category->thumbnail = $this->evalThumbnail($request);
			}


			$category->save();

			return redirect()->route("category.index");
		}

		return view("admin.category.update", ["model" => $category, "categories" => $categories, "form_url" => "category.update"]);
	}

	public function delete($id){
		$category = Category::find($id);

		if($category){
			$category->delete();
		}

		return redirect()->route('category.index');
	}

	protected function validateForm(Request $request, $model){
		$request->validate([
			'name' => 'required|max:100|min:5',
			'slug' => 'required|unique:category,slug,'.$model->id.'|max:20|min:5',
			"desc" => "required",
			'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:4096'
		]);
	}

	protected function evalThumbnail(Request $request){
		$image = $request->file('thumbnail');
		$name = str_slug($request->input('name')).'_'.time();
		$folder = '/uploads/images/';
		$filePath = $folder.$name.'.'.$image->getClientOriginalExtension();

		$this->uploadOne($image, $folder, 'public', $name);

		return $filePath;
	}


	
}
