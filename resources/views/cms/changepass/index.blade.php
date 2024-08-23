@extends('cms.layouts.main')
@section('container')
    <div class="row">
        <div class="col-lg-8">
            <form method="post" action="/admin/changePass" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="oldPassword" class="form-label">Password Lama</label>
                    <div class="input-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="oldPassword"
                            name="oldPassword" placeholder="Masukkan password lama" required>
                        <button class="btn btn-outline-secondary" type="button" onclick="toggleOldPassword()">
                            <i id="oldToggleIcon" class="fas fa-eye"></i>
                        </button>
                        @error('oldPassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru</label>
                    <div class="input-group">
                        <input type="password" class="form-control @error('newPassword') is-invalid @enderror"
                            id="password" name="newPassword" placeholder="Masukkan password baru" required>
                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                            <i id="toggleIcon" class="fas fa-eye"></i>
                        </button>
                        @error('newPassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <a href="/admin" class="btn btn-xs btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById('password');
            var toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }

        }

        function toggleOldPassword() {
            var oldPasswordInput = document.getElementById('oldPassword');
            var oldToggleIcon = document.getElementById('oldToggleIcon');

            if (oldPasswordInput.type === "password") {
                oldPasswordInput.type = "text";
                oldToggleIcon.classList.remove('fa-eye');
                oldToggleIcon.classList.add('fa-eye-slash');
            } else {
                oldPasswordInput.type = "password";
                oldToggleIcon.classList.remove('fa-eye-slash');
                oldToggleIcon.classList.add('fa-eye');
            }


        }
    </script>
@endsection
