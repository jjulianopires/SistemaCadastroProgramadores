<template>
  <div>
    <DeashBoardComponent>
      <!-- chama painel da deashboard -->
      <div slot="slot-pages" class="content-pages"></div>
    </DeashBoardComponent>
  </div>
</template>

<script>
import DeashBoardComponent from "../Deashboard/DeashBordComponent";
import axios from "axios";

export default {
  name: "HomeComponent",
  components: {
    DeashBoardComponent,
  },
  async created() {
    const response = await axios.get("user", {
      headers: {
        Accept: "application/json",
        Authorization: "Bearer" + localStorage.getItem("token"),
      },
    });

    console.log(response);
  },
};
</script>

<style lang="scss" src="./style.scss" scoped />