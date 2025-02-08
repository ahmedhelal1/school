<?php

namespace App\Services;

use \App\Models\Grade;

class GradeService
{
    public function getGrades()
    {
        return Grade::all();
    }
    public function getGrade($id)
    {
        return Grade::find($id);
    }
    public function createGrade($data)
    {
        return Grade::create($data);
    }
    public function updateGrade($id, $data)
    {
        $grade = $this->getGrade($id);
        $grade->updated($data);
        return $grade;
    }
    public function deleteGrade($id)
    {
        $grade = $this->getGrade($id);
        $grade->deleted();
        return true;
    }
}
