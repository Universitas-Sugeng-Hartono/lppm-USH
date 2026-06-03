@extends('dashboard.indexnew')
@section('inti')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Reviewer 2 Proposal</h4>
                    <p class="card-category"></p>
                    <form class="space-y-8 divide-y divide-gray-200" action="{{ route('proposal.update',$proposal->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Reviewer</label>
                                    <select id="reviewer_id2" name="reviewer_id2" autocomplete="reviewer_id" class="form-control" required>
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
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>File Review</label>
                                    <input type="file" class="form-control" placeholder="Masukan File .doc/.pdf" id="file_review2" name="file_review2">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Catatan Review</label>
                                    <textarea class="form-control" id="catatan_review2" name="catatan_review2">{{$proposal->catatan_review2}}</textarea>
                                </div>
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
                            <input type="hidden" class="form-control" placeholder="Judul Proposal" id="tanggal" name="tanggal" value="{{$proposal->tanggal}}" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>STATUS</label>
                                <select id="status_review" name="status_review" autocomplete="status" class="form-control" required>
                                    <option {{ old('status_review') == $proposal->status_review ? 'selected' : null }} value="{{$proposal->status_review}}">{{$proposal->status_review}}</option>
                                    <option value="Submission"> Submission</option>
                                    <option value="On Review"> On Review </option>
                                    <option value="Accepted"> Accepted </option>
                                    <option value="Decline"> Decline </option>
                                </select>
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
@endsection