@extends('tampilan')
@section('content')
    <!-- MULAI -->
    <div class="container" style="margin-top: 20px ">
    <center><h2><b>Inventory Management</b></h2></center><br><br><br>
    @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert"><b>{{ $message }}</b></div>
    @elseif($message = Session::get('error'))
    <div class="alert alert-danger" role="alert"><b>{{ $message }}</b></div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <form action="{{route('crud.index')}}" class="form-controller" method="get">
                <select class="form-control" name="kategori">
                    <option value="">Pilih Kategori</option>
                    <option value="Android">Android</option>
                    <option value="IOS">IOS</option>
                </select><br>
                <input type="submit" class="btn btn-dark btn-sm" value="Cari">
                <a href="/crud" class="btn btn-dark btn-sm">Lihat Semua</a>
            </form>
        </div>
    </div><br>

    <a href="{{ route('crud.create') }}" class="btn btn-dark"><i class="fas fa-plus"></i> <b>Tambah Data</b></a>

    <table class="table table-hover table-bordered"  border="1" style="margin-top: 20px ">
    <thead class="thead-dark">
        <tr>
            <th><center><b>Kode Barang</b></center></th>
            <th><center><b>Nama Barang</b></center></th>
            <th><center><b>Kategori</b></center></th>
            <th><center><b>Aksi</b></center></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($crud as $c)
            <tr>
                <td>{{$c['kode_barang']}}</td>
                <td>{{$c['nama_barang']}}</td>
                <td>{{$c['kategori']}}</td>
                <!-- Modal -->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      
      <form action="{{route('crud.destroy', $c['kode_barang'])}}" method="post">
      <div class="modal-body">
        Apakah anda yakin ingin menghapus barang ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Tidak</button>
        @csrf
        <input type="hidden" name="_method" value="DELETE"><input type="hidden" value="{{$c['nama_barang']}}" name="name">
        <input type="submit" class="btn btn-danger" value="Ya"></form>
        
      </div>
    </div>
  </div>
</div>
    <td><center><a href="{{route('crud.show', $c['kode_barang'])}}" class="btn btn-info"><i class="fas fa-eye"></i> Lihat</a> <a href="{{route('crud.edit',$c['kode_barang'])}}" class="btn btn-warning"><i class="fas fa-user-edit"></i> Edit</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus"><i class="fas fa-trash-alt"></i>  
                Hapus</button></center>
            </tr>
        @endforeach
    </tbody>
    </table>
    </div>
@endsection