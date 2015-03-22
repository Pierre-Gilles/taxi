<?php

class CourseMapper{

	function transform($array){
		return new Course($array['codeCourse'],$array['argentRapporteCourse']);
	}
}
