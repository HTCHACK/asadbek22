<template>
    <tr scope="row">
        <td>{{ tour.id }}</td>
        <td>{{ tour.city }}</td>
        <td>{{ tour.tour_category.name }}</td>
        <td>
            <img
                height="40px"
                width="auto"
                v-bind:src="'/storage/' + tour.picture"
                alt=""
            />
        </td>
        <td>{{ tour.price }}</td>
        <td>
            <p v-if="tour.is_published == 1">Да</p>
            <p v-else>Нет</p>
        </td>
        <td>{{ tour.lang }}</td>
        <td>
            <el-button
                @click="drawer = true"
                @click.prevent="pushItem(tour.id)"
                type="primary"
                icon="el-icon-edit"
                size="medium"
                circle
            ></el-button>
            <el-drawer
                :withHeader="false"
                :visible.sync="drawer"
                :direction="direction"
                size="90%"
            >
                <div
                    class="save"
                    style="
                       
                        background: #4376a6;
                        width: 100%;
                    "
                >
                    <p class="cancel">
                        <el-button type="danger" @click.prevent="backto">
                            Закрыт
                        </el-button>
                    </p>
                    <p class="head" v-if="tour.city == ''">
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
                            @click.prevent="editTour(tour.id)"
                            :loading="edit_loading"
                            type="primary"
                        >
                            <i class="fa fa-save"></i> Редактировать и Закрыт
                        </el-button>
                    </p>
                </div>
                <div class="container" style="padding-top: 2rem"></div>
            </el-drawer>
        </td>
        <td>
            <el-button
                @click.prevent="deleteTour(tour.id)"
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
            editData: {},
            edit_loading: false,
        };
    },
    props: ["tour"],

    mounted() {
        this.getCategory();
        this.getTours();
    },

    methods: {
        ...mapActions({
            getCategory: "category/getCategories",
            getTours: "category/getTours",
        }),

        backto() {
            this.drawer = false;
        },

        deleteTour(id) {
            this.$confirm("Tуры  удалены", "Предупреждение", {
                confirmButtonText: "Да",
                cancelButtonText: "Нет",
                type: "warning",
            })
                .then(() => {
                    axios
                        .delete("/api/tours/" + id, {
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
                            this.getTours();
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
                .get("/api/tours/" + id)
                .then(({ data }) => (this.editData = data[0][0]));
        },

        editTour(id) {
            this.edit_loading = true;
            axios
                .put("/api/tours/" + id, this.editData, {
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
                    this.getTours();
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
