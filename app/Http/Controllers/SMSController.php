<?php

namespace App\Http\Controllers;
 use App\models\student; 
// use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use cpApp\http\Controllers\Auth;
use Illuminate\Http\Request;
// use App\student;


class SMSController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    // $students = student::orderBy('id,desc')->paginate(10);
    $students =student::all();
    
    return view('index',['students'=>$students,'layout'=>'index']);


   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = student::all();

      return view('index',['students'=>$students,'layout'=>'create']);
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    {
        $validate_fields = Validator::make($request->all(),[
            'cne'=>'required',
            'firstName'=>'required',
            'SecondName'=>'required',
            'Age'=>'required',
            'Speciality'=>'required',
        
        ]);
         if($validate_fields->fails()){
            return back()->withErrors($validate_fields);
        }else{
            
        student::create([
            $students =new student(),
$students->cne=$request->input('cne'),
$students->firstName=$request->input('firstName'),
$students->SecondName=$request->input('SecondName'),
$students->Age=$request->input('Age'),
$students->Speciality=$request->input('Speciality'),
$students->save()
        ]);
    }
        // Route::get('/SMS',[SMSController::class 'index']);
        // Route::get('url'SMSController)->name(App\Http\Controllers\SMSController@index)
        return redirect()->route('SMS.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = student::findOrFail($id); 
        return view('index',['student'=> $students ,'student'=>$students,'layout'=>'show']);
        
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Fetch the task id that you want to edit
       
        $students= student::findOrFail($id);
        return view('index', compact('students') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $students = student::findOrFail($id);
        $validate_fields = Validator::make($request->all(), [
            'cne' => ['required', 'min: 3'],
            'firstName' => ['required', 'min:30'],
            'SecondName' => ['required', 'min: 10'],
            'Age' => ['required', 'min: 30'],
            'Speciality' => ['required', 'min: 30'],
        
        ]);
        if($validate_fields->fails()){
            return back()->withErrors($validate_fields);
        }else{
            $students->update([
                'cne' => $request->cne,
                'firstName' => $request->firstName,
                'SecondName' => $request->SecondName,
                'Age' => $request->Age,
                'Speciality' => $request->Speciality,
            ]);
        }
            Session::flash('update_success', 'System has been updated successfully');
            return back('/');
    } 
        
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $students =student::find($id);
        $students->delete();
        return redirect('/');

        Session::flash('delete_success', 'Task has been deleted successfully');
    
    }


}