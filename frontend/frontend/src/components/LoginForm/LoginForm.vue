<template>
<div class="container">
    <h3>Login</h3>
    <form @submit.prevent="login" @keydown="form.onKeydown($event)" class="form-group">
    <label for="">Email</label>
  <input class="form-control" v-model="form.email" type="text" name="email" placeholder="Email">
  <div v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
    <label for="">Password</label>
  <input class="form-control" v-model="form.password" type="password" name="password" placeholder="Password">
  <div v-if="form.errors.has('password')" v-html="form.errors.get('password')" />

  <button class="btn btn-primary mt-3" type="submit" :disabled="form.busy">
    Log In
  </button>
</form>
</div>

</template>

<script>
import Form from 'vform'

export default {
    name: "LoginForm",
  data: () => ({
    form: new Form({
      username: '',
      password: ''
    })
  }),

  methods: {
    async login () {
      const response = await this.form.post('http://127.0.0.1:8000/api/login')
      console.log(response);
      // ...
    }
  }
}
</script>