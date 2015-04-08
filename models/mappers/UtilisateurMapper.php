<?php

class UtilisateurMapper{

	function transform($array){
		return new Utilisateur($array['nomUtilisateur'],$array['prénomUtilisateur'],$array['mailUtilisateur'],$array['motdepasseUtilisateur'],$array['numeroTelUtilisateur'], $array['codeUtilisateur']);
	}
}