<?php


class Reservation {
	protected $IDReservation;
	protected $datetimeReservation;
	protected $datetimeCreation;

	function __construct($IDReservation, $datetimeReservation, $datetimeCreation) {
        $this->IDReservation = $IDReservation;
        $this->datetimeReservation = $datetimeReservation;
        $this->datetimeCreation = $datetimeCreation;
    }
}

