<template>
  <div>
    <DeashBoardComponent>
      <!-- chama painel da deashboard -->
      <div slot="slot-pages" class="content-pages">
        <header class="title_pages">
          <p>Candidatos</p>
        </header>

        <div>
          <div class="row">
            <div class="col-12 col-md-12">
              <ListsComponent :candidatos="candidatos" />
            </div>
          </div>
        </div>
      </div>
    </DeashBoardComponent>
  </div>
</template>

<script>
import DeashBoardComponent from "../Deashboard/DeashBordComponent";
import ListsComponent from "../../components/ListsComponent";
const axios = require('axios');

export default {
  name: "CandidatosComponent",

  data() {
    return {
      candidatos: [],
    };
  },

  mounted(){
    this.getCandidatos();
  },

  methods: {
    async getCandidatos() {
       const response = await axios.get('http://localhost/SistemaCadastroProgramadores/laravel/public/api/candidatos');
       if(response.status == 200){
          console.log(response.data);
          this.candidatos = response.data;
       }else{
         console.error("Ocorreu um erro na API.")
       }
    },
  },

  components: {
    DeashBoardComponent,
    ListsComponent,
  },
};
</script>

<style lang="scss" src="./style.scss" scoped />