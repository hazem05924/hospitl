<?php

namespace App\Http\Controllers;

use App\Department;
use App\Doctor;
use App\Http\Requests\Patient\CreatePatientRequest;
use App\Patient;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function indexPatient($id)
    {
        //
        $patients = User::patient()->where('doctor_id', $id)->orderBy('created_at', 'desc')->get();
        $departments=Department::all();
        return response()->view('users.patients.list', compact('patients','id',"departments"));
    }

    // public function createPatient($id)
    // {
    //     $departments=Department::all();
    //     return response()->view('users.patients.create', compact('id' , 'departments'));
    // }


    public function index(Request $request)
    {
        $patients=User::patient();
        if ($request->get('search')) {
            $moduleIndex = User::patient()->where('created_at', 'like', '%' . $request->search . '%');
        }

        if ($request->get('first_name')) {
            $cities = User::patient()->where('first_name', 'like', '%' . $request->first_name . '%');
        }
        if ($request->status != null) {
            $cities = User::patient()->where('status', $request->status);
        }
        $patients=$patients->get();
        $departments=Department::all();
        $doctors=Doctor::all();
        return view('users.patients.list',compact('patients','departments','doctors'));
        
    }

    public function create()
    {
        $doctors=Doctor::all();
        return view('users.patients.create' ,compact('doctors'))
        ->with('departments',Department::all());
        
    }

    public function store(CreatePatientRequest $request)
    {

        $patient = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'national_id' => $request->national_id,
            'email' => $request->email,
            'address' => $request->address,
            'specialist' => $request->specialist,
            'birth_date' => $request->birth_date,
            'mobile' => $request->mobile,
            'blood_group' => $request->blood_group,
            'specialist' => $request->specialist,
            'doctor_id'=> $request->get('doctor_id'),
            'type' => 'patient'
        ]);

        if ($request->departments){
            $patient->departments()->attach($request->departments);
        }
        


        // flash message
        session()->flash('success', 'تم إضافة ملف المريض بنجاح.');
        // redirect user
        return redirect(route('patients.index'));
    }

    public function show(User $patient)
    {
        return view('users.patients.show')
            ->with('patient', $patient)
            ->with('departments',Department::all());
    }

    public function edit(User $patient)
    {
        return view('users.patients.create')
        ->with('patient', $patient)
        ->with('departments',Department::all())
        ->with('doctors',Doctor::all());
    }

    public function update(Request $request, User $patient)
    {
        $data = $request->only('first_name', 'last_name', 'national_id',
        'email', 'address', 'birth_date','mobile', 'blood_group'
        ,'specialist','doctor_id');

        if ($request->hasFile('picture')) {
            $pic = $request->picture->store('patients_pictures');
            Storage::delete($patient->picture);
            $data['picture'] = $pic;
        }

        if ($request->departments) {
            $patient->departments()->sync($request->departments);
        }

        $patient->update($data);
        // flash message
        session()->flash('success', 'تم التحديث بنجاح.');
        // redirect user
        return redirect(route('patients.index'));
    }

    public function destroy(User $patient)
    {
        $patient->departments()->detach();
        Storage::delete($patient->picture);
        $patient->delete();
        // flash message
        session()->flash('success', 'تم الحذف بنجاح.');
        // redirect user
        return redirect(route('patients.index'));
    }
}
