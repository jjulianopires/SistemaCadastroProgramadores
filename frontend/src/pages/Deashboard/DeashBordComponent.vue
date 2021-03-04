<template>
  <div class="main">
    <div class="sidebar">
      <SideBarComponent />
    </div>

    <div class="content-rigth">
      <div class="navbar">
        <NavBarComponent />
      </div>

      <!-- painel da deashboard -->
      <div class="pages">
        <slot name="slot-pages"> </slot>
      </div>
      
    </div>
  </div>
</template>

<script>
import SideBarComponent from "./components/SideBarComponent";
import NavBarComponent from "./components/NavBarComponent";

export default {
  //nome do componente
  name: "DeashBoardComponent",
  components: {
    SideBarComponent,
    NavBarComponent,
  },
};
</script>

<style lang="scss" src="./style.scss" scoped />