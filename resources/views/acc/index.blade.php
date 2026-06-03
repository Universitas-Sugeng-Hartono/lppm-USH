@extends('dashboard.indexnew')
@section('inti')
<style>
    .table-container {
            overflow-x: auto;
            margin: 20px 0;
        }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-info bg-info text-white border-0" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-warning alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">List ACC Proposal</h4>
                    <p class="card-category"></p>
                     <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-info text-white">
                            <tr>
                                <th>ID</th>
                                <th>Pengirim</th>
                                <th>Judul</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($accproposal as $item)
                            <tr>
                                <td>{{ $item->proposal_id }}</td>
                                <td>{{ $item->pengirim }}</td>
                                <td>{{ $item->judul }}</td>
                            </tr>
                        </tbody>
                        @empty
                        <div class="bg-red-500 text-white p-3 rounded shadow-sm mb-3">
                            Data Belum Tersedia!
                        </div>
                        @endforelse
                    </table>
                    {{ $accproposal->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection