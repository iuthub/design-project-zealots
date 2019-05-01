<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;
use App\ProductImage;
use App\Traits\UploadTrait;
use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\DB;



// GOT UPLOAD Trait FROM https://www.larashout.com/laravel-image-upload-made-easy

class ProductController extends Controller{
	use UploadTrait;

	public function __construct(){
		$this->middleware('auth');
	}


	public function index(){
		$products = Product::all();

		return view("admin.product.index", ["products" => $products]);
	}

	public function create(Request $request){
		$product = new Product();
		$categories = Category::all();


		if ($request->isMethod('post')){
			$this->validateForm($request);

			$product->name = $request->input("name");
			$product->price = $request->input("price");
			$product->category_id = $request->input("category_id");
			$product->desc = $request->input("desc");

			$product->save();


			if ($request->has('images')) {
				foreach($request->file("images") as $index => $file){
					$image = new ProductImage();

					$image->title = $request->input("title.".$index);
					$image->product_id = $product->id;
					$image->url = $this->processImage($file);
					$image->caption = $request->input("caption.".$index);

					$image->save();
				}
			}



			return redirect()->route("product.index");
		}

		return view("admin.product.create", ["model" => $product, "categories" => $categories, "form_url" => "product.create"]);
	}

	public function update($id, Request $request){
		$product = Product::find($id);
		$categories = Category::all();

		
		if ($product && $request->isMethod('post')){
			$this->validateForm($request);

			$product->name = $request->input("name");
			$product->price = $request->input("price");
			$product->category_id = $request->input("category_id");
			$product->desc = $request->input("desc");

			$product->save();

			$delete_ids = $request->input("delete-ids");

			if($delete_ids){
				$delete_ids = explode(", ", $delete_ids);
				DB::table('product_image')->whereIn('id', $delete_ids)->delete();
			}

			if ($request->has('images')) {
				foreach($request->file("images") as $index => $file){

					$image = new ProductImage();

					$image->title = $request->input("title.".$index);
					$image->product_id = $product->id;
					$image->url = $this->processImage($file);
					$image->caption = $request->input("caption.".$index);

					$image->save();
				}
			}

			return redirect()->route("product.index");
		}

		return view("admin.product.update", ["model" => $product, "categories" => $categories, "form_url" => "product.update"]);
	}

	public function delete($id){
		$product = Product::find($id);

		if($product){
			$product->delete();
		}

		return redirect()->route('product.index');
	}

	protected function validateForm(Request $request){
		$request->validate([
			'name' => 'required|max:100|min:5',
			'price' => 'required',
			"category_id" => "required|numeric|gte:0",
			"desc" => "required",
		]);
	}

	protected function processImage(UploadedFile $file){

		$name = $file->hashName();
		$name = (explode(".", $name)[0]).'_'.time();

		$folder = '/uploads/product/';
		$filePath = $folder.$name.'.'.$file->getClientOriginalExtension();

		$this->uploadOne($file, $folder, 'public', $name);

		return $filePath;
	}

}
