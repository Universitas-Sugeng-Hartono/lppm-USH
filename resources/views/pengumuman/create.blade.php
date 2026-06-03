@extends('dashboard.indexnew')
@section('inti')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pengelolaan Pengumuman</h4>
                    <br>
                    <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="pengirim">Admin</label>
                                <input type="text" class="form-control" id="pengirim" name="pengirim" placeholder="Nama Pembuat">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="isi">Pengumuman</label>
                            <textarea class="form-control" id="isi" name="isi" rows="12"></textarea>
                        </div>
                        <div class="container mt-4 col-md-12">
                            <div class="row">
                                <!-- Card for Image Upload -->
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h5>Unggah Gambar</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="gambar">Gambar (berisi berita jika ada gambarnya)</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*">
                                                    <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                                </div>
                                                <small class="form-text text-muted">Format yang diterima: jpg, jpeg, png.</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <!-- Card for File Upload -->
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h5>Unggah File</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="file">File .pdf/.docx</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file" name="file" accept=".pdf,.docx">
                                                    <label class="custom-file-label" for="file">Pilih File</label>
                                                </div>
                                                <small class="form-text text-muted">Format yang diterima: pdf, docx.</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                           <h6 class="card-subtitle"></h6>
                           <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Update file input label on change and handle image preview
    var fileInputs = document.querySelectorAll('.custom-file-input');
    fileInputs.forEach(function(input) {
        input.addEventListener('change', function() {
            var label = this.nextElementSibling;
            var fileName = this.files[0] ? this.files[0].name : 'Pilih file';
            label.textContent = fileName;

            // Handle image preview
            if (this.id === 'gambar' && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var preview = document.getElementById('previewGambar');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    document.getElementById('imageName').textContent = 'Nama Gambar: ' + fileName;
                };
                reader.readAsDataURL(this.files[0]);
            } else if (this.id === 'file' && this.files[0]) {
                document.getElementById('fileName').textContent = 'Nama File: ' + fileName;
            }
        });
    });
});
</script>
@endpush
