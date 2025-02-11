<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GradeResource;
use App\Services\GradeService;
use Illuminate\Http\Request;
use App\Models\Grade;

class New_GradeController extends Controller
{

    use ApiResponseTrait;
    protected $gradeService;
    // I use Service Provider in this class
    public function __construct(GradeService $gradeService)
    {
        $this->gradeService = $gradeService;
    }
    public function index()
    {
        return response()->json($this->gradeService->getGrades());
    }
    /////////////////////////////////
    public function show($id)
    {
        return response()->json($this->gradeService->getGrade($id));
    }
}
