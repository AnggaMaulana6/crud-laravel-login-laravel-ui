@extends('layouts.master')

    @section('content')
        <div class="container">
            <h1>Tambah Data Siswa</h1>

            <form action="/siswa" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="number" class="form-control" id="nis" name="nis" placeholder="7742" required>
                </div>
                <div class="mb-2">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Angga Maulana" required>
                </div>
                <div class="mb-2">
                    <label for="class" class="form-label">Kelas</label>
                    <select name="class" id=""  class="form-control" required>
                        <option value="">- Pilih Kelas -</option>
                        <option value="XII OA">XII OA</option>
                        <option value="XII OB">XII OB</option>
                        <option value="XII OC">XII OC</option>
                        <option value="XII RA">XII RA</option>
                        <option value="XII RB">XII RB</option>
                        <option value="XII RC">XII RC</option>
                        <option value="XII RA">XII MA</option>
                        <option value="XII RB">XII MB</option>
                        <option value="XII RC">XII MC</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="major" class="form-label">Jurusan</label>
                    <select name="major" id=""  class="form-control" required>
                        <option value="">- Pilih Jurusan -</option>
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        <option value="Ototronik">Ototronik</option>
                        <option value="Mesin">Mesin</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select name="gender" id="" class="form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" id="address" rows="3" name="address" required></textarea>
                </div>
                <div class="mb-2">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" id="" class="form-control">
                </div>
                <input type="submit" value="Simpan" class="btn btn-info"></input>
                <a href="/siswa" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    @endsection