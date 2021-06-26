<template>
  <RegisterForm />
  <LoginForm />
</template>

<script>

import LoginForm from "./components/LoginForm/LoginForm.vue";
import RegisterForm from './components/RegisterForm/RegisterForm.vue';

export default {
  name: 'App',
  components: {
    LoginForm,
    RegisterForm
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
