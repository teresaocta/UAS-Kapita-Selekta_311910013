@extends('template.home') 

@section('title')
<title>Rekomendasi Buku</title>

<style>
    .row {
        margin: 50px 0px;
    }
</style>
@endsection

@section('container')

<div class="container">
    <div class="row">
        <h2 style="font-family: 'Dosis', sans-serif; text-align:center; width: 100%;"><b>Mencari Rekomendasi Buku</b></h2>
    </div>
    <div class="row">
        <p style="text-align: center; width: 100%; font-family: 'Dosis', sans-serif; font-size:22px"><b>Kriteria Buku</b></p>
        <table class="table" style="font-family: 'Baloo Bhaijaan 2', cursive; background-color: #e9ecf5; ">
            <thead class="thead-dark">
                <tr>
                    <th>JUDUL</th>
                    <th>PENULIS</th>
                    <th>HARGA</th>
                    <th>HARGA ASLI</th>
                    <th>DISKON</th>
                    <th>COVER</th>
                    <th>TANGGAL TERBIT</th>
                    <th>PENERBIT</th>
                    <th>HALAMAN</th>
                    <th>BAHASA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data->JUDUL }}</td>
                    <td>{{ $data->PENULIS }}</td>
                    <td>{{ $data->HARGA }}</td>
                    <td>{{ $data->HARGA_ASLI}}</td>
                    <td>{{ $data->DISKON}}</td>
                    <td>{{ $data->COVER}}</td>
                    <td>{{ $data->TGL_TERBIT}}</td>
                    <td>{{ $data->PENERBIT}}</td>
                    <th>{{ $data->HALAMAN}}</th>
                    <th>{{ $data->BAHASA}}</th>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row">
        <p style="text-align: center; width: 100%; font-family: 'Dosis', sans-serif; font-size:22px"><b>Buku Rekomendasi</b></p>
        <table class="table" style="font-family: 'Baloo Bhaijaan 2', cursive; background-color: #e9ecf5;">
            <thead class="thead-dark">
                <tr>
                    <th>JUDUL</th>
                    <th>PENULIS</th>
                    <th>HARGA</th>
                    <th>HARGA ASLI</th>
                    <th>DISKON</th>
                    <th>COVER</th>
                    <th>TANGGAL TERBIT</th>
                    <th>PENERBIT</th>
                    <th>HALAMAN</th>
                    <th>BAHASA</th>
                    <th>SKOR</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i=0;
                ?>
                @foreach ($all_rekomendasi as $b)
                    <tr>
                        <td>{{ $b->JUDUL }}</td>
                        <td>{{ $b->PENULIS }}</td>
                        <td>{{ $b->HARGA }}</td>
                        <td>{{ $b->HARGA_ASLI}}</td>
                        <td>{{ $b->DISKON}}</td>
                        <td>{{ $b->COVER}}</td>
                        <td>{{ $b->TGL_TERBIT}}</td>
                        <td>{{ $b->PENERBIT}}</td>
                        <th>{{ $b->HALAMAN}}</th>
                        <th>{{ $b->BAHASA}}</th>
                        <td>
                            {{ $all_skor[$i][1] }}
                        </td>
                    </tr>
                    <?php 
                    $i+=1;
                    ?>

                    @if ($i == 10)
                        @break
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    
</div>

@endsection