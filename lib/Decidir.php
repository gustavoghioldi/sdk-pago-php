<?php
class DecidirConnector {
	
	private $arrayParametros = array ();
	
	public function __construct($arrayParametros) {
		$this->arrayParametros = $arrayParametros;
	}
	
	public function beginPayment() {
		
		$token = $this->getToken();
		
		switch ($this->arrayParametros ['urls'] ['redirectAuto']) {
			case TRUE :
				// redireccionar a la url que me mandan
				break;
			case FALSE :
				return $url;
				break;
			default :
				// ver que deccion tomo
				break;
		}
	}
	
	public function queryPayment(){
		//todo: confirma / consulta el pago
	}
	
	
	 private function getPayload() {
		$xmlPayload = "";
		
		foreach ( $this->arrayParametros as $key => $value ) {
			if ($key != 'urls') {
				foreach ( $this->arraParametros [$key] as $childKey => $childValue ) {
					if ($childKey != "nro_operacio") {
						$payloadString .= "<" . $childKey . ">" . $childValue . "</" . $childKey . ">";
					}
				}
			}
		}
		
		return $xmlPayload;
	}
	
	
	private function getToken() {
		$xmlPayload = $this->getPayload();
		$token = new SoapClient ( $wsdl, $xmlPayload );
		return $token;
	}
	
	
}