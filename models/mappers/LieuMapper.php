<?php

class LieuMapper{

	function transform($array){
		return new Lieu($array['codeLieu'],$array['adresseLieu'],$array['villeLieu'],$array['codePostalLieu'],$array['longitudeLieu'],$array['latitudeLieu']);
	}
}