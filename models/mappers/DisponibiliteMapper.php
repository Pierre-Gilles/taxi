<?php

class DisponibiliteMapper{

	function transform($array){
		return new Disponibilite($array['codeDisponibilite'],$array['debutDisponibilite'],$array['finDisponibilite'],$array['dateDisponibilite']);
	}
}