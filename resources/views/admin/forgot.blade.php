<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
    <title>Login | Admin</title>
</head>

<body class="hold-transition login-page">
    <div class="login-box" id="app">
        <div class="login-logo">
            <a href="#"><b>Ubah Password </b> <br> RAT 2023</a>
        </div>
        @include('includes.flash_message')
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Bantuan untuk yang tidak bisa login dikarenakan Lupa Password</p>
                <form action="{{ route('reset.password') }}" method="post">
                    @csrf()
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>

                    </div>
                </form>

                <p class="mb-1">
                    <a href="/admin/">Login</a>
                </p>
                <p class="mb-0">
                    <a href="/admin/register" class="text-center">Buat Akun</a>
                </p>
            </div>

        </div>
    </div>
    <!-- /.login-box -->

    @include('anggota.script')
</body>

</html>