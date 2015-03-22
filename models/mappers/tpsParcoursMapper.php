<?php

class tpsParcoursMapper{

	function transform($array){
		return new tpsParcours($array['datetimeParcours'],$array['tpsParcours']);
	}
}
