<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Car;
use Illuminate\Support\Facades\Hash;

class mployeeController extends Controller
{
    public function empAddN(Request $r) {
        $val = $r->validate([
            'name' => 'required',
            'email' =>'unique:employees|required',
            'pass'=>'required|min:3',
            'addr' =>'required|max:200',
            'dob' => 'required'
        ]);
        $emp = new Employee;
        $emp->name = $r->name;
        $emp->email = $r->email;
        $emp->password = Hash::make($r->pass);
        $emp->address = $r->addr;
        $emp->department = $r->dept;
        $emp->dob = $r->dob;
        $emp->sales = 0;
        $emp->save();
        return Redirect()->route('emp')->with('success','A new Employee was added');
    }

    public function empAll() {
        $det = Employee::all();
        return view('empdetails',compact('det'));
    }

    public function empUpdate($id) {
        $emp = Employee::find($id);
        return view('adminEditEmployee',compact('emp'));
    }

    public function empUpdateFinal(Request $r,$id) {
        $emp = Employee::find($id)->update([
            'name' => $r->name,
            'email' => $r->email,
            'address' => $r->addr,
            'department' => $r->dept,
            'dob' => $r->dob,
            'sales' => $r->sales,
        ] );
        
        return Redirect()->route('emp')->with('success','Employee was updated successfully');
    }

    public function empDelete($id) {
        Employee::find($id)->delete();
        return Redirect()->back()->with('successD','Employee was removed successfully');
    }

    public function empLog(Request $r) {
        $val = $r->validate(
            [
                'text1' => 'required',
                'password' => 'required'
            ],
            [
                'text1.required' => 'Provide email id!',
                'password.required' => 'Provide Passcode!'
            ]
        );

        $emp = Employee::where('email','=',$r->text1)->first();
        if($emp) {
            if(Hash::check($r->password,$emp->password)){
                $r->session()->put('emp_id',$emp->id);
                return view('employee.empMainPage');
            } else {
                return "Passcode error!";
            }
        } else {
            return "USER/PASSCODE ERROR!";
        }
    }
    public function empBookCar() {
        return view('employee.bookNew');
    }
    public function empStockViewAll() {
        $cars=Car::latest()->get();
        return view('employee.StockView',compact('cars'));
    }
    public function empLogout() {
        session()->pull('emp_id');
        return view('welcome');
    }
}
