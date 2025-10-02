<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestPersilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_persil = [
            [
                'kode_persil' => 'P001',
                'pemilik'     => 'Farrassurya',
                'luas_m2'     => 750,
                'penggunaan'  => 'Sawit',
                'alamat'      => 'Jl. Bukit Barisan No.12 (RT 01/RW 05)',
            ],
            [
                'kode_persil' => 'P002',
                'pemilik'     => 'Rudio Winaldo',
                'luas_m2'     => 500,
                'penggunaan'  => 'Sawah',
                'alamat'      => 'Jl. Yos Sudarso No.5 (RT 02/RW 07)',
            ],
            [
                'kode_persil' => 'P003',
                'pemilik'     => 'Rizky Hidayat',
                'luas_m2'     => 280,
                'penggunaan'  => 'Rumah tinggal',
                'alamat'      => 'Jl. Bukit Barisan No.21 (RT 04/RW 12)',
            ],
        ];

        // kirim data ke view
        return view('persil.index', ['persil' => $data_persil]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
