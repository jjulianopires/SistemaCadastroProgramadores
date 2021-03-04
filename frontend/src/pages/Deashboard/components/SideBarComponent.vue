<template>
  <div class="sidebar">
    <div class="top">
      <div class="avatar">
        <span><i class="fa fa-user"></i></span>
      </div>
      <div class="info">
        <p class="status">Online</p>
      </div>
    </div>
    <div class="menu">
      <ul>
        <!-- <li><router-link to="/criar/candidato">Cadastrar Candidatos</router-link> </li> -->
        <li>
          <router-link :to="{ name: 'criar-candidato' }">
            <i class="fas fa-plus-circle"></i> Cadastrar Candidatos</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'candidatos' }">
            <i class="far fa-list-alt"></i> Visualizar Candidatos</router-link
          >
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "SideBarComponent",
};
</script>

<style lang="scss">
.sidebar {
  .top {
    width: 100%;
    display: flex;
    justify-content: center;
    padding: 25px 5px;

    .avatar {
      margin-right: 10px;
      span {
        display: block;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #f0e3ff;
        display: flex;
        justify-content: center;
        align-items: center;
        //tamanho icone
        font-size: 25px;
      }
    }

    .info {
      .status {
        margin: 0;
        font-size: 12px;
        padding-top: 20px;
        color: rgb(62, 255, 62);
      }
    }
  }

  .menu {
    padding: 0px;
    ul li {
      margin: 15px 0;
      font-size: 18px;
      list-style: none;
      font-weight: 200;
    }

    a {
      color: #fff;
    }
  }
}
</style>