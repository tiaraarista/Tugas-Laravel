@extends('tampilan')
@section('content')
<div class="container" style="margin-top: 20px ">
    <center><h2><b>Inventory Management</b></h2></center><br><br><br>
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
        @foreach ($cruds as $c)
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
        Apakah anda yakin ingin menghapus Barang ini?
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
    