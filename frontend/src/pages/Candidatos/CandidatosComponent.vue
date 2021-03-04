<template>
  <div>
    <DeashBoardComponent> 
      <!-- chama painel da deashboard -->
      <div slot="slot-pages" class="content-pages">
        <p>Candidatos</p>
      </div>
    </DeashBoardComponent>
  </div>
</template>

<script>
import DeashBoardComponent from "../Deashboard/DeashBordComponent";

export default {
  name: "CandidatosComponent",
  //registra o componente
  components: {
    DeashBoardComponent,
  },
};
</script>