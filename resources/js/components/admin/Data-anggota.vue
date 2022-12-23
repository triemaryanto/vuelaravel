<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Data Anggota</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="showModal">
                                Tambah Anggota
                            </button>
                        </div>
                        <!-- Modal -->
                        <div
                            class="modal fade"
                            id="modalmuncul"
                            tabindex="-1"
                            aria-labelledby="modalmuncul"
                            aria-hidden="true"
                        >
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5
                                            class="modal-title"
                                            id="exampleModalLabel"
                                            v-show="!statusmodal"
                                        >
                                            Tambah Anggota
                                        </h5>
                                        <h5
                                            class="modal-title"
                                            id="exampleModalLongTitle"
                                            v-show="statusmodal"
                                        >
                                            Ubah Pengguna
                                        </h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"
                                        ></button>
                                    </div>

                                    <form
                                        ref="anyName"
                                        @submit.prevent="
                                            statusmodal
                                                ? ubahData()
                                                : simpanData()
                                        "
                                    >
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input
                                                    type="number"
                                                    v-model="form.username"
                                                    class="form-control"
                                                    placeholder="Id Anggota"
                                                    required
                                                />
                                                <div
                                                    class="alert-danger errors"
                                                    v-if="errors.username"
                                                >
                                                    {{ errors.username[0] }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input
                                                    type="text"
                                                    v-model="form.nama_anggota"
                                                    class="form-control"
                                                    placeholder="Nama Anggota"
                                                    required
                                                />
                                                <div
                                                    class="alert-danger errors"
                                                    v-if="errors.nama_anggota"
                                                >
                                                    {{ errors.nama_anggota[0] }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <select
                                                    class="form-control control2"
                                                    v-model="form.jenis_kelamin"
                                                    required
                                                >
                                                    <div
                                                        class="alert-danger errors"
                                                        v-if="
                                                            errors.jenis_kelamin
                                                        "
                                                    >
                                                        {{
                                                            errors
                                                                .jenis_kelamin[0]
                                                        }}
                                                    </div>
                                                    <option value>
                                                        Jenis Kelamin
                                                    </option>
                                                    <option value="Pria">
                                                        Pria
                                                    </option>
                                                    <option value="Wanita">
                                                        Wanita
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input
                                                    type="text"
                                                    v-model="form.alamat"
                                                    class="form-control"
                                                    placeholder="Alamat"
                                                    required
                                                />
                                                <div
                                                    class="alert-danger errors"
                                                    v-if="errors.alamat"
                                                >
                                                    {{ errors.alamat[0] }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input
                                                    type="text"
                                                    v-model="form.kelompok"
                                                    class="form-control"
                                                    placeholder="Kelompok"
                                                    required
                                                />
                                                <div
                                                    class="alert-danger errors"
                                                    v-if="errors.kelompok"
                                                >
                                                    {{ errors.kelompok[0] }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input
                                                    type="text"
                                                    v-model="form.petugas"
                                                    class="form-control"
                                                    placeholder="Petugas"
                                                    required
                                                />
                                                <div
                                                    class="alert-danger errors"
                                                    v-if="errors.petugas"
                                                >
                                                    {{ errors.petugas[0] }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <select
                                                    class="form-control control2"
                                                    v-model="form.id_cabang"
                                                    required
                                                >
                                                    <option value>
                                                        Pilih Wilayah
                                                    </option>
                                                    <option
                                                        v-for="a in wilayahs"
                                                        :key="a.id"
                                                        :value="a.id"
                                                    >
                                                        {{ a.nama_cabang }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button
                                                type="button"
                                                class="btn btn-secondary"
                                                data-bs-dismiss="modal"
                                            >
                                                Close
                                            </button>
                                            <button
                                                type="submit"
                                                class="btn btn-primary"
                                                :disabled="disabled"
                                                v-show="!statusmodal"
                                            >
                                                <i
                                                    v-show="loading"
                                                    class="fa fa-spinner fa-spin"
                                                ></i>
                                                Simpan
                                            </button>
                                            <button
                                                type="submit"
                                                class="btn btn-success"
                                                :disabled="disabled"
                                                v-show="statusmodal"
                                            >
                                                <i
                                                    v-show="loading"
                                                    class="fa fa-spinner fa-spin"
                                                ></i>
                                                Save changes
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-3">
                        <form @submit.prevent="loadData">
                            <div class="row">
                                <div class="col-md-2">
                                    <strong>Search By:</strong>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select
                                            class="form-control"
                                            v-model="searchField"
                                            required
                                        >
                                            <option value>Pilih</option>
                                            <option value="username">
                                                Username
                                            </option>
                                            <option value="nama_anggota">
                                                Nama
                                            </option>
                                            <option value="alamat">
                                                alamat
                                            </option>
                                            <option value="kelompok">
                                                Kelompok
                                            </option>
                                            <option value="petugas">
                                                Petugas
                                            </option>
                                            <option value="nama_cabang">
                                                Wilayah
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Input Here"
                                        v-model="search"
                                    />
                                </div>
                                <div class="col-md-2">
                                    <button
                                        type="submit"
                                        class="btn btn-primary form-control"
                                    >
                                        <i class="fas fa-search"></i
                                        ><a>Cari Data</a>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="table table-responsive">
                                <table
                                    id="example2"
                                    class="table table-bordered table-hover"
                                >
                                    <tr>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>alamat</th>
                                        <th>kelompok</th>
                                        <th>Petugas</th>
                                        <th>Wilayah</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <tr
                                        v-for="item in anggotas.data"
                                        :key="item.id"
                                    >
                                        <td>{{ item.username }}</td>
                                        <td>{{ item.nama_anggota }}</td>
                                        <td>{{ item.alamat }}</td>
                                        <td>{{ item.kelompok }}</td>
                                        <td>{{ item.petugas }}</td>
                                        <td>{{ item.nama_cabang }}</td>
                                        <td>
                                            <a href="#" @click="EditModal(item)"
                                                ><i class="fas fa-edit blue"></i
                                            ></a>
                                            |
                                            <a
                                                href="#"
                                                @click="deleteData(item.id)"
                                                ><i
                                                    class="fas fa-trash-alt red"
                                                ></i
                                            ></a>
                                        </td>
                                    </tr>
                                </table>
                                <div class="container">
                                    <pagination
                                        :data="anggotas"
                                        @pagination-change-page="loadData"
                                    ></pagination>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <vue-progress-bar></vue-progress-bar>
    </div>
</template>

<script>
import Form from "vform";

export default {
    data() {
        return {
            loading: false,
            disabled: false,
            anggotas: {},
            wilayahs: {},
            search: "",
            searchField: "",
            statusmodal: false,
            form: new Form({
                id: "",
                username: "",
                nama_anggota: "",
                jenis_kelamin: "",
                alamat: "",
                kelompok: "",
                petugas: "",
                id_cabang: "",
            }),
            errors: {},
        };
    },

    mounted() {
        this.loadData();
    },

    methods: {
        // searchAnggota() {
        //     axios
        //         .get("/api/anggota?search" + this.search)
        //         .then((response) => (this.anggotas = response.data));
        // },
        loadData(page = 1) {
            this.$Progress.start();
            // axios.get("api/dataanggota?page=" + page);
            axios
                .get(
                    `api/dataanggota?page=${page}&search=${this.search}&searchField=${this.searchField}`
                )
                .then((response) => {
                    this.anggotas = response.data;
                    this.$Progress.finish();
                })
                .catch((e) => {
                    console.log(e);
                    this.$Progress.fail();
                });
            axios
                .get("api/datawilayah")
                .then(({ data }) => (this.wilayahs = data));
        },

        showModal() {
            this.statusmodal = false;
            this.form.reset();
            $("#modalmuncul").modal("show");
        },
        EditModal(item) {
            this.statusmodal = true;
            this.form.reset();
            $("#modalmuncul").modal("show");
            this.form.fill(item);
        },
        simpanData() {
            this.loading = true;
            this.disabled = true;
            axios
                .post("api/anggota", this.form)
                .then(() => {
                    Fire.$emit("refreshData");
                    $("#modalmuncul").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: "Data Tersimpan",
                    });
                    this.loading = false;
                    this.disabled = false;
                })
                .catch((error) => {
                    this.loading = false;
                    this.disabled = false;
                    console.log(error.response.data.errors);
                    this.errors = error.response.data.errors;
                });
        },
        ubahData() {
            // console.log("ubah data");

            this.loading = true;
            this.disabled = true;
            this.form
                .put("api/anggota/" + this.form.id)
                .then(() => {
                    Fire.$emit("refreshData");
                    $("#modalmuncul").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: "Data Berubah",
                    });
                    this.loading = false;
                    this.disabled = false;
                })
                .catch((error) => {
                    this.loading = false;
                    this.disabled = false;
                    console.log(error.response.data.errors);
                    this.errors = error.response.data.errors;
                });
        },
        deleteData(id) {
            Swal.fire({
                title: "Anda Yakin Ingin Menghapus Data Ini ?",
                text: "Klik Batal Untuk Membatalkan Penghapusan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus",
            }).then((result) => {
                if (result.value) {
                    this.form
                        .delete("api/anggota/" + id)
                        .then(() => {
                            Swal.fire(
                                "Terhapus",
                                "Data Anda Sudah Tehapus",
                                "success"
                            );
                            Fire.$emit("refreshData");
                        })
                        .catch(() => {
                            Swal.fire(
                                "Gagal",
                                "Data Gagal Terhapus",
                                "warning"
                            );
                        });
                }
            });
        },
    },
    created() {
        this.loadData();
        Fire.$on("refreshData", () => {
            this.loadData();
        });
    },
};
</script>
