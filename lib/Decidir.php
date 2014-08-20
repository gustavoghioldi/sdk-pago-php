<?php
class Decidir {
	
	private $array_parametros = array();
	
	public function __construct($array_parametros) {
		$this->array_parametros = $array_parametros;
	}
	public function MakePay() {
		return $url;
	}
	
	//todo: cambiar a privado
	public function getPayload() {	
		$xml = new SimpleXMLElement ( '<root/>' );
		array_walk_recursive ( $this->array_parametros, array (
				$xml,
				'addChild' 
		) );
		
		$xml_return = "";
		
		foreach ( $xml as $key => $val ) {
			$xml_return .= "<" . $val . ">" . $key . "</" . $val . ">";
		}
		
		return $xml_return;
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