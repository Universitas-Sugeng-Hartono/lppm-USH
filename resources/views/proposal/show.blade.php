@extends('dashboard.indexnew')
@section('inti')
<style>
    .wrapper-progressBar {
        width: 100%
    }

    .progressBar {}

    .progressBar li {
        list-style-type: none;
        float: left;
        width: 33%;
        position: relative;
        text-align: center;
    }

    .progressBar li:before {
        content: " ";
        line-height: 30px;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        border: 1px solid #ddd;
        display: block;
        text-align: center;
        margin: 0 auto 10px;
        background-color: white
    }

    .progressBar li:after {
        content: "";
        position: absolute;
        width: 100%;
        height: 4px;
        background-color: #ddd;
        top: 15px;
        left: -50%;
        z-index: -1;
    }

    .progressBar li:first-child:after {
        content: none;
    }

    .progressBar li.active {
        color: #001f3f;
    }

    .progressBar li.active:before {
        border-color: #001f3f;
        background-color: #fff;
    }

    .progressBar .active:after {
        background-color: #fff;
    }

    .progressBar .inactive:after {
        background-color: #fff;
    }

    .progressBar li.inactive {
        color: #001f3f;
    }

    .progressBar li.inactive:before {
        border-color: #001f3f;
        background-color: #001f3f;
    }

    .progressBar .inactive:after {
        background-color: #fff;
    }
    .custom-link {
    display: inline-block;
    padding: 5px 10px;
    background-color: #001f3f; /* Warna  navy */
    color: #ffffff;
    text-decoration: none;
    border-radius: 20px;
    font-weight: ;
    transition: background-color 0.3s, color 0.3s;
    }
    
    .custom-link:hover {
        background-color: #003366; /* Warna navy lebih gelap saat hover */
        color: #ffffff;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title" style="color: #001f3f;">Submit Proposal (SHOW)</h4>
                    <p class="card-category"></p>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="wrapper-progressBar">
                                <ul class="progressBar">
                                    <li class="inactive" onclick="window.location.href='{{ route('proposal.show', $proposal->id) }}'" style="cursor:pointer; color:#001f3f;">
                                        Submission
                                    </li>
                                    <li class="active" onclick="window.location.href='/get-review/{{$proposal->id}}'" style="cursor:pointer; color:#001f3f;">
                                        Review
                                    </li>
                                    <li class="active" onclick="window.location.href='/accadmin/{{$proposal->id}}'" style="cursor:pointer; color:#001f3f;">
                                        Accepted
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('proposal.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 pr-1">
                                <div class="form-group">
                                    <label>Admin</label>
                                    <input type="text" class="form-control" placeholder="admin_id" id="judul" name="judul" value="{{$proposal->userId->name}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" placeholder="Judul Proposal" id="judul" name="judul" value="{{$proposal->judul}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control" placeholder="Judul Proposal" id="status" name="status" value="{{$proposal->status}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Progdi</label>
                                    <input type="text" class="form-control" placeholder="admin_id" id="judul" name="judul" value="{{$proposal->progdi}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>File</label>
                                    <a href="/file-proposal/{{ $proposal->file_proposal }}" class="custom-link">Klik Disini</a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection