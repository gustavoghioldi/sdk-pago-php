<?php
class Decidir {
	private $array_parametros = array ();
	public function __construct($array_parametros) {
		$this->array_parametros = $array_parametros;
	}
	public function MakePay() {
		return $url;
	}
	public function getPayload() {
		$test_array = array (/*aca array y vemos*/);
		$xml = new SimpleXMLElement ( '<root/>' );
		array_walk_recursive ( $test_array, array (
				$xml,
				'addChild' 
		) );
		print_r ( $xml->asXML () );
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