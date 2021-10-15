<template>
    <div id="app">
        <div class="line"></div>
        <el-menu
            class="el-menu-demo"
            mode="horizontal"
            @select="handleSelect"
            background-color="#4376a6"
            text-color="#fff"
            active-text-color="#fff"
            active-background-color="#195a97"
        >
            <!-- <el-menu-item index="0"
                    ><router-link :to="{ name: 'Home' }"
                        ><img :src="image" class="img" /></router-link
                ></el-menu-item> -->
            <el-menu-item @click="pushToRouter('Home')" index="1"
                ><router-link :to="{ name: 'Home' }">
                    Главная страница
                </router-link></el-menu-item
            >
            <el-menu-item @click="pushToRouter('Category')" index="2"
                ><router-link :to="{ name: 'Category' }">
                    Категория турпакета
                </router-link></el-menu-item
            >
            <el-menu-item @click="pushToRouter('Tour')" index="3"
                ><router-link :to="{ name: 'Tour' }">
                    ТУР Пакеты
                </router-link></el-menu-item
            >
            <el-menu-item @click="pushToRouter('Payment')" index="4"
                ><router-link :to="{ name: 'Payment' }">
                    Платежи
                </router-link></el-menu-item
            >
            <el-menu-item @click="pushToRouter('Gallery')" index="5"
                ><router-link :to="{ name: 'Gallery' }">
                    Галерея
                </router-link></el-menu-item
            >
            <el-menu-item @click="pushToRouter('Contact')" index="6"
                ><router-link :to="{ name: 'Contact' }">
                    Контакты
                </router-link></el-menu-item
            >
            <el-menu-item @click="pushToRouter('Comment')" index="7"
                ><router-link :to="{ name: 'Comment' }">
                    Комментарии
                </router-link></el-menu-item
            >
            <el-menu-item @click="pushToRouter('OrderTours')" index="8"
                ><router-link :to="{ name: 'OrderTours' }">
                    Заказы
                </router-link></el-menu-item
            >

            <el-dropdown>
                <el-button class="my">
                    <i class="el-icon-setting"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item>Logout</el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
        </el-menu>
        <router-view />
    </div>
</template>

<script>
import image from "./assets/admin.png";
export default {
    data() {
        return {
            image: image,
            
        };
    },
    methods: {
        handleSelect(key, keyPath) {
            console.log(key, keyPath);
        },
        pushToRouter(routeName) {
            this.$router.push({ name: routeName });
            
        },
    },
};
</script>

<style>
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
}

.el-menu-demo :active {
    background-color: #2e6190;
}

.my {
    background-color: #4376a6;
    border: none;
}
.my:hover {
    background-color: #2e6190;
}

.img {
    width: 65px;
}
.el-menu-item.is-active {
    background-color: #03192e;
}

.setting {
    float: right;
    padding-right: 2%;
    padding-top: 1rem;
}

.el-icon-setting {
    color: #fff;
    font-size: 30px;
}

.el-dropdown {
    vertical-align: top;
    float: right;
    padding-right: 2%;
    padding-top: 0.18%;
}
.el-dropdown + .el-dropdown {
    margin-left: 15px;
}
.el-icon-arrow-down {
    font-size: 12px;
}
</style>
