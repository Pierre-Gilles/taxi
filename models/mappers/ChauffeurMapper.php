<?php

class ChauffeurMapper{

	function transform($array){
		return new Chauffeur($array['codeChauffeur'],$array['nomChauffeur'],$array['prenomChauffeur'],$array['mailChauffeur'],$array['motdepasseChauffeur'],$array['estPatron'], $array['numeroTelChauffeur']);
	}
}

	