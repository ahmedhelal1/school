<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GradeResource;
use App\Services\GradeService;
use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{

    use ApiResponseTrait;
    protected $gradeService;
    public function __construct(GradeService $gradeService)
    {
        $this->gradeService = $gradeService;
    }
    public function index()
    {
        // $grades = Grade::all();
        $grades = GradeResource::collection(Grade::all());
        // return $this->api_response($grades, 200, "OK");
        return $grades;
    }
    /////////////////////////////////
    public function show($id)
    {
        // $grade = Grade::Find($id);
        //or
        $grade = new GradeResource(Grade::findOrFail($id));

        return $grade;

        // if ($grade) {
        //     return $this->api_response($grade, 200, "OK");
        // } else {
        //     return $this->api_response(null, 401, "not found");
        // }


    }
}
