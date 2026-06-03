@extends('dashboard.indexnew')
@section('inti')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Submit Pelaporan</h4>
                    <p class="card-category"></p>
                    <form action="{{ route('pelaporan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Admin</label>
                                    <select id="admin_id" name="admin_id" autocomplete="user_id" class="form-control" required>
                                        @foreach ($getname as $item)
                                        @if ($item->id == Auth::user()->id)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <select id="proposal_id" name="proposal_id" autocomplete="user_id" class="form-control" required>
                                        @foreach ($getproposal as $item)
                                        <option value="{{$item->id}}" data-jenis="{{$item->jenis}}">{{$item->judul}} - {{$item->userId->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" id="jenis" name="jenis" value="">
                                    @error('proposal_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <!--<input type="text" class="form-control" placeholder="Judul Proposal" id="judul" name="judul">-->
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" class="form-control" placeholder="tanggal" id="tanggal" name="tanggal">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" class="form-control" placeholder="Masukan File .doc/.pdf" id="file" name="file">
                                </div>
                            </div>
                        </div>
                        <h6 class="card-subtitle"></h6>
                        <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('proposal_id').addEventListener('change', function (e) {
        const selectedOption = e.target.options[e.target.selectedIndex];
        const jenis = selectedOption.getAttribute('data-jenis');
        document.getElementById('jenis').value = jenis;
    });
</script>
@endsection