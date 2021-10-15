<template>
    <div class="container" style="padding-bottom: 4%">
        <div class="asad">
            <el-button
                @click="drawer = true"
                type="success"
                style="margin-left: 16px"
            >
                <i class="fa fa-plus"></i> Добавить галерею
            </el-button>
        </div>
        <el-input
            placeholder="Поиск Названный"
            v-model="search"
            clearable
            style="width: 76%; margin-left: -3.5rem"
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
                    <p class="head" v-if="formData.name == ''">
                        <el-button
                            @click.prevent="createGallery"
                            :loading="loading"
                            type="success"
                            disabled
                        >
                            <i class="fa fa-save"></i> Сохранить и Закрыт
                        </el-button>
                    </p>
                    <p class="head" v-else>
                        <el-button
                            @click.prevent="createGallery"
                            :loading="loading"
                            type="success"
                        >
                            <i class="fa fa-save"></i> Сохранить и Закрыт
                        </el-button>
                    </p>
                </div>
                <div class="container" style="padding-top: 2rem">
                    <el-input
                        v-on:reloadlist="getGallery"
                        placeholder="Названный  "
                        v-model="formData.name"
                        clearable
                        style="margin-top: 2rem"
                    >
                    </el-input>
                    <br /><br />
                    <input
                        v-on:reloadlist="getGallery"
                        type="file"
                        id="customFile"
                        ref="file"
                        @change="handleFileObject()"
                    />
                </div>
            </el-drawer>
        </div>
        <table class="table table-bordered" style="background: #fff">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Названный</th>
                    <th scope="col">Изображение</th>
                    <th scope="col" colspan="2">Настройки</th>
                </tr>
            </thead>
            <tbody v-if="!filteredGallery.length || galleries.length < 1">
                <tr scope="row">
                    <td colspan="4">Еще нет изображений</td>
                </tr>
            </tbody>
            <tbody v-else>
                <gallery-card
                    v-for="gallery in filteredGallery"
                    :key="gallery.id"
                    :gallery="gallery"
                />
            </tbody>
            <tbody></tbody>
        </table>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import _ from "lodash";
import galleryCard from "../components/galleryCard.vue";

export default {
    components: {
        galleryCard,
    },

    data() {
        return {
            drawer: false,
            direction: "rtl",
            formData: {
                name: "",
            },
            picture: null,
            loading: false,
            search: "",
        };
    },

    computed: {
        ...mapGetters({
            galleries: "category/galleries",
        }),

        filteredGallery() {
            return this.galleries.filter((gallery) => {
                const name = gallery.name.toString().toLowerCase();
                const searchTerm = this.search.toLowerCase();
                return name.includes(searchTerm);
            });
        },
    },

    mounted() {
        this.getGallery();
    },

    methods: {
        ...mapActions({
            getGallery: "category/getGallery",
        }),

        backMain() {
            this.drawer = false;
            this.formData.name = "";
        },

        createGallery() {
            this.loading = true;

            let formData = new FormData();

            formData.append("picture", this.picture);

            _.each(this.formData, (value, key) => {
                formData.append(key, value);
            });

            console.log(formData);
            axios
                .post("/api/galleries", formData, {
                    headers: {
                        "Content-Type":
                            "multipart/form-data; charset=utf-8; boundary=" +
                            Math.random().toString().substr(2),
                    },
                })

                .then((response) => {
                    console.log(response);

                    this.$notify({
                        title: "Галерею успешно создана",
                        message: "Созданный",
                        type: "success",
                    });
                    this.$emit("reloadlist");
                    this.formData.name = "";
                    this.picture = "";
                    this.drawer = false;
                    this.getGallery();
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
                    this.getGallery();
                });
        },

        handleFileObject() {
            this.picture = this.$refs.file.files[0];
            this.$refs.file.files[0].clear();
        },
    },
};
</script>

<style scoped>
.pagination {
    margin-bottom: 0;
}

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

.save {
    float: right;
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

.avatar-uploader .el-upload {
    border: 1px dashed #d9d9d9;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}
.avatar-uploader .el-upload:hover {
    border-color: #409eff;
}
.avatar-uploader-icon {
    font-size: 28px;
    color: #8c939d;
    width: 178px;
    height: 178px;
    line-height: 178px;
    text-align: center;
}
.avatar {
    width: 178px;
    height: 178px;
    display: block;
}
/* Table Styles */
</style>
