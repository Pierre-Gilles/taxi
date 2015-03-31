<?php
	
class DisponibiliteRepository{

	protected $db;

	final public function __construct(Connection $db) {
       	$this->db = $db;
    }   
}
