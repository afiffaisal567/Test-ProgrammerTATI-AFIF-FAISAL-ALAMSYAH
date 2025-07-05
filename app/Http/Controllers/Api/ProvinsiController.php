<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;

class ProvinsiController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Provinsi::all()
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:provinsis,code',
            'name' => 'required'
        ]);

        $provinsi = Provinsi::create($request->only(['code', 'name']));

        return response()->json([
            'message' => 'Provinsi berhasil ditambahkan',
            'data' => $provinsi
        ], Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $provinsi = Provinsi::find($id);

        if (!$provinsi) {
            return response()->json([
                'message' => 'Provinsi tidak ditemukan'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'data' => $provinsi
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $provinsi = Provinsi::find($id);

        if (!$provinsi) {
            return response()->json([
                'message' => 'Provinsi tidak ditemukan'
            ], Response::HTTP_NOT_FOUND);
        }

        $request->validate([
            'code' => 'required|unique:provinsis,code,' . $id,
            'name' => 'required'
        ]);

        $provinsi->update($request->only(['code', 'name']));

        return response()->json([
            'message' => 'Provinsi berhasil diperbarui',
            'data' => $provinsi
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $provinsi = Provinsi::find($id);

        if (!$provinsi) {
            return response()->json([
                'message' => 'Provinsi tidak ditemukan'
            ], Response::HTTP_NOT_FOUND);
        }

        $provinsi->delete();

        return response()->json([
            'message' => 'Provinsi berhasil dihapus'
        ], Response::HTTP_OK);
    }

    public function importFromWilayahId()
    {
        $response = Http::get('https://wilayah.id/api/provinces.json');

        if (!$response->successful()) {
            return response()->json([
                'message' => 'Gagal mengambil data dari wilayah.id'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $data = $response->json('data');

        foreach ($data as $item) {
            Provinsi::updateOrCreate(
                ['code' => $item['code']],
                ['name' => $item['name']]
            );
        }

        return response()->json([
            'message' => 'Data provinsi berhasil diimpor dari wilayah.id'
        ], Response::HTTP_OK);
    }
}
