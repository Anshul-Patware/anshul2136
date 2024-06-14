<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index() {
        $employees = Employee::all();
        return view('admin.employee.list', compact('employees'));
    }

    public function add() {
        return view('admin.employee.add');
    }

    public function create(Request $request) {
        $employee = new Employee($request->all());
        $employee->save();
        return redirect()->route('admin.employee.list');
    }

    public function delete(Request $request) {
        Employee::destroy($request->id);
        return redirect()->route('admin.employee.list');
    }

    public function edit($id) {
        $employee = Employee::find($id);
        return view('admin.employee.edit', compact('employee'));
    }

    public function update(Request $request) {
        $employee = Employee::find($request->id);
        $employee->update($request->all());
        return redirect()->route('admin.employee.list');
    }
}

?>