<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $grades = Grade::all();
        return $this->api_response($grades, 200, "OK");
    }
}
