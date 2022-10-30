<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Animal extends Controller
{
    public $animal;
    public function __construct()
    {
        $this->animal = ['sapi', 'kambing','jerapah','dinosaurus','cicak'];
    }

    public function index()
    {
        $hewan = $this->animal;
        $response = [
            'message' => 'Menampilkan data animal',
            'data' => $hewan,
        ];
        
        return response()->json($response);
    }

    public function store(Request $request)
    {
        $this->animal[] = $request->nama;

        $hewan = $this->animal;
        $response = [
            'message' => 'Data hewan berhasil di tambahkan',
            'data' => $hewan,
        ];

        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        $this->animal[$id] = $request->nama;

        $hewan = $this->animal;
        return response()->json([
            "success" => true,
            "message" => "Data hewan berhasil di update",
            "data" => $hewan,
        ]);
    }

    public function destroy($id)
    {
        
        unset($this->animal[$id]);

        $hewan = $this->animal;

        return response()->json([
            "success" => true,
            "message" => "Data hewan telah di hapus",
            "data" => $hewan,
        ]);


    }


}