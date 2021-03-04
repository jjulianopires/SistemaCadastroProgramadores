<template >
  <div class="main">
    <div class="login">
      <div class="content-login">
        <header>
          <h1>Login do Sistema</h1>
        </header>

        <div class="form">
          <form @submit.prevent="submit()">
            <div class="form-group">
              <label for="exampleInputEmail1">E-mail</label>
              <input
                required
                type="email"
                class="form-control"
                id="email"
                aria-describedby="emailHelp"
                placeholder="exemple@gmail.com"
                v-model="email"
              />
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Senha</label>
              <input
                required
                type="password"
                class="form-control"
                id="password"
                v-model="password"
              />
            </div>
            <button class="btn btn-primary w-100">Entrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "LoginComponent",

  data() {
    return {
      email: "",
      password: "",
    };
  },

  methods: {
    async submit() {
      try {
        var response = await axios.post(
          "http://localhost/SistemaCadastroProgramadores/laravel/public/api/auth/login",
          {
            email: this.email,
            password: this.password,
          },
          {
            headers: {
              Accept: "application/json",
            },
          }
        );
        
      } catch (error) {
         console.log(error.toJSON());
         alert('Usuário ou senha incorretos.');
      }

      if (response.status == 200) {
        console.log(response.data);
        localStorage.setItem("token", response.data.token);
        this.$router.push({ name: "home" });
      }
    },
  },
};
</script>

<style lang="scss" src="./style.scss" scoped />