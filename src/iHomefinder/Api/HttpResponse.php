<?php

namespace iHomefinder\Api;

use Unirest\Response as UnirestResponse;

use \iHomefinder\Api\Exception\ApiException;
use \iHomefinder\Api\Exception\HttpException;

class HttpResponse {
	
	private $response;
	private $data;
	
	public function __construct(UnirestResponse $response) {
		$this->response = $response;
		$body = $response->raw_body;
		$data = json_decode($body);
		if(json_last_error() !== JSON_ERROR_NONE) {
			throw new HttpException("Invalid JSON");
		}
		$this->data = $data;
		if(property_exists($data, "errors")) {
			$errors = $data->errors;
			foreach($errors as $error) {
				$code = $error->code;
				$message = $error->message;
				$href = $error->href;
				throw new ApiException($message);
			}
		}
	}
	
	public function getData(): \stdClass {
		return $this->data;
	}
	
}