<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Http\Requests\StorebukuRequest;
use App\Http\Requests\UpdatebukuRequest;

class BukuController extends Controller
{
    public function getBuku() {
        $data = buku::select('*') -> paginate(10);

        return view('list', ['table' => $data]);
    }

    public function searchBuku($judul) {
        $data = buku::select('*') -> where('JUDUL', 'LIKE', '%'.$judul.'%') -> paginate(10);
        // var_dump($data);
        // exit();

        return view('searchlist', ['table' => $data, 'judul' => $judul]);
    }

    public function goSearchBuku() {
        if (request('cari')) {
            $judul = request('cari');
            return redirect()->route('searchlist', $judul);
        }
        else {
            return redirect()->route('list');
        }
    }

    public function getRekomendasi($id) {
        $data = buku::select('*') -> where('ID', '=', $id) -> get();
        $all_buku = buku::select('*') -> get();
        $all_skor = [];
        $all_rekomendasi = [];

        // var_dump($data[0]->JUDUL);
        // exit();

        // //mencari yang sama kategorinya
        $kategori = $data[0] -> KATEGORI;
        // $sama_kategori = buku::select('*') -> where('KATEGORI', '=', $kategori) -> get();

        // //mencari yang sama penulisnya
        $penulis = $data[0] -> PENULIS;
        // $sama_penulis = buku::select('*') -> where('PENULIS', '=', $penulis) -> get();

        // //mencari yang sama penerbitnya
        $penerbit = $data[0] -> PENERBIT;
        // $sama_penerbit = buku::select('*') -> where('PENERBIT', '=', $penerbit) -> get();

        // //mencari yang sama bahasanya
        $bahasa = $data[0] -> BAHASA;
        // $sama_bahasa = buku::select('*') -> where('BAHASA', '=', $bahasa) -> get();


        $harga = $data[0] -> HARGA;

        foreach ($all_buku as $buku) {
            if ($buku->ID == $id) {
                continue;
            }

            $skor_buku = [];
            $skor = 0;

            array_push($skor_buku, $buku->ID);

            if ($buku->KATEGORI == $kategori) {
                $skor+=1;
            }

            if ($buku->PENULIS == $penulis) {
                $skor+=1;
            }

            if ($buku->PENERBIT == $penerbit) {
                $skor+=1;
            }

            if ($buku->BAHASA == $bahasa) {
                $skor+=1;
            }

            $selisih_harga = abs($buku->HARGA - $harga)/1000000;
            $skor = $skor-$selisih_harga;

            array_push($skor_buku, $skor);
            array_push($all_skor, $skor_buku);
        }

        usort($all_skor, function($a, $b) {
            return $b[1] <=> $a[1];
        });

        $i=0;

        foreach ($all_skor as $rekomen) {
            $rekomendasi = buku::select('*') -> where('ID', '=', $rekomen[0]) -> get();
            array_push($all_rekomendasi, $rekomendasi[0]);
            $i+=1;
            if ($i==10) {
                break;
            }
        }

        return view('rekomendasi', ['all_skor' => $all_skor, 'all_rekomendasi' => $all_rekomendasi, 'data' => $data[0]]);
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebukuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebukuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebukuRequest  $request
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebukuRequest $request, buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(buku $buku)
    {
        //
    }
}
