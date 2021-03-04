<template>
  <div class="navbar">
    <h2 class="home" @click="home">
      <i title="Início" class="fas fa-home"></i>
    </h2>

    <a @click="logout" class="logout"
      >Sair <i title="Sair" class="fa fa-sign-out-alt"></i
    ></a>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "NavBarComponent",

  methods: {
     async logout() {
      try {
        var response = await axios.post(
          "http://localhost/SistemaCadastroProgramadores/laravel/public/api/auth/logout",
          {},
          {
            headers: {
              Accept: "application/json",
              Authorization: "Bearer" + localStorage.getItem("token"),
            },
          }
        );
      } catch (error) {
        console.log(error.toJSON());
      }

      if (response.status == 200) {
        console.log(response.data);
        localStorage.removeItem("token");
        this.$router.push({ name: "login" });
        alert(response.data.message)  
  }
    },
    home() {
      this.$router.push({ name: "home" });
    },
  },
};
</script>

<style lang="scss">
.navbar {
  .home {
    color: #fff;
    cursor: pointer;
  }

  .logout {
    color: #fff;
    text-decoration: none;
    cursor: pointer;
  }
}
</style>