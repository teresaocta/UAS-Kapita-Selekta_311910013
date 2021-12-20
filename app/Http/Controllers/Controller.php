<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

use App\Models\buku;
use App\Models\best;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function histo(){
        // $buku = buku::select(DB::raw("case when HARGA between 0 and 200000 then '0-200000'
        // when HARGA between 200000 and 400000 then '200001-400000'
        // when HARGA between 400000 and 600000 then '400001-600000'
        // when HARGA between 600000 and 800000 then '600001-800000'
        // when HARGA between 800000 and 1000000 then '800001-1000000'
        // else 'OTHERS'
        // end as `Range`,
        // count(1) as `Count`")) -> groupBy('Range') ->get();

        // $best = best::select(DB::raw("case when HARGA between 0 and 200000 then '0-200000'
        // when HARGA between 200000 and 400000 then '200001-400000'
        // when HARGA between 400000 and 600000 then '400001-600000'
        // when HARGA between 600000 and 800000 then '600001-800000'
        // when HARGA between 800000 and 1000000 then '800001-1000000'
        // else 'OTHERS'
        // end as `Range`,
        // count(1) as `Count`")) -> groupBy('Range') ->get();

        $buku = buku::select('JUDUL','HARGA') ->get();
        $best = best::select('JUDUL','HARGA') ->get();

        // $buku = buku::select('HARGA', buku::raw('count(JUDUL) as total'))->groupBy('HARGA')->orderBy('HARGA')->get();
        $buku1 = buku::select('COVER', buku::raw('count(JUDUL) as total'))->groupBy('COVER')->get();
        // $best = best::select('HARGA', best::raw('count(JUDUL) as total'))->groupBy('HARGA')->orderBy('HARGA')->get();
        $best1 = best::select('COVER', best::raw('count(JUDUL) as total'))->groupBy('COVER')->get();

        $penulis_na = buku::select('PENULIS', buku::raw('count(JUDUL) as total')) -> groupBy('PENULIS') -> orderBy('total', 'DESC') ->get();
        $penulis_bs = best::select('PENULIS', buku::raw('count(JUDUL) as total')) -> groupBy('PENULIS') -> orderBy('total', 'DESC') ->get();

        return view('buku', ['buku' => $buku, 'buku1' => $buku1, 'best' => $best, 'bestss' => $best1, 
                    'penulis_na' => $penulis_na[0], 'penulis_bs' => $penulis_bs[1]]);
    }
}
