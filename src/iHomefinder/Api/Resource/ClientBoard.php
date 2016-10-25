<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Authentication;

class ClientBoard extends Resource {
	
	public function __construct(Authentication $auth) {
		super($auth);
	}

	public function getId() {
		return $this->getter("id", "int");
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getClientId() {
		return $this->getter("clientId", "int");
	}
	
	public function setClientId($clientId): self {
		$this->setter("clientId", $clientId);
		return $this;
	}
	
	public function getBoardId() {
		return $this->getter("boardId", "string");
	}
	
	public function setBoardId($boardId): self {
		$this->setter("boardId", $boardId);
		return $this;
	}
	
	public function getAgentCode() {
		return $this->getter("agentCode", "string"); 
	}
	
	public function setAgentCode($agentCode): self {
		$this->setter("agentCode", $agentCode);
		return $this;
	}
	
	public function getOfficeCode() {
		return $this->getter("officeCode", "string"); 
	}
	
	public function setOfficeCode($officeCode): self {
		$this->setter("officeCode", $officeCode);
		return $this;
	}
	
	public function getClient(): Client {
		return $this->getter("client", Client::class);
	}
	
	public function setClient(Client $client): self {
		$this->setter("client", $client);
		return $this;
	}
	
	public function getBoard(): Board {
		return $this->getter("board", Board::class);
	}
	
	protected function getFieldNames(): array {
		return [
			"id",
			"clientId",
			"boardId",
			"agentCode",
			"officeCode"
		];
	}
	
}