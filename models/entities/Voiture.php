<?php


class Voiture {
	protected $IDVoiture;
	protected $immatriculationVoiture;
	protected $marqueVoiture;
	protected $modeleVoiture;
	protected $assuranceVoiture;
	protected $contratAssuranceVoiture;
	protected $imageVoiture;

	function __construct($IDVoiture, $immatriculationVoiture, $marqueVoiture, $modeleVoiture,$assuranceVoiture, $contratAssuranceVoiture, $imageVoiture) {
        $this->IDVoiture = $IDVoiture;
        $this->immatriculationVoiture = $immatriculationVoiture;
        $this->marqueVoiture = $marqueVoiture;
        $this->modeleVoiture = $modeleVoiture;
        $this->assuranceVoiture = $assuranceVoiture;
        $this->contratAssuranceVoiture = $contratAssuranceVoiture;
        $this->imageVoiture = $imageVoiture;
    }
}

