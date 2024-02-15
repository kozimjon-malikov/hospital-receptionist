<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
class HomeController extends Controller
{
    public function index(){
            $doctors=Doctor::all();
            $user=Auth::user();
            return view('user.home',compact('doctors','user'));
    }
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->usertype=='0'){
                $doctors=Doctor::all();
                $user=Auth::user();
                return view('user.home',compact('doctors','user'));
            }else{
                return view('admin.home');
            }
        }
    }
    public function appointment(Request $request){
        $doctor=new Appointment();
        $doctor->name=$request->name;
        $doctor->email=$request->email;
        $doctor->date=$request->date;
        $doctor->doctor=$request->doctor;
        $doctor->number=$request->number;
        $doctor->message=$request->message;
        $doctor->status='in progress';
        if(Auth::id()){
            $doctor->user_id=Auth::user()->id;
        }
        else{
            return redirect()->back();
        }
        $doctor->save();
        Alert::success('Success', 'Your message has been sent successfully!!!');
        return redirect()->back();

    }
    public function myappointment(Request $request){
        if (Auth::id()) {
            $userid=Auth::user()->id;
            $appoint=Appointment::where('user_id',$userid)->get();
            return view('user.appointments',compact('appoint'));
        }
        else{
            return redirect()->back();
        }
    }
    public function delete_appoint($id){
        $data=Appointment::find($id);
        $data->delete();
        toast('Malumot o\'chirildi','success');
        return redirect()->back();
    }
}
