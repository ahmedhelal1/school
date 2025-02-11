<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GradeResource;
use App\Services\GradeService;
use Illuminate\Http\Request;
use App\Models\Grade;

use Illuminate\Support\Facades\Validator;

class GradeController extends Controller
{

    use ApiResponseTrait;

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


        // $grade = new GradeResource(Grade::findOrFail($id));
        // return $grade;
        //or
        $grade = Grade::Find($id);
        if ($grade) {
            return $this->api_response(new GradeResource(Grade::findOrFail($id), 200, "OK"));
        } else {
            return $this->api_response(null, 401, "not found");
        }
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'notes' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->api_response(null, 400, $validator->errors());
        }

        $grade = Grade::create($request->all());
        if ($grade) {
            return $this->api_response(new GradeResource($grade), 201, "create successfully");
        } else {
            return $this->api_response(null, 400, "create failed");
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'notes' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->api_response(null, 400, $validator->errors());
        }
        $grade = Grade::Find($id);
        if (!$grade) {
            return $this->api_response(null, 404, "not found");
        }
        $grade->update($request->all());
        return $this->api_response(new GradeResource($grade), 200, "update successfully");
    }
    public function destroy($id)
    {
        $grade = Grade::Find($id);
        if (!$grade) {
            return $this->api_response(null, 404, "not found");
        }
        $grade->delete();
        if ($grade) {
            return $this->api_response(null, 200, "delete successfully");
        }
    }
}
