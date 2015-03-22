<?php

class VoitureMapper{

	function transform($array){
		return new Voiture($array['codeVoiture'],$array['immatriculationVoiture'],$array['marqueVoiture'],$array['modeleVoiture'],$array['imageVoiture'],$array['assuranceVoiture'],$array['contratAssuranceVoiture']);
	}
}

