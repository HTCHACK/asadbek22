<template>
    <div class="container">
        <div class="asad">
            <el-button
                @click="drawer = true"
                type="success"
                style="margin-left: 16px"
            >
                <i class="fa fa-plus"></i> Добавить тур
            </el-button>
        </div>

        <el-input
            placeholder="Поиск категории и города и язык"
            v-model="search"
            clearable
            style="width: 80%; margin-left: -3.5rem"
        >
        </el-input>
        <br /><br />
        <div class="drawer-container">
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
                        <el-button type="danger" @click.prevent="backTour">
                            Закрыт
                        </el-button>
                    </p>
                    <p class="head" v-if="formData.title == ''">
                        <el-button
                            @click.prevent="createTour"
                            :loading="loading"
                            type="success"
                            disabled
                        >
                            <i class="fa fa-save"></i> Сохранить и Закрыт
                        </el-button>
                    </p>
                    <p class="head" v-else>
                        <el-button
                            @click.prevent="createTour"
                            :loading="loading"
                            type="success"
                        >
                            <i class="fa fa-save"></i> Сохранить и Закрыт
                        </el-button>
                    </p>
                </div>
                <div class="container" style="padding-top: 4rem">
                    <form style="padding-bottom: 2rem;padding-top:3rem">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h3 style="text-align: left; font-weight: bold">
                                    Название турпакет
                                </h3>
                                <el-input
                                    placeholder="Название турпакет"
                                    v-model="formData.title"
                                    clearable
                                    required
                                >
                                </el-input>
                            </div>
                            <div class="form-group col-md-6">
                                <h3 style="text-align: left; font-weight: bold">
                                    Город
                                </h3>
                                <el-input
                                    placeholder="Город"
                                    v-model="formData.city"
                                    required
                                    clearable
                                >
                                </el-input>
                            </div>
                            <div class="form-group col-md-6">
                                <h3 style="text-align: left; font-weight: bold">
                                    Телефонный номер
                                </h3>
                                <el-input
                                    placeholder="Телефонный номер"
                                    v-model="formData.phone_number"
                                    required
                                    clearable
                                >
                                </el-input>
                            </div>
                            <div class="form-group col-md-6">
                                <h3 style="text-align: left; font-weight: bold">
                                    Цена
                                </h3>
                                <el-input
                                    placeholder="Цена"
                                    v-model="formData.price"
                                    required
                                    clearable
                                >
                                </el-input>
                            </div>
                            <div class="form-group col-md-6">
                                <h3 style="text-align: left; font-weight: bold">
                                    Локации
                                </h3>
                                <el-input
                                    placeholder="Локации"
                                    v-model="formData.location"
                                    required
                                    clearable
                                >
                                </el-input>
                            </div>
                            <div class="form-group col-md-6">
                                <h3 style="text-align: left; font-weight: bold">
                                    Страна
                                </h3>
                                <el-input
                                    placeholder="Страна"
                                    v-model="formData.country"
                                    required
                                    clearable
                                >
                                </el-input>
                            </div>
                        </div>
                        <br />
                        <div class="form-group">
                            <h3 style="text-align: left; font-weight: bold">
                                Содержание
                            </h3>
                            <el-input
                                type="textarea"
                                placeholder="Содержание"
                                v-model="formData.content"
                                required
                            ></el-input>
                        </div>
                        <br />
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h3 style="text-align: left; font-weight: bold">
                                    Категория
                                </h3>
                                <el-select
                                    v-model="formData.tour_category_id"
                                    clearable
                                    placeholder="Select Category"
                                    class="ag"
                                >
                                    <el-option
                                        v-for="category in categories"
                                        :key="category.id"
                                        :label="category.name"
                                        :value="category.id"
                                    >
                                    </el-option>
                                </el-select>
                            </div>
                            <div class="form-group col-md-6">
                                <h3 style="text-align: left; font-weight: bold">
                                    Какой язык ?...
                                </h3>
                                <el-select
                                    v-model="formData.lang"
                                    clearable
                                    placeholder="Какой язык ?..."
                                    class="ag"
                                >
                                    <el-option value="uz">O'zbek</el-option>
                                    <el-option value="en">English</el-option>
                                    <el-option value="ru">Pусский</el-option>
                                </el-select>
                            </div>
                            <div class="form-group col-md-6">
                                <h3 style="text-align: left; font-weight: bold">
                                    Это готово ?......
                                </h3>
                                <el-select
                                    v-model="formData.is_published"
                                    clearable
                                    placeholder="Это готово ?..."
                                    class="ag"
                                >
                                    <el-option value="0">НЕТ</el-option>
                                    <el-option value="1">Да</el-option>
                                </el-select>
                            </div>
                            <div class="form-group col-md-6">
                                <h3 style="text-align: left; font-weight: bold">
                                    Это популярно ?...
                                </h3>
                                <el-select
                                    v-model="formData.is_popular"
                                    clearable
                                    placeholder="Это популярно ?..."
                                    class="ag"
                                >
                                    <el-option value="0">НЕТ</el-option>
                                    <el-option value="1">Да</el-option>
                                </el-select>
                            </div>
                            <div class="form-group col-md-6">
                                <h3 style="text-align: left; font-weight: bold">
                                    Это въездной или выездной туризм ?...
                                </h3>
                                <el-select
                                    v-model="formData.is_it_here"
                                    clearable
                                    placeholder="Это въездной или выездной туризм ?..."
                                    class="ag"
                                >
                                    <el-option value="0">въездной</el-option>
                                    <el-option value="1">выездной</el-option>
                                </el-select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <input
                                    type="file"
                                    class="form-control-file"
                                    id="customFile"
                                    ref="file"
                                    @change="handleFileObject()"
                                />
                            </div>
                        </div>
                    </form>
                </div>
            </el-drawer>
        </div>

        <table class="table table-bordered" style="background: #fff">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Названный</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Изображение</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Готово</th>
                    <th scope="col">Язык</th>
                    <th scope="col" colspan="2">Настройки</th>
                </tr>
            </thead>
            <tbody v-if="tours.length > 0">
                <tour-card
                    v-for="tour in filteredTours"
                    :key="tour.id"
                    :tour="tour"
                />
            </tbody>
            <tbody v-else>
                <tr scope="row">
                    <td colspan="8">Еще нет тур</td>
                </tr>
            </tbody>
            <tbody></tbody>
        </table>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import tourCard from "../components/tourCard.vue";

