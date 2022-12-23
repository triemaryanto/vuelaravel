<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Data Wilayah</div>

                    <div class="card-body">
                        <div class="form-group">
                            <div class="table table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>nama Wilayah</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <tr
                                        v-for="item in wilayahs"
                                        :key="item.message"
                                    >
                                        <td>{{ item.nama_cabang }}</td>
                                        <td>Edit | Hapus</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { assertExpressionStatement } from "@babel/types";

export default {
    data() {
        return {
            wilayahs: {},
        };
    },
    methods: {
        loadData() {
            axios
                .get("api/datawilayah")
                .then(({ data }) => (this.wilayahs = data));
        },
    },
    created() {
        this.loadData();
    },
};
</script>
