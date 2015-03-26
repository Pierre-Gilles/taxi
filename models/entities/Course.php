<?php


class Course {
	protected $IDCourse;
	protected $argentRapporteCourse;

	function __construct($IDCourse, $argentRapporteCourse) {
        $this->IDCourse = $IDCourse;
        $this->argentRapporteCourse = $argentRapporteCourse;
    }

    /**
     * @return mixed
     */
    public function getIDCourse()
    {
        return $this->IDCourse;
    }

    /**
     * @param mixed $IDCourse
     */
    public function setIDCourse($IDCourse)
    {
        $this->IDCourse = $IDCourse;
    }

    /**
     * @return mixed
     */
    public function getArgentRapporteCourse()
    {
        return $this->argentRapporteCourse;
    }

    /**
     * @param mixed $argentRapporteCourse
     */
    public function setArgentRapporteCourse($argentRapporteCourse)
    {
        $this->argentRapporteCourse = $argentRapporteCourse;
    }


}

