@extends('dashboard.indexnew')
@section('inti')
<style>
        .table-container {
            overflow-x: auto;
            margin: 20px 0;
        }
      
        .btn-view {
            display: inline-block;
            background-color: #06B6D4;
            color: white; 
            padding: 8px 16px;
            border-radius: 15px;
            font-size: 0.875rem; 
            text-decoration: none; 
            text-align: center; 
            transition: background-color 0.3s, transform 0.3s; 
        }
        
        .btn-view:hover {
            background-color: #0398C0; 
            transform: scale(1.05); 
        }
        
        .btn-view:active {
            background-color: #0286A1; 
            transform: scale(1); 
        }
       
        .btn {
            display: inline-block;
            padding: 0.375rem 0.75rem; 
            border: none;
            border-radius: 0.25rem;
            font-size: 0.875rem;
            
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
        
        .custom-btn-info {
            background-color: #1E90FF;
            color: #fff;
        }
        
        .custom-btn-info:hover {
            background-color: #1C86EE;
        }
        
        .custom-btn-light {
            background-color: #F0F8FF;
            color: #333;
        }
        
        .custom-btn-light:hover {
            background-color: #E6E6FA;
        }
        
        .custom-btn-success {
            background-color: #32CD32;
            color: #fff;
        }
        
        .custom-btn-success:hover {
            background-color: #2E8B57;
        }
        
        .custom-btn-danger {
            background-color: #FF4500;
            color: #fff;
        }
        
        .custom-btn-danger:hover {
            background-color: #FF0000;
        }
        
        @media (max-width: 576px) {
            .btn {
                display: block;
                width: 100%;
                margin-bottom: 0.5rem;
            }
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
                    <h4 class="card-title">Management User</h4>
                    <p class="card-category"></p>
                    <a type="button" class="btn btn-primary" href="{{route('user.create')}}">Tambah</a>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                    <table class="table">
                         <thead class="bg-info text-white">
                            <tr>
                                <th>ID</th>
                                <th>Dosen</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah anda yakin ingin menghapus ?');" action="{{ route('user.destroy',$item->id) }}" method="POST">
                                        <a href="{{ route('user.edit',$item->id) }}" class="btn btn-info">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @empty
                        <div class="bg-red-500 text-white p-3 rounded shadow-sm mb-3">
                            Data Belum Tersedia!
                        </div>
                        @endforelse
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection