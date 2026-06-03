@extends('dashboard.indexnew')
@section('inti')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Edit Pengelolaan Pengumuman</h4>
                    <br>
                    <form action="{{ route('pengumuman.update',$pengumuman->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Admin</label>
                                <input type="hidden" name="id" id="id" value="{{ $pengumuman->id }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukin dana">
                                <input type="text" class="form-control" id="pengirim" name="pengirim" value="{{ $pengumuman->pengirim }}" placeholder="Nama Pembuat">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $pengumuman->tanggal }}" placeholder="Tanggal">
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Pengumuman</label>
                            <textarea class="form-control" id="isi" name="isi" rows="12">{{ $pengumuman->isi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Gambar</label>
                            <input type="file" class="custom-file-input" id="gambar" name="gambar">
                            <img class="mt-2" src="/foto-pengumuman/{{$pengumuman->gambar}}" id="foto1-preview" alt="Lihat Preview Disini" style="max-width: 250px;">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <h6 class="card-subtitle"></h6>
                        <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    $('#gambar').change(function() {

        let reader = new FileReader();
        reader.onload = (e) => {
            $('#foto1-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);

    });
</script>