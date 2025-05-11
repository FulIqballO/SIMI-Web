<?php

namespace App\Http\Controllers\Admin;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class TrainingController extends Controller
{

    // public function caripelatihan(Request $request){
    //    $cari = $request->cari;
    //    $training = Training::where('training_name', 'like', '%'.$cari.'%')->paginate();
    //    return view('info_training', ['training' => $training]);
    // }

    
    public function index(Request $request){
        $cari = $request->query('cari');    

    if ($cari) {
        $trainings = Training::where('training_name', 'like', '%' . $cari . '%')->orderBy('created_at', 'DESC')->paginate(5);
    } else {
        Paginator::useBootstrap();
        $trainings = Training::orderBy('created_at', 'DESC')->paginate(3);
    }
               
        return view('admin.info_training.training_information', compact('trainings'));
    }


    public function create(){
       
        return view('admin.info_training.create_training');
    }

    public function store(Request $request )
    {
       
        $validatedData = $request->validate([
            'training_name' => 'required|max:500',
            'description' => 'required|max:1000',
            'price' => 'required|integer|min:0',
           


        ]);

        Training::create($validatedData);

        return redirect()->route('info_training.index')->with('success', 'Data Berhasil Ditambahkan');

    }

    public function edit(Training $info_training) {
        
       
        return view('admin.info_training.edit_training', compact('info_training'));
    }


    public function update(Request $request, Training $info_training) {
      

        $validatedData = $request->validate([
            'training_name' => 'required|max:500',
            'description' => 'required|max:1000',
            'price' => 'required|integer|min:0',
        ]);
    
        $info_training->update($validatedData);
    
       
        return redirect()->route('info_training.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Training $info_training)
    {
        $info_training->delete();

     return redirect()->route('info_training.index')->with('success', 'Data berhasil dihapus!'); 
    }

}
