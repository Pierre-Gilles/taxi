<?php

class LieuMapper{

	function transform($array){
		if(!isset($array['longitudeLieu'])){
			$array['longitudeLieu'] = null;
		}

		if(!isset($array['latitudeLieu'])){
			$array['latitudeLieu'] = null;
		}
		return new Lieu($array['codeLieu'],$array['adresseLieu'],$array['villeLieu'],$array['codePostalLieu'],$array['longitudeLieu'],$array['latitudeLieu']);
	}
}