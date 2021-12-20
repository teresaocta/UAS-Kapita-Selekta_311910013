<?php

namespace App\Http\Controllers;

use App\Models\best;
use App\Http\Requests\StorebestRequest;
use App\Http\Requests\UpdatebestRequest;

class BestController extends Controller
{

    public function getBuku() {
        $data = best::select('*') -> paginate(10);

        return view('best', ['table' => $data]);
    }

    public function searchBuku($judul) {
        $data = best::select('*') -> where('JUDUL', 'LIKE', '%'.$judul.'%') -> paginate(10);
        // var_dump($data);
        // exit();

        return view('searchlistbest', ['table' => $data, 'judul' => $judul]);
    }

    public function goSearchBuku() {
        if (request('cari')) {
            $judul = request('cari');
            return redirect()->route('searchlistbest', $judul);
        }
        else {
            return redirect()->route('best');
        }
    }

    public function getRekomendasi($id) {
        $data = best::select('*') -> where('ID', '=', $id) -> get();
        $all_buku = best::select('*') -> get();
        $all_skor = [];
        $all_rekomendasi = [];

        // var_dump($data[0]->JUDUL);
        // exit();

        // //mencari yang sama kategorinya
        $kategori = $data[0] -> KATEGORI;
        // $sama_kategori = best::select('*') -> where('KATEGORI', '=', $kategori) -> get();

        // //mencari yang sama penulisnya
        $penulis = $data[0] -> PENULIS;
        // $sama_penulis = best::select('*') -> where('PENULIS', '=', $penulis) -> get();

        // //mencari yang sama penerbitnya
        $penerbit = $data[0] -> PENERBIT;
        // $sama_penerbit = best::select('*') -> where('PENERBIT', '=', $penerbit) -> get();

        // //mencari yang sama bahasanya
        $bahasa = $data[0] -> BAHASA;
        // $sama_bahasa = best::select('*') -> where('BAHASA', '=', $bahasa) -> get();


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
            $rekomendasi = best::select('*') -> where('ID', '=', $rekomen[0]) -> get();
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
     * @param  \App\Http\Requests\StorebestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\best  $best
     * @return \Illuminate\Http\Response
     */
    public function show(best $best)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\best  $best
     * @return \Illuminate\Http\Response
     */
    public function edit(best $best)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebestRequest  $request
     * @param  \App\Models\best  $best
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebestRequest $request, best $best)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\best  $best
     * @return \Illuminate\Http\Response
     */
    public function destroy(best $best)
    {
        //
    }
}
