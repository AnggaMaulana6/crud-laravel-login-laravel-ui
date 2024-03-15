@extends('layouts.master')

    @section('content')
        <div class="container">
            <h1>Edit Data Siswa</h1>

            <form action="/siswa/{{ $siswa->id }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-2">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="number" class="form-control" id="nis" name="nis" placeholder="7742"  value="{{ $siswa->nis }}" required>
                </div>
                <div class="mb-2">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Angga Maulana"  value="{{ $siswa->name }}" required>
                </div>
                <div class="mb-2">
                    <label for="class" class="form-label">Kelas</label>
                    <select name="class" id=""  class="form-control" required>
                        <option value="">- Pilih Kelas -</option>
                        <option value="XII OA"  @if($siswa->class == "XII OA") ? selected @endif>XII OA</option>
                        <option value="XII OB"  @if($siswa->class == "XII OB") ? selected @endif>XII OB</option>
                        <option value="XII OC"  @if($siswa->class == "XII OC") ? selected @endif>XII OC</option>
                        <option value="XII RA"  @if($siswa->class == "XII RA") ? selected @endif>XII RA</option>
                        <option value="XII RB"  @if($siswa->class == "XII RB") ? selected @endif>XII RB</option>
                        <option value="XII RC"  @if($siswa->class == "XII RC") ? selected @endif>XII RC</option>
                        <option value="XII MA"  @if($siswa->class == "XII MA") ? selected @endif>XII MA</option>
                        <option value="XII MB"  @if($siswa->class == "XII MB") ? selected @endif>XII MB</option>
                        <option value="XII MC"  @if($siswa->class == "XII MC") ? selected @endif>XII MC</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="major" class="form-label">Jurusan</label>
                    <select name="major" id=""  class="form-control" required>
                        <option value="">- Pilih Jurusan -</option>
                        <option value="Rekayasa Perangkat Lunak"  @if($siswa->major == "Rekayasa Perangkat Lunak") ? selected @endif>Rekayasa Perangkat Lunak</option>
                        <option value="Ototronik" @if($siswa->major == "Ototronik") ? selected @endif>Ototronik</option>
                        <option value="Mesin" @if($siswa->major == "Mesin") ? selected @endif>Mesin</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select name="gender" id="" class="form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L" @if($siswa->gender == "L") ? selected @endif>Laki-laki</option>
                        <option value="P" @if($siswa->gender == "P") ? selected @endif>Perempuan</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" id="address" rows="3" name="address" required>{{ $siswa->address }}</textarea>
                </div>
                <div class="mb-2">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="hidden" name="oldFoto" value="{{ old('foto', $siswa->foto) }}">
                    @if ($siswa->foto)
                          <img src="{{ asset('storage/' . $siswa->foto) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                          <img class="img-preview img-fluid mb-3 col-sm-5">
                          @endif
                          <input
                          type="file"
                          name="foto"
                          class="form-control @error('foto') is-invalid @enderror"
                          id="foto"
                          placeholder=""
                          aria-describedby="floatingInputHelp"
                          onchange="previewFoto()"
                          />
                          @error('foto')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror                
                    </div>
                <input type="submit" value="Simpan" class="btn btn-info"></input>
                <a href="/siswa" class="btn btn-warning">Kembali</a>
            </form>
        </div>
        <script>
            function previewFoto(){
              const foto = document.querySelector('#foto');
              const imgPreview = document.querySelector('.img-preview');
          
              imgPreview.style.display = 'block';
          
              const oFReader = new FileReader();
              oFReader.readAsDataURL(foto.files[0]);
          
              oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
              }
            }
          </script>
    @endsection