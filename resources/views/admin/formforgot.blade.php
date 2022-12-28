<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
    <title>Login | Admin</title>
</head>

<body class="hold-transition login-page">
    <div class="login-box" id="app">
        <div class="login-logo">
            <a href="#"><b>Password</b> | RAT 2023</a>
        </div>
        @include('includes.flash_message')
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Perubahan Password</p>
                <form action="#" method="POST">
                    @csrf()
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" value="{{ $name }}" disabled>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" value="{{ $email }}" disabled>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="input-group mb-3" id="show_hide_password">
                        <input class="form-control" type="password" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    @error('password')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror

                    <div class="input-group mb-3" id="show_hide_password2">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Ulangi password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    @error('password')
                    <a class="text-danger">
                        {{ $message }}
                    </a>
                    @enderror
                    <div class="row">
                        <div class="col-8">

                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>

                    </div>
                </form>

                <p class="mb-1">
                    <a href="/admin/forgot">Lupa Password Anda ?</a>
                </p>
                <p class="mb-0">
                    <a href="/admin" class="text-center">Sudah Punya Akun ?</a>
                </p>
            </div>

        </div>
    </div>
    <!-- /.login-box -->

    @include('anggota.script')
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });
            $("#show_hide_password2 a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password2 input').attr("type") == "text") {
                    $('#show_hide_password2 input').attr('type', 'password');
                    $('#show_hide_password2 i').addClass("fa-eye-slash");
                    $('#show_hide_password2 i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password2 input').attr('type', 'text');
                    $('#show_hide_password2 i').removeClass("fa-eye-slash");
                    $('#show_hide_password2 i').addClass("fa-eye");
                }
            });
        });
    </script>
</body>

</html>