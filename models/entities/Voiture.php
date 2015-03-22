<?php


class Voiture {
	protected $IDVoiture;
	protected $immatriculationVoiture;
	protected $marqueVoiture;
	protected $modeleVoiture;
	protected $imageVoiture;
	protected $assuranceVoiture;
	protected $contratAssuranceVoiture;
	
	function __construct($IDVoiture, $immatriculationVoiture, $marqueVoiture, $modeleVoiture, $imageVoiture,$assuranceVoiture, $contratAssuranceVoiture) {
        $this->IDVoiture = $IDVoiture;
        $this->immatriculationVoiture = $immatriculationVoiture;
        $this->marqueVoiture = $marqueVoiture;
        $this->modeleVoiture = $modeleVoiture;
        $this->imageVoiture = $imageVoiture;
        $this->assuranceVoiture = $assuranceVoiture;
        $this->contratAssuranceVoiture = $contratAssuranceVoiture;
    }
}

