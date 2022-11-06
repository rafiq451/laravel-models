<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    public function index() {
        $studen = Student::all();
        $data = [
            "title" => "Menampilkan seluruh Data Mahasiswa",
            "post" => $studen
        ];
        return response()->json($data, 200);        
    }
    
     
    public function store(Request $request) {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];
        $studen = Student::create($input);
        $data = [
            "title" => "Menambah Data Mahasiswa",
            "post" => $studen  
        ];
        return response()->json($data, 201);        
        
    }
    
    public function delete($id) {

        $studen = Student::destroy($id);
        $data = [
            "title" => "Berhasil di hapus",
            "post" => $studen
        ]; 
        
        return response()->json($data);        
    }

    public function update(Request $request, $id) {
        $data = Student::find($id);

        $data = ([
            'nama' =>$request->get('nama'),
            'nim' =>$request->get('nim'),
            'email' =>$request->get('email'),
            'jurusan' =>$request->get('jurusan'),

        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post updated succesfull',
            'data' => $data
        ]);

    }
}

