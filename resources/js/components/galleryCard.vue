<template>
    <tr scope="row">
        <td>{{ gallery.id }}</td>
        <td>{{ gallery.name }}</td>
        <td>
            <img
                height="40px"
                width="auto"
                v-bind:src="'/storage/' + gallery.picture"
                alt=""
            />
        </td>
        <td>
            <el-button
                @click="drawer = true"
                @click.prevent="pushItem(gallery.id)"
                type="primary"
                icon="el-icon-edit"
                size="medium"
                circle
            ></el-button>
            <el-drawer
                :visible.sync="drawer"
                :withHeader="false"
                :direction="direction"
                size="40%"
            >
                <div class="save" style="background: #4376a6; width: 100%">
                    <p class="cancel">
                        <el-button type="danger" @click.prevent="backTo">
                            Закрыт
                        </el-button>
                    </p>
                    <p class="head" v-if="editData.name == ''">
                        <el-button
                            :loading="edit_loading"
                            type="primary"
                            disabled
                        >
                            <i class="fa fa-save"></i> Редактировать и Закрыт
                        </el-button>
                    </p>
                    <p class="head" v-else>
                        <el-button
                            @click.prevent="editCategory(gallery.id)"
                            :loading="edit_loading"
                            type="primary"
                        >
                            <i class="fa fa-save"></i> Редактировать и Закрыт
                        </el-button>
                    </p>
                </div>
                <div class="container" style="padding-top: 2rem">
                    <el-input
                        placeholder="Названный  "
                        v-model="editData.name"
                        clearable
                        style="margin-top: 2rem"
                    >
                    </el-input>
                    <br /><br />
                    <img
                        height="50px"
                        width="120px"
                        style="padding-right: 2rem"
                        v-bind:src="'/storage/' + editData.picture"
                        alt=""
                    />

                    <input
                        type="file"
                        id="customFile"
                        ref="file"
                        @change="handleFileObject()"
                    />
                </div>
            </el-drawer>
        </td>
        <td>
            <el-button
                @click.prevent="deleteGallery(gallery.id)"
                type="danger"
                icon="el-icon-delete"
                size="medium"
                circle
            ></el-button>
        </td>
    </tr>
</template>
<script>
import { mapActions } from "vuex";
import _ from "lodash";

export default {
    data() {
        return {
            drawer: false,
            direction: "rtl",
            dialogVisible: false,
            editData: {},
            edit_loading: false,
            picture: null,
        };
    },
    props: ["gallery"],

    mounted() {
        this.getGallery();
    },

    methods: {
        ...mapActions({
            getGallery: "category/getGallery",
        }),

        backTo() {
            this.drawer = false;
        },

        deleteGallery(id) {
            this.$confirm("Вы хотите удалить галерею", "Предупреждение", {
                confirmButtonText: "Да",
                cancelButtonText: "Нет",
                type: "warning",
            })
                .then(() => {
                    axios
                        .delete("/api/galleries/" + id, {
                            headers: {
                                "Content-Type":
                                    "multipart/form-data; charset=utf-8; boundary=" +
                                    Math.random().toString().substr(2),
                            },
                        })
                        .then((response) => {
                            console.log(response);
                            this.$notify({
                                title: "Успешно удалено",
                                message: "Удалено",
                                type: "info",
                            });
                            this.getGallery();
                        })
                        .catch((err) => {
                            console.log(err);
                            this.$notify({
                                title: "500 Ошибка сервера",
                                message: "Что-то не так",
                                type: "error",
                            });
                        });
                })
                .catch(() => {
                    this.$message({
                        showClose: true,
                        message: "Удалить отменено",
                        type: "error",
                    });
                });
        },

        pushItem(id) {
            axios
                .get("/api/galleries/" + id)
                .then(({ data }) => (this.editData = data[0][0]));
        },

        handleFileObject() {
            this.picture = this.$refs.file.files[0];
        },

        editCategory(id) {
            this.edit_loading = true;

            axios
                .put("/api/galleries/" + id, this.editData, {
                    headers: {
                        "Content-Type":
                            "multipart/form-data; charset=utf-8; boundary=" +
                            Math.random().toString().substr(2),
                    },
                })
                .then((response) => {
                    console.log(response);
                    this.$notify({
                        title: "Успешно обновлено",
                        message: "обновлено",
                        type: "info",
                    });
                    this.drawer = false;
                    this.edit_loading = false;
                    this.getGallery();
                })
                .catch((err) => {
                    console.log(err);
                    this.$notify({
                        title: "500 Ошибка сервера",
                        message: "Что-то не так",
                        type: "error",
                    });
                    this.edit_loading = false;
                });
        },
    },
};
</script>
<style scoped>
.container {
    margin-bottom: 2rem;
}
.head {
    float: right;
    padding-right: 1rem;
    padding-top: 1rem;
}

.cancel {
    float: right;
    padding-right: 1rem;
    padding-top: 1rem;
}

.save {
    float: right;
}
</style>