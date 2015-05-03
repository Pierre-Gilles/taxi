<?php

class ServiceCPMapper{

	function transform($array){
		if(!isset($array['IDServiceCP'])){
			$array['IDServiceCP'] = null;
		}

		return new ServiceCP($array['libelleServiceCP'],$array['prixServiceCP'], $array['IDServiceCP']);
	}
}

