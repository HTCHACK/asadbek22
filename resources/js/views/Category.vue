<template>
    <div class="container">
        <div class="asad">
            <el-button
                @click="drawer = true"
                type="success"
                style="margin-left: 16px"
            >
                <i class="fa fa-plus"></i> Добавить категорию
            </el-button>
        </div>
        <el-input
            placeholder="Поиск категории"
            v-model="search"
            clearable
            style="width: 75%; margin-left: -3.5rem"
        >
        </el-input>
        <br /><br />
        <div class="drawer-container">
            <el-drawer
                :withHeader="false"
                :visible.sync="drawer"
                :direction="direction"
                size="40%"
            >
                <div class="save" style="background: #4376a6; width: 100%">
                    <p class="cancel">
                        <el-button type="danger" @click.prevent="backMain">
                            Закрыт
                        </el-button>
                    </p>
                    <p class="head" v-if="value.name == ''">
                        <el-button
                            @click.prevent="createCategory"
                            :loading="loading"
                            type="success"
                            disabled
                        >
                            <i class="fa fa-save"></i> Сохранить и Закрыт
                        </el-button>
                    </p>
                    <p class="head" v-else>
                        <el-button
                            @click.prevent="createCategory"
                            :loading="loading"
                            type="success"
                        >
                            <i class="fa fa-save"></i> Сохранить и Закрыт
                        </el-button>
                    </p>
                </div>
                <div class="container" style="padding-top: 2rem">
                    <el-input
                        v-on:reloadlist="getCategory"
                        placeholder="Тип Категория  "
                        v-model="value.name"
                        clearable
                        style="margin-top: 2rem"
                    >
                    </el-input>
                </div>
            </el-drawer>
        </div>
        <table class="table table-bordered" style="background: #fff"  v-loading="table_loading">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Названный</th>
                    <th scope="col">Деталь</th>
                    <th scope="col" colspan="2">Настройки</th>
                </tr>
            </thead>
            <tbody v-if="!filteredCategory.length || categories.length < 1">
                <tr scope="row">
                    <td colspan="4">Еще нет категорию</td>
                </tr>
            </tbody>
            <tbody v-else>
                <category-card
                    v-for="category in filteredCategory"
                    :key="category.id"
                    :category="category"
                />
            </tbody>

            <tbody></tbody>
        </table>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import categoryCard from "../components/categoryCard.vue";

export default {
    components: {
        categoryCard,
    },

    data() {
        return {
            drawer: false,
            direction: "rtl",
            value: {
                name: "",
            },
            loading: false,
            search: "",
            table_loading:false,
        };
    },

    computed: {
        ...mapGetters({
            categories: "category/categories",
        }),

        filteredCategory() {
            return this.categories.filter((category) => {
                const name = category.name.toString().toLowerCase();
                const searchTerm = this.search.toLowerCase();
                return name.includes(searchTerm);
            });
        },
    },

    mounted() {
        this.getCategory();
    },

    methods: {
        ...mapActions({
            getCategory: "category/getCategories",
        }),

        backMain() {
            this.drawer = false;
            this.value.name = "";
        },

        createCategory() {
            this.loading = true;
            axios
                .post("/api/tour_categories", this.value, {
                    headers: {
                        "Content-type": "application/json",
                    },
                })

                .then((response) => {
                    console.log(response);

                    this.$notify({
                        title: "Категория успешно создана",
                        message: "Созданный",
                        type: "success",
                    });
                    this.$emit("reloadlist");
                    this.value.name = "Тип Категория";
                    this.drawer = false;
                    this.loading = false;
                    this.getCategory();
                })
                .catch((err) => {
                    console.log(err);
                    this.$notify({
                        title: "500 Ошибка сервера",
                        message: "Что-то не так",
                        type: "error",
                    });
                    this.loading = false;
                });
        },
    },
};
</script>

<style scoped>
.container {
    margin-top: 2rem;
}

.select_ma {
    padding-bottom: 2rem;
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
.select_m {
    padding-bottom: 6rem;
}
h2 {
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    padding: 30px 0;
}

.asad {
    float: right;
    padding-right: 1rem;
    padding-bottom: 1.3rem;
}
.sel {
    float: left;
    width: 60%;
    padding-bottom: 2rem;
}

.ag {
    float: left;
    width: 100%;
    padding-bottom: 2rem;
}

.date {
    float: left;
    width: 60%;
}

.save {
    float: right;
}

/* Table Styles */
</style>
