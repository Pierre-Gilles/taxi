<?php


class Lieu {
	protected $IDLieu;
	protected $adresseLieu;
	protected $villeLieu;
	protected $codePostalLieu;
	protected $longitudeLieu;
	protected $latitudeLieu;

	function __construct($adresseLieu, $villeLieu, $codePostalLieu, $longitudeLieu = null,$latitudeLieu = null,$IDLieu = null) {
        $this->IDLieu = $IDLieu;
        $this->adresseLieu = $adresseLieu;
        $this->villeLieu = $villeLieu;
        $this->codePostalLieu = $codePostalLieu;
        $this->longitudeLieu = $longitudeLieu;
        $this->latitudeLieu = $latitudeLieu;
    }

    /**
     * @return null
     */
    public function getIDLieu()
    {
        return $this->IDLieu;
    }

    /**
     * @param null $IDLieu
     */
    public function setIDLieu($IDLieu)
    {
        $this->IDLieu = $IDLieu;
    }

    /**
     * @return mixed
     */
    public function getAdresseLieu()
    {
        return $this->adresseLieu;
    }

    /**
     * @param mixed $adresseLieu
     */
    public function setAdresseLieu($adresseLieu)
    {
        $this->adresseLieu = $adresseLieu;
    }

    /**
     * @return mixed
     */
    public function getVilleLieu()
    {
        return $this->villeLieu;
    }

    /**
     * @param mixed $villeLieu
     */
    public function setVilleLieu($villeLieu)
    {
        $this->villeLieu = $villeLieu;
    }

    /**
     * @return mixed
     */
    public function getCodePostalLieu()
    {
        return $this->codePostalLieu;
    }

    /**
     * @param mixed $codePostalLieu
     */
    public function setCodePostalLieu($codePostalLieu)
    {
        $this->codePostalLieu = $codePostalLieu;
    }

    /**
     * @return null
     */
    public function getLongitudeLieu()
    {
        return $this->longitudeLieu;
    }

    /**
     * @param null $longitudeLieu
     */
    public function setLongitudeLieu($longitudeLieu)
    {
        $this->longitudeLieu = $longitudeLieu;
    }

    /**
     * @return null
     */
    public function getLatitudeLieu()
    {
        return $this->latitudeLieu;
    }

    /**
     * @param null $latitudeLieu
     */
    public function setLatitudeLieu($latitudeLieu)
    {
        $this->latitudeLieu = $latitudeLieu;
    }




}

