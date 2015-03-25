<?php


class Lieu {
	protected $IDLieu;
	protected $adresseLieu;
	protected $villeLieu;
	protected $codePostalLieu;
	protected $longitudeLieu;
	protected $latitudeLieu;

	function __construct($IDLieu, $adresseLieu, $villeLieu, $codePostalLieu, $longitudeLieu,$latitudeLieu) {
        $this->IDLieu = $IDLieu;
        $this->adresseLieu = $adresseLieu;
        $this->villeLieu = $villeLieu;
        $this->codePostalLieu = $codePostalLieu;
        $this->longitudeLieu = $longitudeLieu;
        $this->latitudeLieu = $latitudeLieu;
    }


}

