<?php

namespace App\Http\Controllers\Admin;

use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\TrainingSchedule;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class TrainingScheduleController extends Controller
{
   public function index(Request $request){

    $cari = $request->query('cari');

    $trainingscheduleQuery = TrainingSchedule::with('training');

    if($cari){
        $trainingscheduleQuery->where('training_material', 'like', '%' . $cari . '%' );
    }

    Paginator::useBootstrap();
    $trainingschedule = $trainingscheduleQuery->orderBy('created_at', 'DESC')->paginate('3');
    //   $trainingschedule = TrainingSchedule::with('training')->get();
      return view('admin.trainingschedule.index', compact('trainingschedule'));
      
   }

   public function create(){

    $trainings = Training::all();
    
    return view('admin.trainingschedule.create', compact('trainings'));

   }

   public function store(Request $request){

        $validatedData = $request->validate([
            'training_id' => 'required|exists:trainings,id',
            'training_material' => 'required|string|max:1000',
            'location' => 'required|string|max:255',
            'day' => 'required|string|max:20',
            'time' => 'required',
            'duration' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',

        ]);
             
        TrainingSchedule::create($validatedData);

        return redirect()->route('trainingschedule.index')->with('succsess','Data Berhasil Ditambahkan');

   }

   public function edit(TrainingSchedule $trainingschedule){

    $trainings = Training::all();
    return view('admin.trainingschedule.edit', compact('trainingschedule', 'trainings'));
   }

   public function update(Request $request, TrainingSchedule $trainingschedule){

    $validatedData = $request->validate([
        'training_id' => 'required|exists:trainings,id',
        'training_material' => 'required|string|max:1000',
        'location' => 'required|string|max:255',
        'day' => 'required|string|max:20',
        'time' => 'required',
        'duration' => 'required|integer',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',

    ]);

    $trainingschedule->update($validatedData);

    return redirect()->route('trainingschedule.index');

   }

   public function destroy(TrainingSchedule $trainingschedule){
    $trainingschedule->delete(); 
    
    return redirect()->route('trainingschedule.index')->with('success', 'Data berhasil dihapus!'); 

   }
}
