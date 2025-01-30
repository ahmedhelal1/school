<?php


namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGradesRequest;


class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();
        return view('Pages.Grades.Grades', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGradesRequest $request)
    {

        try {
            $grade = new Grade();
            $grade->name = ['en' => $request->Name_en, 'ar' => $request->Name];
            $grade->notes = $request->Notes;
            $grade->save();

            toastr()->success(trans('message.add_success'));
            return redirect()->route('Grades.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(storeGradesRequest $request)
    {
        try {
            $grade = Grade::findOrFail($request->id);
            $grade->update([
                'name' => ['en' => $request->Name_en, 'ar' => $request->Name],
                'notes' => $request->Notes,
            ]);
            toastr()->success(trans('message.edit_success'));
            return redirect()->route('Grades.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        //
    }
}
