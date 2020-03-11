@extends('tampilan')
@section('content')
<div class="container" style="margin-top: 20px ">
    <center><h2><b>Inventory Management</b></h2></center><br><br><br>
<form action="{{route('crud.store')}}" method="post" class="needs-validation" novalidate>
    @csrf
    <div class="form-group">
    <label>Kode Barang :</label>
    <input type="text" placeholder="Kode Barang" class="form-control" name="kode_barang" required>
    <div class="invalid-feedback">
        Harap masukkan Kode Barang.
      </div>
    </div>
    <div class="form-group"> 
    <label>Nama Barang :</label>       
    <input type="text" placeholder="Nama Barang" class="form-control" name="name" required> 
    <div class="invalid-feedback">
        Harap masukkan Nama Barang.
      </div>
    </div>
    <div class="form-group">
    <label>Kategori :</label>
    <input type="text" placeholder="Kategori" class="form-control" name="kategori" required>
    <div class="invalid-feedback">
        Harap masukkan Kategori.
      </div>
    </div>  
    <input type="submit" class="btn btn-primary" value="Tambah Data">
    <a href="/crud" class="btn btn-outline-primary">Kembali</a>
</form><br>
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