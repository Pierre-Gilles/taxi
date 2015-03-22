<?php

class ReservationMapper{

	function transform($array){
		return new Reservation($array['codeReservation'],$array['datetimeReservation'],$array['datetimeCreation']);
	}
}

	