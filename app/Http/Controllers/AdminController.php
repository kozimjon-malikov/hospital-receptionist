<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Notifications\SendEmailNotification;
use Illuminate\Notifications\Notification;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function view_doctor()
    {
        return view('admin.view_doctor');
    }
    public function upload(Request $request)
    {
        $doctor = new Doctor;
        $image = $request->file('rasm');
        $imageName = time() . '.' . $image->getClientOriginalName();
        $image->move('doctorsimage', $imageName);
        $doctor->rasm = $imageName; // You should use '=' instead of '->$'
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room_no = $request->room_no;
        $doctor->save();
        toast('Your Post as been submited!', 'success');
        return redirect()->back();
    }
    public function showappointment(Request $request)
    {
        $appoints = Appointment::all();
        return view('admin.showappointment', compact('appoints'));
    }
    public function approved($id)
    {
        $data = Appointment::findOrFail($id);
        $data->status = 'Approved';
        $data->save();
        return redirect()->back();
    }
    public function cancel_appointment($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Canceled';
        $data->save();
        return redirect()->back();
    }
    public function show_doctor(Request $request)
    {
        $doctors = Doctor::all();
        return view('admin.showdoctor', compact('doctors'));
    }
    public function delete_doctor($id)
    {
        $data = Doctor::find($id);
        $data->delete();
        toast('Doctor is deleted successfully', 'success');
        return redirect()->back();
    }
    public function update_doctor($id)
    {
        $data = Doctor::findOrFail($id);
        return view('admin.updatedoctor', compact('data'));
    }
    public function edit_doctor(Request $request, $id)
    {
        $data = Doctor::findOrFail($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->speciality = $request->speciality;
        $data->room_no = $request->room_no;
        $image = $request->file('rasm');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('doctorsimage', $imageName);
        $data->rasm = $imageName;
        $data->save();
        Alert::success('Malumot yangilandi');
        return redirect()->back();
    }
    public function viewemail($id)
    {
        $data = Appointment::findOrFail($id);
        return view('admin.viewemail', compact('data'));
    }
    public function sendemail(Request $request, $id)
    {
        $data = Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actionText' => $request->actionText,
            'actionUrl' => $request->actionUrl,
            'endPart' => $request->endPart
        ];
        Notification::send($data, new SendEmailNotification($details));
        return redirect()->back();
    }
}
