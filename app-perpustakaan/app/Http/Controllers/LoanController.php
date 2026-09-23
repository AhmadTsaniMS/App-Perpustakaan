<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    private array $loans = [
        ['id' => 1, 'nama_anggota' => 'Ahmad Tsani', 'judul_buku' => 'Laskar Pelangi', 'tanggal_pinjam' => '2026-09-01', 'tanggal_kembali' => null, 'status' => 'dipinjam'],
        ['id' => 2, 'nama_anggota' => 'Budi Santoso', 'judul_buku' => 'Clean Code', 'tanggal_pinjam' => '2026-08-15', 'tanggal_kembali' => '2026-08-22', 'status' => 'dikembalikan'],
    ];

    public function index()
    {
        $loans = $this->loans;

        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        return 'LoanController@create';
    }

    public function store(Request $request)
    {
        return 'LoanController@store';
    }

    public function show(string $id)
    {
        return "LoanController@show, id: {$id}";
    }

    public function edit(string $id)
    {
        return "LoanController@edit, id: {$id}";
    }

    public function update(Request $request, string $id)
    {
        return "LoanController@update, id: {$id}";
    }

    public function destroy(string $id)
    {
        return "LoanController@destroy, id: {$id}";
    }
    public function kembalikan(string $id)
{
    return "LoanController@kembalikan, id: {$id}";
}
}