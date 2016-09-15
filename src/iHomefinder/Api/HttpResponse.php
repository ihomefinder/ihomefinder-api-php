<?php

namespace iHomefinder\Api;

use Unirest\Response as UnirestResponse;

use \iHomefinder\Api\Exception\ApiException;
use \iHomefinder\Api\Exception\HttpException;

class HttpResponse {
	
	private $response;
	private $object;
	
	public function HttpResponse(UnirestResponse $response) {
		$this->response = $response;
		$body = $response->getBody();
		try {
			JSONObject json = new JSONObject(body);
			object = new JsonObjectToMap(json)->getResults();
			List<Map<String, Object>> errors = (List<Map<String, Object>>) object->get("errors");
			if(errors != null && !errors->isEmpty()) {
				for(Map<String, Object> error : errors) {
					Integer code = (Integer) error->get("code");
					String message = (String) error->get("message");
					String href = (String) error->get("href");
					throw new ApiException(message);
				}
			}
		} catch (JSONException e) {
			throw new HttpException(e);
		}
	}
	
	public function Map<String, Object> getData() {
		return $this->object;
	}
	
}