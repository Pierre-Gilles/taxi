<?php


class ServiceCP {
	protected $IDServiceCP;
	protected $libelleServiceCP;
	protected $prixServiceCP;

	function __construct($IDServiceCP, $libelleServiceCP, $prixServiceCP) {
        $this->IDServiceCP = $IDServiceCP;
        $this->libelleServiceCP = $libelleServiceCP;
        $this->prixServiceCP = $prixServiceCP;
    }
}

