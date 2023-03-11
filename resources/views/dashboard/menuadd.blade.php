@extends('template.dashboardMain')

@section('container')

<div class="container-fluid">
      
    <h3>Tambah Menu Salvator</h3>
    <div class="card shadow text-dark mb-4 px-4 py-4" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-9">
            
            <form action="/menu" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="mb-3">
                  <label for="pelayanan" class="form-label">Nama Pelayanan</label>
                  <input type="text" class="form-control @error('pelayanan') is-invalid @enderror" id="pelayanan aria-describedby="emailHelp"  name="pelayanan" value="{{ old('pelayanan') }}">
                  @error('pelayanan')
                  <div  class="invalid-feedback mb-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="detail" class="form-label">Detail</label>
                  <input type="integer" class="form-control @error('detail') is-invalid @enderror" id="detail" aria-describedby="emailHelp" " name="detail" value="{{ old('detail') }}">
                  @error('detail')
                  <div  class="invalid-feedback mb-2">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="harga" class="form-label">Harga</label>
                  <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"  name="harga" value="{{ old('harga') }}">
                  @error('harga')
                  <div  class="invalid-feedback mb-2">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="link" class="form-label">link</label>
                  <input type="text" class="form-control @error('link') is-invalid @enderror" id="link"  name="link" value="{{ old('link') }}">
                  @error('link')
                  <div  class="invalid-feedback mb-2">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-lg-5">
                      <img src="" class="img-preview img-fluid mb-3  d-block " alt="">   
                    </div>
                    <div class="col-lg-7">
                      <label for="gambar" class="form-label">Gambar</label>
                    <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" onchange="PreviewImage()">
                    </div>
                  </div>
                    @error('gambar')
                    <div  class="invalid-feedback mb-2">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>

                <button type="submit" class="btn btn-success">Tambah <i class="bi bi-file-earmark-plus"></i></button>
              </form>
             
          </div>
        </div>
    </div>
</div>
<script>
  function PreviewImage(){
const image = document.querySelector('#gambar   ');
const imgPreview = document.querySelector('.img-preview');
imgPreview.style.display = 'block';
const oFReader = new FileReader();
oFReader.readAsDataURL(image.files[0]);
oFReader.onload = function(oFREvent){
imgPreview.src = oFREvent.target.result;
}
}

</script>
@endsection