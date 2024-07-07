<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Enrollment;
use App\Models\Batch;
use App\Models\Student;
use Illuminate\View\View;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $enrollments = Enrollment::all();
        return view ('enrollments.index')->with('enrollments',$enrollments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $batches = Batch::pluck('name','id');
        $students = Student::pluck('name','id');
        return view('enrollments.create', compact('batches','students'));
        return view('enrollments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Enrollment::create($input);
        return redirect('enrollments')->with('flash_message', 'Enrollment Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $enrollments = Enrollment::find($id);
        return view('enrollments.show')->with('enrollments', $enrollments);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $enrollments = Enrollment::find($id);
        return view('enrollments.edit')->with('enrollments', $enrollments);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $enrollments = Enrollment::find($id);
        $input = $request->all();
        $enrollments->update($input);
        return redirect('enrollments')->with('flash_message', 'Enrollment Updated!');  
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Enrollment::destroy($id);
        return redirect('enrollments')->with('flash_message', 'Enrollment deleted!'); 
    }
}
