<?php

namespace BrandShop;


class Chuck
{


	public static function getRandomQuote(){
		$curl_handle=curl_init();

		curl_setopt($curl_handle,CURLOPT_URL,'https://api.chucknorris.io/jokes/random');
		curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
		curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
		$buffer = curl_exec($curl_handle);
		curl_close($curl_handle);

		if (empty($buffer)){
			return null;
		}else{
			$buffer = json_decode($buffer);

			return $buffer->value;
		}


	}


}