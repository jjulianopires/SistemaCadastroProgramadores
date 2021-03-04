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
export default {
  name: "NavBarComponent",

  methods: {
    logout() {
      this.$router.push({ name: "login" });
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