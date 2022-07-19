<?php

namespace App\Http\Controllers;

use App\Department;
use App\Doctor;
use App\Http\Requests\Doctor\CreateDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Doctor_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getTimeScheduleByDoctor(Request $request)
    {

        if (!$request->id) {
            $html = '<li class="tm"  value="">No Time Schedule For This Doctor</li>';
        } else {
            $html = '';
            $doctor = Doctor::find($request->id);
            $timeSchedules = $doctor->timeSchedules;
            foreach ($timeSchedules as $timeSchedule) {
                $html .= '<li class="tm list-group-item" value="' . $timeSchedule->id . '"><span class="icon icon-clock-o icon-lg icon-fw">' . $timeSchedule->week_day . '</li>';
            }
        }
        return response()->json(['html' => $html]);
    }

    public function getDayoffScheduleByDoctor(Request $request)
    {

        if (!$request->id) {
            $html = '<li class="tm"  value="">No Day Off Schedule For This Doctor</li>';
        } else {
            $doctor = Doctor::find($request->id);
            $dayoffSchedules = $doctor->dayoffSchedules;
            $TS = collect();
            foreach ($dayoffSchedules as $dayoffSchedule) {
                $TS->push($dayoffSchedule);
            }
            $json = $TS->toJson();
        }
        return response()->json(['html' => $json]);
    }

    public function treatmentHistory(Doctor $doctor)
    {
        return view('appointments.list')->with('appointments', $doctor->appointments);
    }

    public function index()
    {
        $doctors=Doctor::withCount('patients')->get();
        $departments=Department::all();
        return view('users.doctor.list',compact('doctors','departments'));
    }
    public function create()
    {
        $departments=Department::all();
        return view('users.doctor.create', compact('departments'));
    }

    public function store(CreateDoctorRequest $request)
    {

        $doctor = Doctor::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'national_id' => $request->national_id,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'emergency' => $request->emergency,
            'medical_degree' => $request->medical_degree,
            'specialist' => $request->specialist,
            'biography' => $request->biography,
            'educational_qualification' => $request->educational_qualification,

        ]);

        if ($request->picture) {
            $pic = $request->picture->store('doctors_pictures');
            $doctor->picture = $pic;
            $doctor->save();
        }

        if ($request->departments) {
            $doctor->departments()->attach($request->departments);
        }
        // flash message
        session()->flash('success', 'تم إضافة الطبيب بنجاح.');
        // redirect user
        return redirect(route('doctor.index'));
    }


    public function show(Doctor $doctor)
    {
        return view('home')->with('doctors', $doctor)->with('departments', Department::all());
    }

    public function edit($id)
    {
        return view('users.doctor.create')->with('doctor', Doctor::findOrFail($id))->with('departments', Department::all());
    }


    public function update(UpdateDoctorRequest $request, $id)
    {
        $doctor= Doctor::findOrFail($id);
        $data = $request->only('first_name', 'last_name', 'national_id', 'email', 'address', 'birth_date', 'gender', 'phone', 'mobile', 'emergency', 'medical_degree', 'specialist', 'biography', 'educational_qualification');
        if ($request->hasFile('picture')) {

            $pic = $request->picture->store('doctors_pictures');

            Storage::delete($doctor->picture);

            $data['picture'] = $pic;
        }

        if ($request->departments) {
            $doctor->departments()->sync($request->departments);
        }

        $doctor->update($data);
        // flash message
        session()->flash('success', 'تم التحديث بنجاح.');
        // redirect user
        return redirect(route('doctor.index'));
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->departments()->detach();
        // $doctor->timeSchedules()->delete();
        // Storage::delete($doctor->picture);
        $doctor->delete();
        // flash message
        session()->flash('success', 'تم الحذف بنجاح.');
        // redirect user
        return redirect(route('doctor.index'));
    }
}
