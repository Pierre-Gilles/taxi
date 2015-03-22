<?php


class Course {
	protected $IDCourse;
	protected $argentRapporteCourse;

	function __construct($IDCourse, $argentRapporteCourse) {
        $this->IDCourse = $IDCourse;
        $this->argentRapporteCourse = $argentRapporteCourse;
    }
}

