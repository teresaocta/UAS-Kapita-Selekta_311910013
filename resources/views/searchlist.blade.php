@extends('template.home') 

@section('title')
<title>Cari Buku New Arrival</title>
@endsection

@section('container')

<div class="container">
    <br>
    <div class="row">
        <h2 style="font-family: 'Dosis', sans-serif; text-align:center; width: 100%;"><b>Buku New Arrival</b></h2>
    </div>
    <br>
    <form action="/searchlist/{{ $judul }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari judul buku" name="cari" value="{{ $judul }}">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit" style="background-color: #4a5e5d; color:white">Cari</button>
            </div>
        </div>
    </form>
    <br>
    <div class="row">
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
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($table as $b)
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
                            <form action="/morebuku/{{ $b->ID }}" method="GET">
                                <button type="submit" class="btn btn-info" style="background-color: darksalmon; border: 0px">More</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $table->links() }}
</div>
@endsection