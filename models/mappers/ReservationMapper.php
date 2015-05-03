<?php

/**
 * Class ReservationMapper
 */
class ReservationMapper{

    /**
     * @param $array
     * @return Reservation
     */
    function transform($array){
        if(!isset($array['IDReservation']))
        {
            $array['IDReservation'] = null;
        }
		return new reservation($array['datetimeCreation'],$array['IDChauffeur'],$array['IDUtilisateur'], $array['IDLieu'], $array['IDLieu_a_destination_de'], $array['IDVoiture'],$array['IDVoiture'], $array['datetimeReservation'], $array['datetimeReservation'], $array['course_IDcourse'], $array['slug'], $array['IDReservation'] );
	}
}