export default {
    components: {
        tourCard,
    },

    data() {
        return {
            drawer: false,
            direction: "rtl",
            formData: {
                tour_category_id: "",
                title: "",
                user_id: 1,
                phone_number: "",
                location: "",
                content: "",
                country: "",
                city: "",
                is_published: "",
                is_popular: "",
                price: "",
                is_it_here: "",
                lang: "",
            },
            picture: null,
            loading: false,
            search: "",
        };
    },

    computed: {
        ...mapGetters({
            categories: "category/categories",
            tours: "category/tours",
        }),
        filteredTours() {
            return this.tours.filter((tour) => {
                const city = tour.city.toString().toLowerCase();
                const title = tour.tour_category.name.toLowerCase();
                const lang = tour.lang.toLowerCase();
                const searchTerm = this.search.toLowerCase();
                return (
                    city.includes(searchTerm) ||
                    title.includes(searchTerm) ||
                    lang.includes(searchTerm)
                );
            });
        },
    },

    mounted() {
        this.getCategory();
        this.getTours();
    },

    methods: {
        ...mapActions({
            getCategory: "category/getCategories",
            getTours: "category/getTours",
        }),

        backTour() {
            this.drawer = false;
        },
        createTour() {
            this.loading = true;

            let formData = new FormData();

            formData.append("picture", this.picture);

            _.each(this.formData, (value, key) => {
                formData.append(key, value);
            });

            console.log(formData);
            axios
                .post("/api/tours", formData, {
                    headers: {
                        "Content-Type":
                            "multipart/form-data; charset=utf-8; boundary=" +
                            Math.random().toString().substr(2),
                    },
                })

                .then((response) => {
                    console.log(response);

                    this.$notify({
                        title: "Tур успешно создана",
                        message: "Созданный",
                        type: "success",
                    });
                    this.$emit("reloadlist");
                    this.formData.tour_category_id = "";
                    this.formData.title = "";
                    this.formData.phone_number = "";
                    this.formData.location = "";
                    this.formData.content = "";
                    this.formData.country = "";
                    this.formData.city = "";
                    this.formData.is_published = "";
                    this.formData.is_popular = "";
                    this.formData.price = "";
                    this.formData.is_it_here = "";
                    this.formData.lang = "";
                    this.drawer = false;
                    this.getCategory();
                    this.getTours();
                    this.loading = false;
                })
                .catch((err) => {
                    console.log(err);
                    this.$notify({
                        title: "500 Ошибка сервера",
                        message: "Что-то не так",
                        type: "error",
                    });
                    this.loading = false;
                    this.getCategory();
                    this.getTours();
                });
        },

        handleFileObject() {
            this.picture = this.$refs.file.files[0];
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
    padding-right: 0.2rem;
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

/* Table Styles */
</style>
