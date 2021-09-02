<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Bed;
use App\Models\Patient;
use Session;

class BedController extends Controller
{
    public function index(){

        Return view('insertBed');
    }
    
    public function store(){
        $r=request(); 
        $addBed=Bed::create([
            'id'=>$r->id, 
            'icNo'=>$r->icNo,
        ]);
        Session::flash('success',"Bed added successful!");
        Return redirect()->route('viewBed');
    }

    public function view(){
        $bed=Bed::all();
        Return view('showBed')->with('beds',$bed);
    }

    public function edit($icNo){
        $beds=Bed::all()->where('icNo',$icNo);
        Return view('editBed')->with('beds',$beds);
    }

    public function update(){
        $r=request();
        $beds=DB::table('beds')
        ->where('beds.icNo','=',$r->icNo)
        ->update([
            'id' => $r->id,    
        ]);
        Session::flash('success',"Bed updated successful!");
        Return redirect()->route('viewBed');
    }

    public function delete($id){
        $delete=Bed::find($id);
        $delete->delete();
        Session::flash('danger',"Bed deleted successful!");
        Return redirect()->route('viewBed');
    }
    
}
