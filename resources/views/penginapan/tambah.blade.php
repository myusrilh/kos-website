@extends('layout.master')

@section('title','Tambah Penginapan')
@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
        <ul>
          @foreach($errors->all() as $error)
          <li>
            {{ $error }} <br>
          </li>
          @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
      <div class="col-sm-6 col-md-6 mx-auto  p-4">
        <h1 class="display-4 text-center text-dar">Data Penginapan</h1>
        
        <form method="post" action="{{url('penginapan/store')}}" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
          <label for="nama">Nama Penginapan</label>
          <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Penginapan">
          </div>
          <div class="form-group">
          <label for="nama">Pemilik Penginapan</label>
          <input type="text" id="id_pemilik" name="id_pemilik" class="form-control" placeholder="Pemilik Penginapan" value="{{Auth::user()->nama}}" readonly>
          </div>
          <div class="form-group">
          <label for="nama">Harga Penginapan</label>
          <input type="number" id="harga" name="harga" class="form-control" placeholder="Harga Penginapan">
          </div>
          {{-- <div class="form-group">
            <label for="waktu">Waktu Pembayaran</label>
            <select id="waktu" class="form-control">
              <option value="">Persemester</option>
              <option value="">Pertahun</option>
            </select>
          </div> --}}
          <div class="form-group">
          <label for="lokasi">Alamat Penginapan</label>
          <input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="Alamat Penginapan">
          </div>
          <div class="form-group">
          <label for="jumlah_kamar">Jumlah Kamar</label>
          <input type="number" id="jumlah_kamar" name="jumlah_kamar" class="form-control" placeholder="Jumlah Kamar">
          </div>
          <div class="form-group">
          <label for="aturan">Aturan (gunakan tanda koma sebagai pemisah)</label>
          <input type="text" id="aturan" name="aturan" class="form-control" placeholder="Aturan Penginapan">
          </div>
          <div class="form-group">
          <label for="ukuran">Ukuran</label>
          <input type="text" id="ukuran" name="ukuran" class="form-control" placeholder="Ukuran Penginapan">
          </div>
          <div class="form-group">
            <label for="fasilitas">Fasilitas</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="fasilitas[]" id="inlineCheckbox1" value="WiFi">
                <label class="form-check-label" for="inlineCheckbox1">WiFi</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="fasilitas[]" id="inlineCheckbox2" value="TV">
                <label class="form-check-label" for="inlineCheckbox2">TV</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="fasilitas[]" id="inlineCheckbox3" value="Kulkas">
                <label class="form-check-label" for="inlineCheckbox2">Kulkas</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="fasilitas[]" id="inlineCheckbox4" value="Air Hangat">
                <label class="form-check-label" for="inlineCheckbox2">Air Hangat</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="fasilitas[]" id="inlineCheckbox5" value="Kamar Mandi Bersih">
                <label class="form-check-label" for="inlineCheckbox2">Kamar Mandi Bersih</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="fasilitas[]" id="inlineCheckbox6" value="Perlengkapan Mandi">
                <label class="form-check-label" for="inlineCheckbox2">Perlengkapan Mandi</label>
              </div>
          </div>
          </select>
          <div class="form-group">
            <label for="tipe">Jenis Penginapan</label>
            <select id="tipe" name="tipe" class="form-control">
              <option value="Putra">Putra</option>
              <option value="Putri">Putri</option>
              <option value="Campur">Campur</option>
            </select>
          </div>
          <label>Foto Sampul</label>
          <div>
            <img id="preview_photo" class="img-fluid md-3 mb-3"  />
          </div>
          <div class="custom-file">
            <input style="overflow: hidden;text-overflow: ellipsis;" type="file" class="form-control custom-file-input" id="fotosampul" accept="image/*" name="foto[]" onchange="preview(event)"  value="{{ old('fotosampul') }}">
            {{-- <input type="file" class="custom-file-input" id="fotosampul"> --}}
            <label class="custom-file-label">Choose file</label>
          </div>
          <label>Foto Dalam Kamar</label>
          <div class="custom-file">
            <input style="overflow: hidden;text-overflow: ellipsis;" type="file" class="form-control custom-file-input" id="fotodalamkamar" accept="image/*" name="foto[]" onchange="preview(event)"  value="{{ old('fotodalamkamar') }}">
            {{-- <input type="file" class="custom-file-input" id="fotodalamkamar"> --}}
            <label class="custom-file-label">Choose file</label>
          </div>
          <label>Foto Luar Kamar</label>
          <div class="custom-file">
            <input style="overflow: hidden;text-overflow: ellipsis;" type="file" class="form-control custom-file-input" id="fotoluarkamar" accept="image/*" name="foto[]" onchange="preview(event)"  value="{{ old('fotoluarkamar') }}">
            {{-- <input type="file" class="custom-file-input" id="fotosampul"> --}}
            <label class="custom-file-label">Choose file</label>
          </div>
          <label>Foto Kamar Mandi</label>
          <div class="custom-file">
            <input style="overflow: hidden;text-overflow: ellipsis;" type="file" class="form-control custom-file-input" id="fotokamarmandi" accept="image/*" name="foto[]" onchange="preview(event)"  value="{{ old('fotokamarmandi') }}">
            {{-- <input type="file" class="custom-file-input" id="fotosampul"> --}}
            <label class="custom-file-label">Choose file</label>
          </div>
          <label>Foto Tampak Depan Penginapan</label>
          <div class="custom-file">
            <input style="overflow: hidden;text-overflow: ellipsis;" type="file" class="form-control custom-file-input" id="fototampakdepan" accept="image/*" name="foto[]" onchange="preview(event)"  value="{{ old('fototampakdepan') }}">
            {{-- <input type="file" class="custom-file-input" id="fototampakdepan"> --}}
            <label class="custom-file-label">Choose file</label>
          </div>
          <label>Foto Parkiran</label>
          <div class="custom-file">
            <input style="overflow: hidden;text-overflow: ellipsis;" type="file" class="form-control custom-file-input" id="fotoparkiran" accept="image/*" name="foto[]" onchange="preview(event)"  value="{{ old('fotoparkiran') }}">
            {{-- <input type="file" class="custom-file-input" id="fotoparkiran"> --}}
            <label class="custom-file-label">Choose file</label>
          </div>
          <div class="custom-file">
          </div>
           <button class="btn btn-outline-success btn-sm-lg btn-block" type="submit"> Submit </button>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function preview(event){
        var input = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function(){
            var result = reader.result;
            var preview_photo = document.getElementById('preview_photo');
            preview_photo.src = result
        }

        reader.readAsDataURL(input);
    }
</script>
@endsection