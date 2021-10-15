<template>
    <tr scope="row">
        <td>{{ category.id }}</td>
        <td>{{ category.name }}</td>
        <td>
            <el-button type="text" @click="dialogVisible = true"
                >Деталь</el-button
            >

            <el-dialog
                title="Категория"
                :visible.sync="dialogVisible"
                width="90%"
                height="50%"
            >
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Названный</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tr>
                        <td>{{ category.id }}</td>
                        <td>{{ category.name }}</td>
                    </tr>
                    <tbody></tbody>
                </table>
            </el-dialog>
        </td>
        <td>
            <el-button
                @click="drawer = true"
                @click.prevent="pushItem(category.id)"
                type="primary"
                icon="el-icon-edit"
                size="medium"
                circle
            ></el-button>
            <el-drawer
                :withHeader="false"
                :visible.sync="drawer"
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
                            @click.prevent="editCategory(category.id)"
                            :loading="edit_loading"
                            type="primary"
                        >
                            <i class="fa fa-save"></i> Редактировать и Закрыт
                        </el-button>
                    </p>
                </div>
                <div class="container" style="padding-top: 2rem">
                    <el-input
                        v-model="editData.name"
                        clearable
                        style="margin-top: 2rem"
                    >
                    </el-input>
                </div>
            </el-drawer>
        </td>
        <td>
            <el-button
                @click.prevent="deleteCategory(category.id)"
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
        };
    },
    props: ["category"],

    mounted() {
        this.getCategory();
    },

    methods: {
        ...mapActions({
            getCategory: "category/getCategories",
        }),

        backTo() {
            this.drawer = false;
        },

        deleteCategory(id) {
            this.$confirm(
                "Если вы удалите категорию, туры будут удалены",
                "Предупреждение",
                {
                    confirmButtonText: "Да",
                    cancelButtonText: "Нет",
                    type: "warning",
                }
            )
                .then(() => {
                    axios
                        .delete("/api/tour_categories/" + id, {
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
                            this.getCategory();
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
                .get("/api/tour_categories/" + id)
                .then(({ data }) => (this.editData = data[0][0]));
        },

        editCategory(id) {
            this.edit_loading = true;
            axios
                .put("/api/tour_categories/" + id, this.editData, {
                    headers: {
                        "Content-type": "application/json",
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
                    this.getCategory();
                })
                .catch((err) => {
                    console.log(err);
                    this.$notify({
                        title: "500 Ошибка сервера",
                        message: "Что-то не так",
                        type: "error",
                    });
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
