@extends('member.layout.main')
@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="py-3 text-center">Edit Produk</h3>
    <form action="/produk-member/{{$produk->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <!-- <label for="image" class="form-label">Thumbnail</label> -->
            @if($produk->image)
            <img src="{{ asset('storage/uploads/'.$produk->image) }}" class="image-thumbnail" alt="thumbnail" style="width:50%">
            @else
            <span class="badge badge-danger">Belum ada Thumbnail</span>
            @endif            
            <input type="file" id="image" name="image" class=" form-control @error('image') is-invalid @enderror" accepts="image/*">
        </div>
        @error('image')
                {{$message}}
            @enderror
        <div class="mb-3">
            <label for="title" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Input nama" value="{{old('nama',$produk->nama)}}">
            @error('nama')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat dan Deskripsi </label>
            <textarea name="alamat" id="alamat" rows="2" width="500x" class="form-control" required>{{old('alamat',$produk->alamat)}} </textarea>
            @error('alamat')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <select class="form-select" name="tipe_id" aria-label="Default select example">
                @foreach ($tipes as $tipe)
                @if(old('tipe_id',$produk->tipe_id)==$tipe->id)
                <option value="{{$tipe->id}}" selected="selected">{{$tipe->nama}}</option>
                @else
                    <option value="{{$tipe->id}}">{{$tipe->nama}}</option>
                    @endif
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" name="gender_id" aria-label="Default select example">
                @foreach ($genders as $gender)
                @if(old('gender_id',$produk->gender_id)==$gender->id)
                <option value="{{$gender->id}}" selected="selected">{{$gender->nama}}</option>
                @else
                    <option value="{{$gender->id}}">{{$gender->nama}}</option>
                    @endif
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <select class="form-select" name="provinsi_id" aria-label="Default select example">
                @foreach ($provinsis as $provinsi)
                @if(old('provinsi_id',$produk->provinsi_id)==$provinsi->id)
                <option value="{{$provinsi->id}}" selected="selected">{{$provinsi->nama}}</option>
                @else
                    <option value="{{$provinsi->id}}">{{$provinsi->nama}}</option>
                    @endif
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="kota" class="form-label">Kota</label>
            <select class="form-select" name="kota_id" aria-label="Default select example">
                @foreach ($kotas as $kota)
                @if(old('kota_id',$produk->kota_id)==$kota->id)
                <option value="{{$kota->id}}" selected="selected">{{$kota->nama}}</option>
                @else
                    <option value="{{$kota->id}}">{{$kota->nama}}</option>
                    @endif
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <select class="form-select" name="kecamatan_id" aria-label="Default select example">
                @foreach ($kecamatans as $kecamatan)
                @if(old('kecamatan_id',$produk->kecamatan_id)==$kecamatan->id)
                <option value="{{$kecamatan->id}}" selected="selected">{{$kecamatan->nama}}</option>
                @else
                    <option value="{{$kecamatan->id}}">{{$kecamatan->nama}}</option>
                    @endif
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="daerah" class="form-label">Daerah</label>
            <select class="form-select" name="daerah_id" aria-label="Default select example">
                @foreach ($daerahs as $daerah)
                @if(old('daerah_id',$produk->daerah_id)==$daerah->id)
                <option value="{{$daerah->id}}" selected="selected">{{$daerah->nama}}</option>
                @else
                    <option value="{{$daerah->id}}">{{$daerah->nama}}</option>
                    @endif
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga per bulan</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="Input harga" value="{{old('harga',$produk->harga)}}">
            @error('harga')
                {{$message}}
            @enderror
        </div>
        <button class="btn btn-success" type="submit">Update</button>
    </div>
    </form>
        </div>
    </div>
    <script src="/js/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#alamat' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection