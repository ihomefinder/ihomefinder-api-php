<?php

namespace iHomefinder\Api;

use iHomefinder\Api\Exception\HttpException;
use iHomefinder\Api\Log;

class Request {
	
	private $url;
	private $method;
	private $parameters = [
		"debug" => true,
	];
	private $response;
	
	public function __construct() {
		
	}
	
	public function setUrl(string $url): self {
		$this->url = $url;
		return $this;
	}
	
	public function setMethod(string $method): self {
		$this->method = $method;
		return $this;
	}
	
	public function setParameters(array $parameters): self {
		foreach($parameters as $name => $value) {
			$this->parameters[$name] = $value;
		}
		return $this;
	}
	
	public function setParameter(string $name, $value): self {
		$this->parameters[$name] = $value;
		return $this;
	}
	
	public function addQuery(Query $query): self {
		if($query != null) {
			$query->loadRequest($this);
		}
		return $this;
	}
	
	/**
	 * @throws \iHomefinder\Api\Exception\HttpException
	 */
	public function getResponse(): Response {
		Log::info("request");
		$url = $this->url;
		if($this->method === "GET") {
			$url = $url . "?" . $this->buildQueryString();
		}
		$options = [
			CURLOPT_URL => $url,
			CURLOPT_CUSTOMREQUEST => $this->method,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_VERBOSE => true,
			CURLOPT_HEADER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_ENCODING => "",
			CURLOPT_USERAGENT => $this->getUserAgent(),
			CURLOPT_AUTOREFERER => true,
			CURLOPT_CONNECTTIMEOUT => 60,
			CURLOPT_TIMEOUT=> 60,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
		];
		if($this->method === "POST" || $this->method === "PUT") {
			$options[CURLOPT_POSTFIELDS] = $this->buildQueryString();
		}
		$ch = curl_init();
		curl_setopt_array($ch, $options);
		$message = null;
		Log::time(function() use($ch, &$message) {
			$message = curl_exec($ch);
		});
		if(curl_errno($ch)){
			throw new HttpException("cURL Error " . curl_error($ch));
		}
		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if($status >= 400) {
			throw new HttpException("HTTP Status " . $status);
		}
		curl_close($ch);
		$response = new Response($message);
		return $response;
	}
	
	private function getUserAgent(): string {
		return "Client API";
	}
	
	private function buildQueryString(): string {
		return http_build_query($this->parameters);
	}
	
}