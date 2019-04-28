<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Slider;
use App\Traits\UploadTrait;


// GOT UPLOAD Trait FROM https://www.larashout.com/laravel-image-upload-made-easy
class SliderController extends Controller{
	use UploadTrait;

	public function __construct(){
		$this->middleware('auth');
	}


	public function index(){
		$sliders = Slider::all();

		return view("admin.slider.index", ["sliders" => $sliders]);
	}

	public function create(Request $request){
		$slider = new Slider();

		if ($request->isMethod('post')){
			$this->validateForm($request, $slider);




			$slider->save();

			return redirect()->route("slider.index");
		}

		return view("admin.slider.create", ["model" => $slider, "form_url" => "slider.create"]);

	}

	public function update($id, Request $request){

	}

	public function delete($id){

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
