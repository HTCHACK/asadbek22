<template>
    <div class="container">
        <table class="table table-bordered" style="background: #fff">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Содержание</th>
                    <th scope="col">Номер телефона</th>
                    <th scope="col">Название тура</th>
                    <th scope="col">Подтверждать</th>
                    <th scope="col">Настройки</th>
                </tr>
            </thead>
            <tbody v-if="comments.length > 0">
                <tr scope="row" v-for="comment in comments" :key="comment.id">
                    <td>{{ comment.id }}</td>
                    <td>{{ comment.name }}</td>
                    <td>
                        <el-button type="text" @click="dialogVisible = true"
                            >Деталь</el-button
                        >

                        <el-dialog
                            :title="'Тур пакеть : ' + comment.tour.city"
                            :visible.sync="dialogVisible"
                            width="90%"
                            height="50%"
                        >
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Комментарии</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tr>
                                    <td>{{ comment.content }}</td>
                                </tr>
                                <tbody></tbody>
                            </table>
                        </el-dialog>
                    </td>
                    <td>{{ comment.phone_number }}</td>
                    <td>{{ comment.tour.city }}</td>
                    <td>
                        <p v-if="comment.confirm == 0">
                            <el-button
                                plain
                                @click.prevent="confirmComments(comment.id)"
                                type="primary"
                            >
                                <i class="fa fa-check-circle"></i> Confirm
                            </el-button>
                        </p>
                        <p v-else>
                            <el-button
                                plain
                                @click.prevent="unconfirmComments(comment.id)"
                                type="danger"
                            >
                                <i class="fa fa-times-circle"></i> Unconfirm
                            </el-button>
                        </p>
                    </td>
                    <td>
            <el-button
                @click.prevent="deleteComments(comment.id)"
                type="danger"
                icon="el-icon-delete"
                size="medium"
                circle
            ></el-button>
        </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr scope="row">
                    <td colspan="7">Еще нет Комментарии</td>
                </tr>
            </tbody>

            <tbody></tbody>
        </table>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    data() {
        return {
            dialogVisible: false,
            confirm: 1,
        };
    },
    computed: {
        ...mapGetters({
            comments: "category/comments",
        }),
    },

    mounted() {
        this.getComments();
    },

    methods: {
        ...mapActions({
            getComments: "category/getComments",
        }),

        confirmComments(id) {
            this.$confirm("Подтверждать Комментарии", "Предупреждение", {
                confirmButtonText: "Да",
                cancelButtonText: "Нет",
                type: "warning",
            })
                .then(() => {
                    axios
                        .put("/api/comments/" + id, this.confirm, {
                            headers: {
                                "Content-type": "application/json",
                            },
                        })
                        .then((response) => {
                            console.log(response);
                            this.$notify({
                                title: "Комментарии Подтверждать",
                                message: "Подтверждать",
                                type: "info",
                            });
                            this.getComments();
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
                        type: "error",
                        message: "Комментарии Подтверждать отменено",
                    });
                });
        },
        unconfirmComments(id) {
            this.$confirm("Подтверждать Комментарии", "Предупреждение", {
                confirmButtonText: "Да",
                cancelButtonText: "Нет",
                type: "warning",
            })
                .then(() => {
                    this.confirm = 0;
                    let confirm = this.confirm;
                    axios
                        .put("/api/unconfirm/" + id, confirm, {
                            headers: {
                                "Content-type": "application/json",
                            },
                        })
                        .then((response) => {
                            console.log(response);
                            this.$notify({
                                title: "удалено Подтверждать",
                                message: "Подтверждать",
                                type: "info",
                            });
                            this.getComments();
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
                        type: "error",
                        message: "удалено Подтверждать отменено",
                    });
                });
        },

        deleteComments(id) {
            this.$confirm("Комментарии удалены", "Предупреждение", {
                confirmButtonText: "Да",
                cancelButtonText: "Нет",
                type: "warning",
            })
                .then(() => {
                    axios
                        .delete("/api/comments/" + id, {
                            headers: {
                                "Content-type": "application/json",
                            },
                        })
                        .then((response) => {
                            console.log(response);
                            this.$notify({
                                title: "Успешно удалено",
                                message: "Удалено",
                                type: "info",
                            });
                            this.getComments();
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
                        type: "info",
                        message: "Удалить отменено",
                    });
                });
        },
    },
};
</script>

<style scoped>
.container {
    margin-top: 2rem;
}
.paragraph {
    font-weight: bold;
    padding-bottom: 1rem;
}
</style>
