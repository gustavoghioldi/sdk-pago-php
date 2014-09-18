<?php
define ( 'VERSION', '0.1.0-GUS' );
define ( 'WSDL', "Authorizev22.wsdl" );
define ( 'END_POINT', "https://200.69.248.51:8443/services/t/decidir.net/Authorize" );
define ('END_POINT_TEST', "");
define ( 'ENCODING_METHOD', "UTF-8" );
define ( 'CERT', "certificado.pem" );
class DecidirConnector {
	
	/*
	 * configuraciones opcionales
	 */
	
	/*
	 * GET_PAYMENT_VALUES
	 */
	public function getPaymentValues($options) {
		// parseo de los valores enviados por el e-commerce/custompage par aformar el obj autorizereuest
		$authorizeRequest = $this->parseToAuthorizeRequest ( $options );
		
		// me lo devuelve desde el gate way, url , y unas coas mas (ojo muy importanes!!)
		$authorizeRequestResponse = $this->getAuthorizeRequestResponse ( $authorizeRequest );
		
		// me devuleve el array que me dio el gw
		$authorizeRequestResponseValues = $this->parseAuthorizeRequestResponseToArray ( $authorizeRequestResponse );
		
		return $authorizeRequestResponseValues;
	}
	private function parseToAuthorizeRequest($options) {
		$authorizeRequest = new stdClass ();
		$authorizeRequest->Payload = $this->getPayload ( $options );
		$authorizeRequest->URL_OK = $options ['url_ok'];
		$authorizeRequest->URL_ERROR = $options ['url_error'];
		$authorizeRequest->SessionID = $options ['nrooperacion'];
		$authorizeRequest->EncodingMethod = $options ['encodingmethod'];
		$authorizeRequest->Merchant = null;
		return $authorizeRequest;
	}
	
	// ver esta funcoion que es la que me va a trater el token
	private function getClientSoap() {
		$clientSoap = new SoapClient ( WSDL, array (
				"connection_timeout" => 1000,
				'local_cert' => CERT,
				'style' => SOAP_DOCUMENT,
				'use' => SOAP_LITERAL,
				'location' => END_POINT,
				'encoding' => 'UTF-8',
				'proxy_host' => '192.168.0.17',
				'proxy_port' => 8080 
		// // 'proxy_login' => 'gghioldi',
		// // 'proxy_password' => '1270pesecin'
				) );
		
		return $clientSoap;
	}
	
	private function getAuthorizeRequestResponse($authorizeRequest) {
		$clientSoap = $this->getClientSoap ();
		$authorizeRequestResponse = $clientSoap->AuthorizeRequest ( $authorizeRequest );
		return $authorizeRequestResponse;
	}
	
	private function parseAuthorizeRequestResponseToArray($authorizeRequestResponse) {
		$authorizeRequestResponseOptions = $array = json_decode ( json_encode ( $authorizeRequestResponse ), true );
		
		return $authorizeRequestResponseOptions;
	}
	
	// ver metodos del api de php para hacer esto
	private function getPayload($options) {
		$xmlPayload = "";
		foreach ( $options as $key => $value ) {
			$xmlPayload .= "<" . $key . ">" . $value . "</" . $key . ">";
		}
		
		return $xmlPayload;
	}
	
	/*
	 * QUERY_PAYMENT
	 */
	public function queryPayment($SessionID, $RequestKey, $AnswerKey) {
		$authorizeAnswer = $this->parseToAuthorizeAnswer ( $SessionID, $RequestKey, $AnswerKey );
		
		// me lo devuelve desde el gate way, url , y unas coas mas (ojo muy importanes!!)
		$authorizeAnswerResponse = $this->getAuthorizeAnswerResponse ( $authorizeAnswer );
		
		// me devuleve el array que me dio el gw
		$authorizeAnswerResponseValues = $this->parseAuthorizeAnswerResponseToArray ( $authorizeAnswerResponse );
		
		return $authorizeAnswerResponseValues;
	}
	private function parseToAuthorizeAnswer($SessionID, $RequestKey, $AnswerKey) {
		$authorizeAnswer = new stdClass ();
		
		$authorizeAnswer->SessionID = $SessionID;
		$authorizeAnswer->RequestKey = $RequestKey;
		$authorizeAnswer->AnswerKey = $AnswerKey;
		
		return $authorizeAnswer;
	}
	private function getAuthorizeAnswerResponse($authorizeAnswer) {
		// $clientSoapAuthorizeAnswer = SoapClient (END_POINT);
		// $authorizeAnswerResponse = $clientSoap->AuthorizeAnswer($authorizeAnswer);
		return $authorizeAnswer;
	}
	private function parseAuthorizeAnswerResponseToArray($authorizeAnswerResponse) {
		$authorizeAnswerResponseOptions = $array = json_decode ( json_encode ( $authorizeAnswerResponse ), true );
		
		return $authorizeAnswerResponseOptions;
	}
}