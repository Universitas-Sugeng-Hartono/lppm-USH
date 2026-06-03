@extends('dashboard.index')
@section('int')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Tambah ACC</h4>
                    <p class="card-category"></p>
                    <form action="{{ route('acc.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Pengirim</label>
                                    <input type="text" class="form-control" placeholder="Nama Admin" id="pengirim" name="pengirim" value="{{$proposal->userId->name}}">
                                    <input type="hidden" class="form-control" placeholder="Nama Admin" id="proposal_id" name="proposal_id" value="{{$proposal->id}}">
                                </div>
                            </div>
                            <div class=" col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" placeholder="Judul" id="judul" name="judul" value="{{$proposal->judul}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Progdi</label>
                                    <input type="text" class="form-control" placeholder="Progdi" id="progdi" name="progdi" value="{{$proposal->progdi}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control" placeholder="Status" id="status" name="status" value="{{$proposal->status}}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection