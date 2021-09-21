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
    >
      <el-menu-item index="1"
        ><router-link :to="{ name: 'Home' }"
          >
          Home
          </router-link
      ></el-menu-item>
      <el-menu-item index="2"
        ><router-link :to="{ name: 'About' }">
          About
        </router-link></el-menu-item
      >
      <el-menu-item index="3"
        ><router-link :to="{ name: 'Login' }">
          Login
        </router-link></el-menu-item
      >
      <p class="setting"><i class="el-icon-setting"></i></p>
    </el-menu>
    <router-view />
  </div>
</template>

<script>
export default {
  data() {
    return {
      image: require("./assets/admin.png"),
    };
  },
  methods: {
    handleSelect(key, keyPath) {
      console.log(key, keyPath);
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
.img {
  width: 90px;
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
</style>
