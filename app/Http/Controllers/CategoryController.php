<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;

class CategoryController extends Controller{

	public function __construct(){
		$this->middleware('auth');
	}


	public function index(){
		$categories = Category::all();

		return view("admin.category.index", ["categories" => $categories]);
	}

	public function create(Request $request){
		$category = new Category();

		if ($request->isMethod('post')){
			$validatedData = $request->validate([
				'name' => 'required|max:100|min:5',
				'slug' => 'required|unique:category|max:20|min:5',
				"desc" => "required"
			]);

			$category->name = $request->input("name");
			$category->slug = $request->input("slug");
			$category->desc = $request->input("desc");

			$category->save();

			return redirect()->route("category.index");
		}

		return view("admin.category.create", ["model" => $category]);
	}

	public function update($id, Request $request){
		$category = Category::find($id);

		if ($category && $request->isMethod('post')){
			$validatedData = $request->validate([
				'name' => 'required|max:100|min:5',
				'slug' => 'required|unique:category,slug,'.$category->id.'|max:20|min:5',
				"desc" => "required"
			]);

			$category->name = $request->input("name");
			$category->slug = $request->input("slug");
			$category->desc = $request->input("desc");

			$category->save();

			return redirect()->route("category.index");
		}

		return view("admin.category.update", ["model" => $category]);
	}

	public function delete($id){
		$category = Category::find($id);

		if($category){
			$category->delete();
		}

		return redirect()->route('category.index');
	}


	
}
