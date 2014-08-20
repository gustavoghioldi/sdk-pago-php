<?php
class Decidir {
	private $array_parametros = array ();
	public function __construct($array_parametros) {
		$this->array_parametros = $array_parametros;
	}
	public function MakePay() {
		return $url;
	}
	
	// todo: cambiar a privado
	public function getPayload() {
		$xml_string = "";
		
		foreach ( $this->array_parametros as $key => $value ) {
			if ($key != 'urls') {
				foreach ( $this->array_parametros [$key] as $child_key => $child_value ) {
					$xml_string .= "<" . $child_key . ">" . $child_value . "</" . $child_key . ">";
				}
				;
			}
		}
		
		return $xml_string;
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