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

    /**
     * @return mixed
     */
    public function getIDVoiture()
    {
        return $this->IDVoiture;
    }

    /**
     * @param mixed $IDVoiture
     */
    public function setIDVoiture($IDVoiture)
    {
        $this->IDVoiture = $IDVoiture;
    }

    /**
     * @return mixed
     */
    public function getImmatriculationVoiture()
    {
        return $this->immatriculationVoiture;
    }

    /**
     * @param mixed $immatriculationVoiture
     */
    public function setImmatriculationVoiture($immatriculationVoiture)
    {
        $this->immatriculationVoiture = $immatriculationVoiture;
    }

    /**
     * @return mixed
     */
    public function getMarqueVoiture()
    {
        return $this->marqueVoiture;
    }

    /**
     * @param mixed $marqueVoiture
     */
    public function setMarqueVoiture($marqueVoiture)
    {
        $this->marqueVoiture = $marqueVoiture;
    }

    /**
     * @return mixed
     */
    public function getModeleVoiture()
    {
        return $this->modeleVoiture;
    }

    /**
     * @param mixed $modeleVoiture
     */
    public function setModeleVoiture($modeleVoiture)
    {
        $this->modeleVoiture = $modeleVoiture;
    }

    /**
     * @return mixed
     */
    public function getImageVoiture()
    {
        return $this->imageVoiture;
    }

    /**
     * @param mixed $imageVoiture
     */
    public function setImageVoiture($imageVoiture)
    {
        $this->imageVoiture = $imageVoiture;
    }

    /**
     * @return mixed
     */
    public function getAssuranceVoiture()
    {
        return $this->assuranceVoiture;
    }

    /**
     * @param mixed $assuranceVoiture
     */
    public function setAssuranceVoiture($assuranceVoiture)
    {
        $this->assuranceVoiture = $assuranceVoiture;
    }

    /**
     * @return mixed
     */
    public function getContratAssuranceVoiture()
    {
        return $this->contratAssuranceVoiture;
    }

    /**
     * @param mixed $contratAssuranceVoiture
     */
    public function setContratAssuranceVoiture($contratAssuranceVoiture)
    {
        $this->contratAssuranceVoiture = $contratAssuranceVoiture;
    }


}

