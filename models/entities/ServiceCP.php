<?php


class ServiceCP {
	protected $IDServiceCP;
	protected $libelleServiceCP;
	protected $prixServiceCP;

	function __construct($libelleServiceCP, $prixServiceCP, $IDServiceCP = null) {
        $this->IDServiceCP = $IDServiceCP;
        $this->libelleServiceCP = $libelleServiceCP;
        $this->prixServiceCP = $prixServiceCP;
    }

    /**
     * @return mixed
     */
    public function getIDServiceCP()
    {
        return $this->IDServiceCP;
    }

    /**
     * @param mixed $IDServiceCP
     */
    public function setIDServiceCP($IDServiceCP)
    {
        $this->IDServiceCP = $IDServiceCP;
    }

    /**
     * @return mixed
     */
    public function getLibelleServiceCP()
    {
        return $this->libelleServiceCP;
    }

    /**
     * @param mixed $libelleServiceCP
     */
    public function setLibelleServiceCP($libelleServiceCP)
    {
        $this->libelleServiceCP = $libelleServiceCP;
    }

    /**
     * @return mixed
     */
    public function getPrixServiceCP()
    {
        return $this->prixServiceCP;
    }

    /**
     * @param mixed $prixServiceCP
     */
    public function setPrixServiceCP($prixServiceCP)
    {
        $this->prixServiceCP = $prixServiceCP;
    }
}

