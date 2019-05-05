<?php

namespace BrandShop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BrandShop\Tag;

use Illuminate\Support\Facades\DB;




class TagController extends Controller{

	public function index(){
		$tags = Tag::all();

		return view("admin.tag.index", ["tags" => $tags]);
	}

	public function create(Request $request){
		$tag = new Tag();

		if ($request->isMethod('post')){
			$this->validateForm($request);

			$tag->name = $request->input("name");


			$tag->save();


			return redirect()->route("tag.index");
		}

		return view("admin.tag.create", ["model" => $tag, "form_url" => "tag.create"]);
	}

	public function update($id, Request $request){
		$tag = Tag::find($id);

		
		if ($tag && $request->isMethod('post')){
			$this->validateForm($request);

			$tag->name = $request->input("name");


			$tag->save();


			return redirect()->route("tag.index");
		}

		return view("admin.tag.update", ["model" => $tag, "form_url" => "tag.update"]);
	}

	public function delete($id){
		$tag = Tag::find($id);

		if($tag){
			$tag->delete();
		}

		return redirect()->route('tag.index');
	}

	protected function validateForm(Request $request){
		$request->validate([
			'name' => 'required|max:100|min:5',
		]);
	}

}
