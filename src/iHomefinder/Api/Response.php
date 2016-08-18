<?php

namespace iHomefinder\Api;

use iHomefinder\Api\Exception\HttpException;
use iHomefinder\Api\Exception\ApiException;

class Response {
	
	private $version;
	private $status;
	private $headers;
	private $body;
	
	public function __construct(string $message) {
		list($headerText, $body) = explode("\r\n\r\n", $message, 2);
		$headers = [];
		foreach(explode("\r\n", $headerText) as $i => $line) {
			if($i === 0) {
				list($version, $status) = explode(" ", $line);
			} else {
				list($key, $value) = explode(": ", $line, 2);
				$headers[$key] = $value;
			}
		}
		if(empty($body)) {
			throw new HttpException("Empty response");
		}
		$this->version = $version;
		$this->status = (int) $status;
		$this->headers = $headers;
		$this->body = $body;
	}
	
	public function getVersion(): string {
		return $this->version;
	}
	
	public function getStatus(): int {
		return $this->status;
	}
	
	public function getHeaders(): array {
		return $this->headers;
	}
	
	public function getHeader(string $name): string {
		if(array_key_exists($name, $this->headers)) {
			return $this->headers[$name];
		}
	}

	public function getBody(): string {
		return $this->body;
	}
	
	public function getData(): \stdClass {
		$object = null;
		$contentType = $this->getHeader("Content-Type");
		if($contentType === "application/json") {
			$object = json_decode($this->body);
		} else {
			throw new ApiException("Unknown content type");
		}
		return $object;
	}
	
}