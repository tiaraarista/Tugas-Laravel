@extends('product.master')
@section('content')
<div class="container" style="margin-top: 20px ">
    <center><h2><b>Inventory Management</b></h2></center><br><br><br>
    @foreach ($products as $p)
    <form action="{{route('product.update', $p['kode_barang'])}}" method="POST" class="needs-validation" novalidate>
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" placeholder="nama" name="old_name" value="{{ $p['nama_barang'] }}">
        <div class="form-group"> 
            <label>Kode Barang :</label>
            <input type="text" class="form-control" placeholder="Kode Barang" name="kode_barang" value="{{ $p['kode_barang'] }}" required>
            <div class="invalid-feedback">
                Harap masukkan Kode Barang
            </div>
        </div>
        <div class="form-group"> 
            <label>Nama Barang :</label>
            <input type="text" class="form-control" placeholder="Nama barang" name="name" value="{{ $p['nama_barang'] }}" required>
            <div class="invalid-feedback">
                Harap masukkan Nama Barang
            </div>
        </div>
        <div class="form-group"> 
            <label>Kategori :</label>
            <input type="text" class="form-control" placeholder="Kategori" name="kategori" value="{{$p['kategori']}}" required>  
            <div class="invalid-feedback">
                Harap masukkan Kategori
            </div>
        </div>
        <div class="form-group"> 
            <label>Qty :</label>
            <input type="text" class="form-control" placeholder="Qty" name="Qty" value="{{$p['Qty']}}" required>  
            <div class="invalid-feedback">
                Harap masukkan Qty
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Tambah Data">
        <a href="/product" class="btn btn-outline-primary">Kembali</a>
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