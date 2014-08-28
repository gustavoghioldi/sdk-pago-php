<?php
define ( 'VERSION', '0.0.1-GUS' );
define ( 'END_POINT', "https://200.69.248.51:8443/services/t/decidir.net/Authorize.AuthorizeHttpsSoap12Endpoint" );
define ( 'OLD_END_POINT', "http://api.decidir.com.ar/services/Authorize" );


class DecidirConnector {
	private $options = array ();
	private function __construct($options = '') {
		$this->options = $options;
	}
	
	public function getPaymentValues() {
		
		return $authorizeRequestResponseValues;
	}
	private function parseAuthorizeRequest() {
		return $authorizeRequestOptions;
	}
	private function getAuthorizeRequest($authorizeRequestOptions) {
		$clientSoapAuthorizeRequest = new SoapClient ( END_POINT, $authorizeRequestOptions ['options'] );
		
		return $clientSoapAuthorizeRequest;
	}
	private function parseAuthorizeRequestResponse($clientSoapAuthorizeRequest) {
		return $authorizeRequestResponseOptions;
	}
	private function getPayload() {
		$xmlPayload = "";
		
		foreach ( $this->options as $key => $value ) {
			if ($key != 'urls') {
				foreach ( $this->options [$key] as $childKey => $childValue ) {
					if ($childKey != "nro_operacio") {
						$payloadString .= "<" . $childKey . ">" . $childValue . "</" . $childKey . ">";
					}
				}
			}
		}
		
		return $xmlPayload;
	}
	public function queryPayment($SessionID, $RequestKey, $AnswerKey) {
		return $authorizeAnswerRequestResponseValues;
	}
	private function parseAuthorizeAnswer() {
		return $authorizeAnswerRequestValues;
	}
	private function getAuthorizeAnswer() {
		$clientSoapAuthorizeAnswer = SoapClient ();
	}
	private function parseAuthorizeAnswerResponse($clientSoapAuthorizeAnswer) {
	}
}