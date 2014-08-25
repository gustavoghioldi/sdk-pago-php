<?php
class DecidirConnector {
	
	private $parameters = array ();
	private function __construct($arrayParametros) {
		$this->parameters = $parameters;
	}
	
	public function beginPayment() {
		$authorizeRequestParameters = $this->parseAuthorizeRequest (); // parsea la informacion pasada por el usuario
		$clientSoapAuthorizeRequest = $this->getAuthorizeRequest ( $authorizeRequestParameters ); // comunica con el Soap Client y obtine un respuesta
		$authorizeRequestResponseParameters = $this->parseAuthorizeRequestResponse ( $clientSoapAuthorizeRequest ); // parsea la respuesta del Soap Client
		
		$URL_Request = $authorizeRequestResponseParameters ['URL_Request'];
		
		return $URL_Request;
	}
	private function parseAuthorizeRequest() {
		return $authorizeRequestParameters;
	}
	private function getAuthorizeRequest($authorizeRequestParameters) {
		$clientSoapAuthorizeRequest = new SoapClient ( $authorizeRequestParameters ['wsdl'], $authorizeRequestParameters ['options'] );
		
		return $clientSoapAuthorizeRequest;
	}
	private function parseAuthorizeRequestResponse($clientSoapAuthorizeRequest) {
		return $authorizeRequestResponseParameters;
	}
	private function getPayloadAux() {
		$xmlPayload = "";
		
		foreach ( $this->parameters as $key => $value ) {
			if ($key != 'urls') {
				foreach ( $this->parameters [$key] as $childKey => $childValue ) {
					if ($childKey != "nro_operacio") {
						$payloadString .= "<" . $childKey . ">" . $childValue . "</" . $childKey . ">";
					}
				}
			}
		}
		
		return $xmlPayload;
	}
	
	public function queryPayment();
	private function parseAuthorizeAnswer();
	private function getAuthorizeAnswer();
	private function parseAuthorizeAnswerResponse();

	//singleton
	protected static $instancia;
	public static function getInstance() {
		if (! self::$instancia instanceof self) {
			self::$instancia = new self ();
		}
		return self::$instancia;
	}
}