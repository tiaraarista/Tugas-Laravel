@extends('tampilan')
@section('content')
<div class="container" style="margin-top: 20px ">
    <center><h2><b>Inventory Management</b></h2></center><br><br><br>
    @foreach ($cruds as $c)
    <form action="{{route('crud.update', $c['kode_barang'])}}" method="POST" class="needs-validation" novalidate>
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" placeholder="nama" name="old_name" value="{{ $c['nama_barang'] }}">
        <div class="form-group"> 
        <label>Kode Barang :</label>
        <input type="text" class="form-control" placeholder="Kode Barang" name="kode_barang" value="{{ $c['kode_barang'] }}" required>
        <div class="invalid-feedback">
        Harap masukkan Kode Barang.
        </div>
        </div>
        <div class="form-group"> 
        <label>Nama Barang :</label>
        <input type="text" class="form-control" placeholder="Nama barang" name="name" value="{{ $c['nama_barang'] }}" required>
        <div class="invalid-feedback">
        Harap masukkan Nama Barang.
        </div>
        </div>
        <div class="form-group"> 
        <label>Kategori :</label>
        <input type="text" class="form-control" placeholder="Kategori" name="kategori" value="{{$c['kategori']}}" required>  
        <div class="invalid-feedback">
        Harap masukkan Kategori.
        </div>
        </div>
        <input type="submit" class="btn btn-warning" value="Edit Data">
        <a href="/crud" class="btn btn-outline-warning">Kembali</a>
    </form>
    @endforeach
<!-- JS Validasi -->
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

</div>    
@endsection