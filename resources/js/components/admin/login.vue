<template>
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="" method="post">
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" />
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input
                    type="password"
                    class="form-control"
                    placeholder="Password"
                />
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" />
                        <label for="remember"> Remember Me </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">
                        Sign In
                    </button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!-- /.social-auth-links -->

        <p class="mb-1">
            <a href="#" @click="forgotModal()">I forgot my password</a>
        </p>
        <p class="mb-0">
            <a href="#" @click="addUserModal()">Register Account</a>
        </p>

        <!--modal-->
        <div
            class="modal fade"
            id="modalforgot"
            tabindex="-1"
            aria-labelledby="modalmuncul"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            You forgot your password? Here you can easily
                            retrieve a new password.
                        </h5>
                    </div>

                    <form @submit.prevent="forgotEmail()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input
                                    type="email"
                                    v-model="form.email2"
                                    class="form-control"
                                    placeholder="Masukan Email"
                                    required
                                />
                                <div
                                    class="alert-danger errors"
                                    v-if="errors.email2"
                                >
                                    {{ errors.email2[0] }}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i
                                    v-show="loading"
                                    class="fa fa-spinner fa-spin"
                                ></i>
                                Request new password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div
            class="modal fade"
            id="modaladduser"
            tabindex="-1"
            aria-labelledby="modalmuncul"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="login-box-msg ">
                            Register a new membership
                        </h5>
                    </div>

                    <form @submit.prevent="forgotEmail()">
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Full name"
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input
                                    type="email"
                                    class="form-control"
                                    placeholder="Email"
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input
                                    type="password"
                                    class="form-control"
                                    placeholder="Password"
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input
                                    type="password"
                                    class="form-control"
                                    placeholder="Retype password"
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >
                                Batal
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i
                                    v-show="loading"
                                    class="fa fa-spinner fa-spin"
                                ></i>
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Form from "vform";
export default {
    data() {
        return {
            loading: false,
            form: new Form({
                email2: "",
            }),
            errors: {},
        };
    },
    methods: {
        forgotModal() {
            this.form.reset();
            $("#modalforgot").modal("show");
        },
        addUserModal() {
            this.form.reset();
            $("#modaladduser").modal("show");
        },
    },
};
</script>
