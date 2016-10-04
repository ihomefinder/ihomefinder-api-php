<?php

namespace iHomefinder\Api;

use \Unirest\Request as UnirestRequest;
use \Unirest\Response as UnirestResponse;
use iHomefinder\Api\Exception\HttpException;

class HttpRequest {

	private $url;
	private $method;
	private $auth;
	private $headers = [];
	private $pathParameters = [];
	private $parameters = [];
	
	public function __construct(Authentication $auth) {
		$this->auth = $auth;
		$this->headers["User-Agent"] = Constants::USER_AGENT;
		if(Constants::DEBUG) {
			$this->parameters["debug"] = true;
		}
	}
	
	public function setUrl(string $url): self {
		$this->url = $url;
		return $this;
	}
	
	public function setMethod(string $method): self {
		$this->method = $method;
		return $this;
	}
	
	public function setPathParameters(array $pathParameters): self {
		$this->pathParameters = array_merge($this->pathParameters, $pathParameters);
		return $this;
	}
	
	public function setPathParameter(string $name, $value): self {
		$this->pathParameters[$name] = $value;
		return $this;
	}
	
	public function setParameters(array $parameters): self {
		$this->parameters = array_merge($this->parameters, $parameters);
		return $this;
	}
	
	public function setParameter(string $name, $value): self {
		$this->parameters[$name] = $value;
		return $this;
	}
	
	public function addQuery(Query $query): self {
		if($query !== null) {
			$query->loadRequest($this);
		}
		return $this;
	}
	
	public function getResponse(): HttpResponse {
		$debug = [
			"url" => $this->url,
			"method" => $this->method,
			"headers" => $this->headers,
			"parameters" => $this->parameters,
			"pathParameters" => $this->pathParameters,
		];
		Log::debug($debug);
		$httpResponse = null;
		try {
			switch($this->method) {
				case "GET":
					$httpResponse = $this->getRequest();
					break;
				case "POST":
					$httpResponse = $this->postRequest();
					break;
				case "PUT":
					$httpResponse = $this->putRequest();
					break;
				case "DELETE":
					$httpResponse = $this->deleteRequest();
					break;
			}
		} catch(UnirestException $e) {
			throw new HttpException($e);
		}
		$status = $httpResponse->code;
		if($status < 200 || $status > 299) {
			Log::debug($httpResponse->body);
			throw new HttpException("Status " + status);
		}
		return new HttpResponse($httpResponse);
	}
	
	private function getRequest(): UnirestResponse {
		UnirestRequest::auth($this->auth->getUsername(), $this->auth->getPassword());
		$url = $this->replacePathParameters($this->url);
		return UnirestRequest::get($this->url, $this->headers, $this->parameters);
	}
	
	private function postRequest(): UnirestResponse {
		UnirestRequest::auth($this->auth->getUsername(), $this->auth->getPassword());
		$url = $this->replacePathParameters($this->url);
		return UnirestRequest::post($this->url, $this->headers, $this->parameters);
	}
	
	private function putRequest(): UnirestResponse {
		UnirestRequest::auth($this->auth->getUsername(), $this->auth->getPassword());
		$url = $this->replacePathParameters($this->url);
		return UnirestRequest::put($this->url, $this->headers, $this->parameters);
	}
	
	private function deleteRequest(): UnirestResponse {
		UnirestRequest::auth($this->auth->getUsername(), $this->auth->getPassword());
		$url = $this->replacePathParameters($this->url);
		return UnirestRequest::delete($this->url, $this->headers, $this->parameters);
	}
	
	private function replacePathParameters(string $url): string {
		foreach($this->pathParameters as $name => $value) {
			$url = str_replace("{" . $name . "}", $value, $url);
		}
		return $url;
	}
	
}