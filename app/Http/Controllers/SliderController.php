<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

use App\Slider;
use App\SliderItem;
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

			$slider->name = $request->input("name");
			$slider->slug = $request->input("slug");
			$slider->save();

			if($slider->id){
				foreach($request->file("media") as $index => $file){
					$item = new SliderItem();

					$item->url = $request->input("url.".$index);
					$item->slider_id = $slider->id;
					$item->image = $this->processImage($file);

					$item->save();
				}
			}
			return redirect()->route("slider.index");
		}

		return view("admin.slider.create", ["model" => $slider, "form_url" => "slider.create"]);

	}

	public function update($id, Request $request){
		$slider = Slider::find($id);

		if($slider){
			if ($request->isMethod('post')){

				$this->validateForm($request, $slider);

				$slider->name = $request->input("name");
				$slider->slug = $request->input("slug");
				$slider->save();

				if($slider->id){

					$delete_ids = $request->input("delete-ids");

					if($delete_ids){
						$delete_ids = explode(", ", $delete_ids);
						DB::table('slider_item')->whereIn('id', $delete_ids)->delete();
					}
					
					if($request->file("media")){
						foreach($request->file("media") as $index => $file){
							$item = new SliderItem();

							$item->url = $request->input("url.".$index);
							$item->slider_id = $slider->id;
							$item->image = $this->processImage($file);

							$item->save();
						}
					}


				}
				return redirect()->route("slider.index");
			}

			return view("admin.slider.update", ["model" => $slider, "form_url" => "slider.update"]);
		}


	}

	public function delete($id){
		$slider = Slider::find($id);

		if($slider){
			$slider->delete();
		}

		return redirect()->route('slider.index');
	}


	protected function validateForm(Request $request, $model){
		$validator = $request->validate([
			'name' => 'required|max:100|min:5',
			'slug' => 'required|unique:slider,slug,'.$model->id.'|max:20',
			"media.*" => "required|image",
			"url.*" => "required",
		]);

	}

	protected function processImage(UploadedFile $file){
		$name = $file->hashName();
		$name = (explode(".", $name)[0]).'_'.time();

		$folder = '/uploads/slider/';
		$filePath = $folder.$name.'.'.$file->getClientOriginalExtension();

		$this->uploadOne($file, $folder, 'public', $name);

		return $filePath;
	}


	
}
