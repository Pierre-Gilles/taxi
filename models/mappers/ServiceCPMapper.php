<?php

class ServiceCPMapper{

	function transform($array){
		return new ServiceCP($array['codeServiceCP'],$array['libelleServiceCP'],$array['prixServiceCP']);
	}
}

	