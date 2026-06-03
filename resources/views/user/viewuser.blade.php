@extends('dashboard.indexnew')
@section('inti')
<div class="container-fluid">
<div class="row">
    <div class="col-12 mt-4">
        <h4 class="mb-0">Profile</h4>
        <p class="text-muted mt-0 font-12">Profile User.</p>
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{asset('assetz/images/users/1.jpg') }}" alt="user" class="rounded-circle"
                                    width="80">
                    <h4 class="card-title">{{ Auth::user()->name }}</h4>
                    <p class="card-text">{{ Auth::user()->email }}</p>
                    <p class="card-text">
                        @if(Auth::user()->role == 'admin')
                        Dosen
                        @elseif(Auth::user()->role == 'reviewer')
                        Dosen
                        @elseif(Auth::user()->role == 'super')
                        Super
                        @else
                        @endif
                        - S1 {{$prodi}}
                    </p>
                        <a href="javascript:void(0)" class="btn btn-info" style="border-radius:15px;">{{ $daysAgo }} days ago</a>
                    </div>
                </div>
            </div>
</div>
<div class="row">
                    <div class="col-12 mt-4">
                        <h4 class="mb-0">Update Data</h4>
                        <p class="text-muted mt-0 font-12"></p>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Change Data</h3>
                                <form class="mt-4">
                                    <div class="form-group">
                                        <p class="card-text">Nama</p>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <p class="card-text">Email</p>
                                        <input type="email" class="form-control" name"email">
                                        <input type="hidden" class="form-control" name"password">
                                    </div>
                                    <div class="form-group">
                                        <p class="card-text"></p>
                                        <a href="javascript:void(0)" class="btn btn-success" style="border-radius:15px;">Update Data</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Change Password</h3>
                                <form class="mt-4">
                                    <div class="form-group">
                                        <p class="card-text">Password</p>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>
                                    <div class="form-group">
                                        <p class="card-text">Verifikasi Password</p>
                                        <input type="hidden" class="form-control" name"email">
                                        <input type="hidden" class="form-control" name"name">
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                                    </div>
                                    <div class="form-group">
                                        <p class="card-text"></p>
                                        <a href="javascript:void(0)" class="btn btn-primary" style="border-radius:15px;">Update Data</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
</div>
<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        var password = document.getElementById('password').value;
        var passwordConfirmation = document.getElementById('password_confirmation').value;

        if (password !== passwordConfirmation) {
            event.preventDefault();  // Cegah form untuk submit
            alert('Password dan verifikasi password tidak cocok!');
        }
    });
</script>
@endsection