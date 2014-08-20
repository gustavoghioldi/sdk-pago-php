<?php
class Decidir {
	
	private $array_parametros = array ();
	
	public function __construct($array_parametros) {
		$this->array_parametros = $array_parametros;
	}
	
	public function makePay() {
		switch ($this->array_parametros ['urls'] ['redirect_auto']) {
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
	
	
	 private function getPayload() {
		$xml_payload = "";
		
		foreach ( $this->array_parametros as $key => $value ) {
			if ($key != 'urls') {
				foreach ( $this->array_parametros [$key] as $child_key => $child_value ) {
					if ($child_key != "nro_operacio") {
						$payload_string .= "<" . $child_key . ">" . $child_value . "</" . $child_key . ">";
					}
				}
			}
		}
		
		return $xml_payload;
	}
	
	private function getXml() {
		$payload = $this->getPayload ();
		return $xml;
	}
	
	private function getToken() {
		$token = new SoapClient ( $wsdl, $xml );
		return $token;
	}
	
	
}