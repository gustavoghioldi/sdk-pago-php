<?php
define ( 'VERSION', '0.1.0-GUS' );
define ( 'END_POINT', "http://200.69.248.51:8443/services/t/decidir.net/Authorize.AuthorizeHttpsSoap12Endpoint?wsdl" );
define ( 'OLD_END_POINT', "http://api.decidir.com.ar/services/Authorize" );
define ( 'ENCODING_METHOD', "UTF-8" );

class DecidirConnector {
	
	/*
	 * GET_PAYMENT_VALUES
	* */
	
	public function getPaymentValues($options) {
		//parseo de los valores enviados por el e-commerce/custompage par aformar el obj autorizereuest
		$authorizeRequest = $this->parseToAuthorizeRequest($options);
		
		//me lo devuelve desde el gate way, url , y unas coas mas (ojo muy importanes!!)
		$authorizeRequestResponse = $this->getAuthorizeRequestResponse($authorizeRequest);
		
		//me devuleve el array que me dio el gw
		$authorizeRequestResponseValues = $this->parseAuthorizeRequestResponseToArray($authorizeRequestResponse);
		
		return $authorizeRequestResponseValues;
	}
	
	private function parseToAuthorizeRequest($options) {
		$authorizeRequest = new stdClass();
		$authorizeRequest->Payload = $this->getPayload ($options);
		$authorizeRequest->URL_OK = $options['url_ok'];
		$authorizeRequest->URL_ERROR = $options['url_error'];
		$authorizeRequest->SessionID = $options['nrooperacion'];
		$authorizeRequest->EncodingMethod = $options['encodingmethod'];
		
		return $authorizeRequest;
	}
	
	//ver esta funcoion que es la que me va a trater el token
	private function getAuthorizeRequestResponse($authorizeRequest)
	{
		$clientSoap = new SoapClient(END_POINT);
		$authorizeRequestResponse = $clientSoap->AuthorizeRequest($authorizeRequest);
		return $authorizeRequestResponse;

		return $authorizeRequest;
	}
	
	private function parseAuthorizeRequestResponseToArray($authorizeRequestResponse) {
		
		$authorizeRequestResponseOptions = $array = json_decode(json_encode($authorizeRequestResponse), true);
		
		return $authorizeRequestResponseOptions;
	}
	
	//ver metodos del api de php para hacer esto
	private function getPayload($options) {
		$xmlPayload = "";		
		foreach ( $options as $key => $value ) {			
			$xmlPayload .= "<" . $key . ">" . $value . "</" . $key . ">";
		}
		
		return $xmlPayload;
	}
	
	
	
	/*
	 * QUERY_PAYMENT
	 * */
	
	public function queryPayment($SessionID, $RequestKey, $AnswerKey) {
		
		$authorizeAnswer = $this->parseToAuthorizeAnswer($SessionID, $RequestKey, $AnswerKey);
		
		//me lo devuelve desde el gate way, url , y unas coas mas (ojo muy importanes!!)
		$authorizeAnswerResponse = $this->getAuthorizeAnswerResponse($authorizeAnswer);
		
		//me devuleve el array que me dio el gw
		$authorizeAnswerResponseValues = $this->parseAuthorizeAnswerResponseToArray($authorizeAnswerResponse);
		
		return $authorizeAnswerResponseValues;
	}
	
	private function parseToAuthorizeAnswer($SessionID, $RequestKey, $AnswerKey) {
		
		$authorizeAnswer = new stdClass();
		
		$authorizeAnswer->SessionID = $SessionID;
		$authorizeAnswer->RequestKey = $RequestKey;
		$authorizeAnswer->AnswerKey = $AnswerKey;
		
		return $authorizeAnswer;
	}
	
	private function getAuthorizeAnswerResponse($authorizeAnswer) {
// 		$clientSoapAuthorizeAnswer = SoapClient (END_POINT);
// 		$authorizeAnswerResponse = $clientSoap->AuthorizeAnswer($authorizeAnswer);
		
		return $authorizeAnswer;
	}
	
	private function parseAuthorizeAnswerResponseToArray($authorizeAnswerResponse) {
		
		$authorizeAnswerResponseOptions = $array = json_decode(json_encode($authorizeAnswerResponse), true);
		
		return $authorizeAnswerResponseOptions;
	}
}