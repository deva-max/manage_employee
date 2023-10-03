<?php
namespace App\Http\Controllers;

use App\Helpers\QualificationHelper as HelpersQualificationHelper;
use App\Models\Employee;
use App\Models\EmployeeQualification;
use Illuminate\Http\Request;
use App\Models\Qualification;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    public function create(){
        $qualifications = Qualification::all();
        return view('employees.employeeCreate',compact('qualifications'));
    }
    public function listView(){
        return view('employees.employeeList');
    }

    public function list()
    {
        try {
            
            $employees = Employee::all();

            $employeeData = [];

            foreach ($employees as $employee) {
               
                $qualifications = $employee->Qualifications;

                $qualificationTitles = [];

                foreach ($qualifications as $qualification) {
                    $qualificationTitle = HelpersQualificationHelper::getQualificationById($qualification->id);

                    if ($qualificationTitle !== null) {
                        $qualificationTitles[] = $qualificationTitle;
                    } else {
                        Log::error('Can\'t retrieve qualification title');
                    }
                }

                $employeeData[] = [
                    'employee' => $employee,
                    'qualificationTitles' => $qualificationTitles,
                ];
            }
           
            return view('employeeHome', compact('employeeData'));
        } catch (Exception $e) {
            Log::error('Error fetching employees: ' . $e->getMessage());
            
        }
    }

    public function store(Request $request)
    {
        try {
            Log::info('This message should be logged.');
    
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'dob' => 'nullable|date',
                'gender' => 'required|in:male,female',
                'qualifications' => 'required|array|min:1',
                'employment-type' => 'required',
            ]);
    
            if ($validator->fails()) {
                Log::error('Validation failed', ['errors' => $validator->errors()]);
            }
    
            $employee = new Employee();
            $employee->name = $request->input('name');
            $employee->dob = $request->input('dob');
            $employee->gender = $request->input('gender');
            $employee->employment_type = $request->input('employment-type');
    
            $employee->save();
    
            if ($request->has('qualifications')) {
                $qualificationIds = [];
                foreach ($request->input('qualifications') as $qualificationTitle) {
                    $qualificationId = HelpersQualificationHelper::getQualicationByTitle($qualificationTitle);
                    if ($qualificationId !== null) {
                        $qualificationIds[] = $qualificationId;
                    }else{
                        Log::error('qualification not found in the table');
                    }
                }
                $employee->Qualifications()->sync($qualificationIds);
            }
    
            return redirect()->route('home')->with('success', 'Employee stored');
        } catch (Exception $e) {
            Log::error('Database insertion error: ' . $e->getMessage());
        }
    }
    
}
