@extends('tampilan')
@section('content')
<div class="container" style="margin-top: 20px ">
    <center><h2><b>Inventory Management</b></h2></center><br><br><br>
    @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert"><b>{{ $message }}</b></div>
    @elseif($message = Session::get('error'))
    <div class="alert alert-danger" role="alert"><b>{{ $message }}</b></div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <form action="{{route('product.index')}}" class="form-controller" method="get">
                <select class="form-control" name="kategori">
                    <option value="">Pilih Kategori</option>
                    <option value="Android">Android</option>
                    <option value="IOS">IOS</option>
                </select><br>
                <input type="submit" class="btn btn-dark btn-sm" value="Cari">
                <a href="/product" class="btn btn-dark btn-sm">Lihat Semua</a>
            </form>
        </div>
    </div><br>

    <a href="{{ route('product.create') }}" class="btn btn-dark"><i class="fas fa-plus"></i> <b>Tambah Data</b></a><br>
    <div style="margin-top: 20px ">
    <table class="table table-hover table-bordered"  border="1">
        <thead class="thead-dark">
            <tr>
                <th><b>Kode Barang</b></th>
                <th><b>Nama Barang</b></th>
                <th><b>Kategori</b></th>
                <th><b>Aksi</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $p)
                <tr>
                    <td>{{$p['kode_barang']}}</td>
                    <td>{{$p['nama_barang']}}</td>
                    <td>{{$p['kategori']}}</td>
                    <td><center><a href="{{route('product.show', $p['kode_barang'])}}" class="btn btn-dark"><i class="fas fa-eye"></i> Lihat</a> 
                                <a href="{{route('product.edit',$p['kode_barang'])}}" class="btn btn-dark"><i class="fas fa-user-edit"></i> Edit</a><br>
                                <form action="{{route('product.destroy', $p['kode_barang'])}}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" value="{{$p['kode_barang']}}" name="name">
                                    <input type="submit" value="Hapus" onclick="return alert('Apakah anda yakin?')">
                                </form>
                        </center>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

@endsection
    