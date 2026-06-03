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
</style>
<style>
    .alert {
        padding: 20px;
        background-color: #f44336;
        /* Red */
        color: white;
        margin-bottom: 15px;
    }

    .alert2 {
        padding: 20px;
        background-color: #a4e907;
        /* Red */
        color: white;
        margin-bottom: 15px;
    }

    .alert3 {
        padding: 20px;
        background-color: #f44336;
        /* Red */
        color: white;
        margin-bottom: 15px;
    }

    /* The close button */
    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    /* When moving the mouse over the close button */
    .closebtn:hover {
        color: black;
    }
    
    .custom-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: #001f3f; /* Warna pink navy */
    color: #ffffff;
    text-decoration: none;
    border-radius: 20px;
    font-weight: bold;
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
                    <h4 class="card-title" style="color: #241a69;">Review Proposal</h4>
                    <p class="card-category"></p>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="wrapper-progressBar">
                                <ul class="progressBar">
                                    <li class="active" onclick="window.location.href='{{ route('proposal.show', $proposal->id) }}'" style="cursor:pointer; color:#001f3f;">
                                        Submission
                                    </li>
                                    <li class="inactive" onclick="window.location.href='/get-review/{{$proposal->id}}'" style="cursor:pointer; color:#001f3f;">
                                        Review
                                    </li>
                                    <li class="active" onclick="window.location.href='/accadmin/{{$proposal->id}}'" style="cursor:pointer; color:#001f3f;">
                                        Accepted
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <b>
                        <h5 style="color: #241a69;">Reviewer Pertama</h5>
                    </b>
                    <hr color="blue">
                    @if(!empty($proposal->catatan_review1))
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>Reviewer</label>
                                <input type="text" class="form-control" placeholder="admin_id" id="judul" name="judul" value="{{$proposal->revId->name}}" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Catatan</label>
                                <div class="form-group">
                                    <textarea class="form-control" readonly>{{$proposal->catatan_review1}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control" placeholder="admin_id" id="judul" name="judul" value="{{$proposal->status}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>File</label>
                                <a href="/file-review/dokumen/{{ $proposal->file_review1 }}" class="custom-link">Klik Disini</a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="alert3">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        Belum ada tanggapan dari reviewer 1
                    </div>
                    @endif
                    <br>
                    <strong>
                        <h5 style="color: #241a69;">Reviewer Kedua</h5>
                    </strong>
                    <hr color="blue">
                    @if ($proposal->status_review == "Accepted" )
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Reviewer2</label>
                                <input type="text" class="form-control" placeholder="admin_id" id="judul" name="judul" value="{{$proposal->rev2Id->name}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Catatan</label>
                                <div class="form-group">
                                    <textarea class="form-control" readonly>{{$proposal->catatan_review2}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control" placeholder="Status" id="judul" name="judul" value="{{$proposal->status_review}}" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>File</label>
                                <a href="/foto-review/dokumen2/{{ $proposal->file_review2 }}" class="custom-link">Klik Disini</a>
                            </div>
                        </div>
                    </div>
                    @elseif ($proposal->status_review == "On Review" )
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Reviewer2</label>
                                <input type="text" class="form-control" placeholder="admin_id" id="judul" name="judul" value="{{$proposal->userId->name}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Catatan</label>
                                <div class="form-group">
                                    <textarea class="form-control" readonly>{{$proposal->catatan_review2}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control" placeholder="Status" id="judul" name="judul" value="{{$proposal->status_review}}" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>File</label>
                                <a href="/foto-review/dokumen2/{{ $proposal->file_review2 }}"><span style="background:pink; border-radius:20px;">Klik Disini</span></a>
                            </div>
                        </div>
                    </div>
                    @elseif ($proposal->status_review == "Decline" )
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Reviewer2</label>
                                <input type="text" class="form-control" placeholder="admin_id" id="judul" name="judul" value="{{$proposal->userId->name}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Catatan</label>
                                <div class="form-group">
                                    <textarea class="form-control" readonly>{{$proposal->catatan_review2}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control" placeholder="Status" id="judul" name="judul" value="{{$proposal->status_review}}" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>File</label>
                                <a href="/foto-review/dokumen2/{{ $proposal->file_review2 }}"><span style="background:pink; border-radius:20px;">Klik Disini</span></a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        Belum ada tanggapan dari reviewer 2
                    </div>
                    @endif
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card ">
                <div class="card-header ">
                    <b>
                        <h5 style="color: #241a69;">Tanggapan Dosen</h5>
                    </b>
                    <hr color="blue">
                    <form class="space-y-8 divide-y divide-gray-200" action="{{ route('proposal.update',$proposal->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>File Revisi</label>
                                    <input type="file" class="form-control" placeholder="Masukan File .doc/.pdf" id="file_revisi" name="file_revisi">
                                </div>
                                @if(!empty($proposal->file_revisi))
                                <a href="/foto-revisi/dokumen/{{ $proposal->file_revisi }}"><span style="background:pink; border-radius:20px;">Klik Disini</span></a>
                                @else
                                <div class="alert2">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    Belum ada ungahan
                                </div>
                                @endif
                            </div>
                        </div>
                        <div>
                            <!--<label>DATA SUBMITER (HIDDEN INPUT)</label>-->
                            <input type="hidden" class="form-control" placeholder="Judul Proposal" id="id" name="id" value="{{$proposal->id}}" readonly>
                            <input type="hidden" class="form-control" placeholder="Judul Proposal" id="admin_id" name="admin_id" value="{{$proposal->admin_id}}" readonly>
                            <input type="hidden" class="form-control" placeholder="Judul Proposal" id="judul" name="judul" value="{{$proposal->judul}}" readonly>
                            <input type="hidden" class="form-control" placeholder="Judul Proposal" id="progdi" name="progdi" value="{{$proposal->progdi}}" readonly>
                            <input type="hidden" class="form-control" placeholder="Judul Proposal" id="file_proposal" name="file_proposal" value="{{$proposal->file_proposal}}" readonly>
                            <input type="hidden" class="form-control" placeholder="catatan_review2" id="file_revisi" name="file_revisi" value="{{$proposal->file_revisi}}" readonly>
                            <input type="hidden" class="form-control" placeholder="tanggal" id="tanggal" name="tanggal" value="{{$proposal->tanggal}}" readonly>
                        </div>
                        <div>
                            <!-- <label>Reviewer 2 (HIDDEN INPUT)</label>-->
                            <input type="hidden" class="form-control" placeholder="reviewer_id" id="reviewer_id" name="reviewer_id" value="{{$proposal->reviewer_id}}" readonly>
                            <input type="hidden" class="form-control" placeholder="status" id="status" name="status" value="{{$proposal->status}}" readonly>
                            <input type="hidden" class="form-control" placeholder="file_review" id="file_review" name="file_review" value="{{$proposal->file_review}}" readonly>
                            <input type="hidden" class="form-control" placeholder="catatan_review" id="catatan_review" name="catatan_review" value="{{$proposal->catatan_review}}" readonly>
                            <input type="hidden" class="form-control" placeholder="catatan_review" id="status_review" name="status_review" value="{{$proposal->status_review}}" readonly>
                            <input type="hidden" class="form-control" placeholder="catatan_review" id="catatan_review2" name="catatan_review2" value="{{$proposal->catatan_review2}}" readonly>
                            <input type="hidden" class="form-control" placeholder="catatan_review" id="file_review2" name="file_review2" value="{{$proposal->file_review2}}" readonly>
                            <input type="hidden" class="form-control" placeholder="reviewer_id2" id="reviewer_id2" name="reviewer_id2" value="{{$proposal->reviewer_id2}}" readonly>
                        </div>
                        <h6 class="card-subtitle"></h6>
                        <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            @can('isSuper')
            <div class="card ">
                <div class="card-header ">
                    <b>
                        <h5 style="color: #241a69;">Tanggapan Super Admin</h5>
                    </b>
                    <hr color="blue">
                    <form class="space-y-8 divide-y divide-gray-200" action="{{ route('proposal.update',$proposal->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <label>STATUS FINAL</label>
                                <select id="status_final" name="status_final" autocomplete="status" class="form-select mr-sm-2" required>
                                    <option {{ old('status_final') == $proposal->status_final ? 'selected' : null }} value="{{$proposal->status_final}}">{{$proposal->status_final}}</option>
                                    <option value="Submission"> Submission</option>
                                    <option value="On Review"> On Review </option>
                                    <option value="Accepted"> Accepted </option>
                                    <option value="Decline"> Decline </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <!--<label>DATA SUBMITER (HIDDEN INPUT)</label>-->
                            <input type="hidden" class="form-control" placeholder="Judul Proposal" id="id" name="id" value="{{$proposal->id}}" readonly>
                            <input type="hidden" class="form-control" placeholder="Judul Proposal" id="admin_id" name="admin_id" value="{{$proposal->admin_id}}" readonly>
                            <input type="hidden" class="form-control" placeholder="Judul Proposal" id="judul" name="judul" value="{{$proposal->judul}}" readonly>
                            <input type="hidden" class="form-control" placeholder="Judul Proposal" id="progdi" name="progdi" value="{{$proposal->progdi}}" readonly>
                            <input type="hidden" class="form-control" placeholder="Judul Proposal" id="file_proposal" name="file_proposal" value="{{$proposal->file_proposal}}" readonly>
                            <input type="hidden" class="form-control" placeholder="catatan_review2" id="file_revisi" name="file_revisi" value="{{$proposal->file_revisi}}" readonly>
                        </div>
                        <div>
                            <!-- <label>Reviewer 2 (HIDDEN INPUT)</label>-->
                            <input type="hidden" class="form-control" placeholder="reviewer_id" id="reviewer_id" name="reviewer_id" value="{{$proposal->reviewer_id}}" readonly>
                            <input type="hidden" class="form-control" placeholder="status" id="status" name="status" value="{{$proposal->status}}" readonly>
                            <input type="hidden" class="form-control" placeholder="file_review" id="file_review" name="file_review" value="{{$proposal->file_review}}" readonly>
                            <input type="hidden" class="form-control" placeholder="catatan_review" id="catatan_review" name="catatan_review" value="{{$proposal->catatan_review}}" readonly>
                            <input type="hidden" class="form-control" placeholder="catatan_review" id="status_review" name="status_review" value="{{$proposal->status_review}}" readonly>
                            <input type="hidden" class="form-control" placeholder="catatan_review" id="catatan_review2" name="catatan_review2" value="{{$proposal->catatan_review2}}" readonly>
                            <input type="hidden" class="form-control" placeholder="catatan_review" id="file_review2" name="file_review2" value="{{$proposal->file_review2}}" readonly>
                            <input type="hidden" class="form-control" placeholder="reviewer_id2" id="reviewer_id2" name="reviewer_id2" value="{{$proposal->reviewer_id2}}" readonly>
                            <input type="hidden" class="form-control" placeholder="reviewer_id2" id="file_revisi" name="file_revisi" value="{{$proposal->file_revisi}}" readonly>
                        </div>
                        <h6 class="card-subtitle"></h6>
                        <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            @elsecan('isAdmin')
            @elsecan('isReview')
            @endcan
        </div>
    </div>
</div>
@endsection