<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Patient;
use Session;

class PatientController extends Controller
{
    public function home(){
        Return view('insertPatient');
    }

    public function index(){

        Return view('insertPatient');
    }

    public function store(){    
        $r=request(); 
        $addPatient=Patient::create([   
            'icNo'=>$r->icNo,
            'name'=>$r->name, 
            'gender'=>$r->gender,
            'age'=>$r->age,
            'address'=>$r->address,
            'phoneNo'=>$r->phoneNo,
        ]);
        Session::flash('success',"Patient added successful!");
        Return redirect()->route('viewPatient');
    }

    public function view(){
        $patient=Patient::all();
        Return view('showPatient')->with('patients',$patient);
    }

    public function delete($icNo){
        $delete=Patient::find($icNo);
        $delete->delete();
        Session::flash('danger',"Patient deleted successful!");
        Return redirect()->route('viewPatient');
    }

    public function edit($icNo){
        $patients=Patient::all()->where('icNo',$icNo);
        Return view('editPatient')->with('patients',$patients);
    }

    public function update(){
        $r=request();
        $patients=Patient::find($r->icNo);

        $patients->name=$r->patientName;
        $patients->gender=$r->gender;
        $patients->age=$r->age;
        $patients->address=$r->address;
        $patients->phoneNo=$r->phoneNo;
        $patients->save();
        Session::flash('success',"Patient updated successful!");

        Return redirect()->route('viewPatient');
    }

    public function searchPatient(){
        $r=request();
        $keyword=$r->keyword;
        $patient=DB::table('patients')
        ->where('patients.icNo','like','%'.$keyword.'%')
        ->orWhere('patients.gender','like', $keyword)
        ->get();

        Return view('showPatient')->with('patients',$patient);
       
    }  
}