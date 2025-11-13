

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // 1. Display all students
    public function index()
    {
        return "List of all students";
    }

    // 2. Show form to create a new student
    public function create()
    {
        return "Form to create a new student";
    }

    // 3. Store new student in database
    public function store(Request $request)
    {
        return "Student saved successfully!";
    }

    // 4. Show a specific student by ID
    public function show($id)
    {
        return "Showing student with ID: $id";
    }

    // 5. Show form to edit a student
    public function edit($id)
    {
        return "Form to edit student with ID: $id";
    }

    // 6. Update a student
    public function update(Request $request, $id)
    {
        return "Student with ID $id updated successfully!";
    }

    // 7. Delete a student
    public function destroy($id)
    {
        return "Student with ID $id deleted!";
    }
}
