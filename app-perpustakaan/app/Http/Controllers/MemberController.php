<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    private array $members = [
        ['id' => 1, 'nama' => 'Ahmad Tsani', 'nim' => '2103191001', 'email' => 'tsani@example.com', 'nomor_telepon' => '081234567890', 'status' => 'aktif'],
        ['id' => 2, 'nama' => 'Budi Santoso', 'nim' => '2103191002', 'email' => 'budi@example.com', 'nomor_telepon' => '081234567891', 'status' => 'aktif'],
        ['id' => 3, 'nama' => 'Siti Rahma', 'nim' => '2103191003', 'email' => 'siti@example.com', 'nomor_telepon' => '081234567892', 'status' => 'nonaktif'],
    ];

    public function index()
    {
        $members = $this->members;

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return 'MemberController@create';
    }

    public function store(Request $request)
    {
        return 'MemberController@store';
    }

    public function show(string $id)
    {
        return "MemberController@show, id: {$id}";
    }

    public function edit(string $id)
    {
        return "MemberController@edit, id: {$id}";
    }

    public function update(Request $request, string $id)
    {
        return "MemberController@update, id: {$id}";
    }

    public function destroy(string $id)
    {
        return "MemberController@destroy, id: {$id}";
    }
}