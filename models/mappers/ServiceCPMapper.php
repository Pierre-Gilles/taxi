<?php

class ServiceCPMapper{

	function transform($array){
		return new ServiceCP($array['IDServiceCP'],$array['libelleServiceCP'],$array['prixServiceCP']);
	}
}

