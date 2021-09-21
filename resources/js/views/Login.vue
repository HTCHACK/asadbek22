<template>
  <div>
    <h1>Login</h1>
    <form @submit.prevent="login">
      <input type="number" name="phone_number" v-model="phone_number">
      <input type="password" name="password" v-model="password">
      <button type="submit">Login</button>
    </form>
  </div>
</template>

<script>
export default {
  data () {
    return {
      phone_number: '',
      password: ''
    }
  },

  methods: {
    login () {
      this.$store
        .dispatch('login', {
          phone_number: this.phone_number,
          password: this.password
        })
        .then(() => {
          this.$router.push({ name: 'About' })
        })
        .catch(err => {
          console.log(err)
        })
    }
  }
}
</script>