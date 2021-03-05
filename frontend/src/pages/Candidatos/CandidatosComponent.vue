<template>
  <div>
    <DeashBoardComponent>
      <!-- chama painel da deashboard -->
      <div slot="slot-pages" class="content-pages">
        <header class="title_pages">
          <p>Lista de Candidatos</p>
        </header>

        <div class="row" style="padding: 15px;">
          <div style="width: 170px; padding-left: 40px">
            <label for="idade">Filtar Candidatos: </label>
          </div>
          <div style="width: 140px; padding-left: 5px">
            <input
              type="text"
              v-model="search"
              placeholder="Filtrar por tecnologias"
            />
          </div>
        </div>


        <div class="card-deck">
          <div
            v-for="candidato in filteredList"
            :key="candidato.id"
            style="padding: 5px"
          >
            <div class="card">
              <div
                class="card-body"
                style="width: 300px; height: auto; min-height: 300px"
              >
                <p class="card-title"><b>Nome:</b> {{ candidato.nome }}</p>
                <p class="card-text">
                  <b>E-mail:</b> {{ candidato.email }}<br />
                  <b>Idade:</b> {{ candidato.idade }}<br />
                  <b>URL Linkedin:</b> {{ candidato.linkedin }}<br />
                  <b>Tecnologias:</b> {{ candidato.tecnologias }}<br />
                </p>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col">
                    <button
                      style="width: 100%"
                      v-on:click="editarCandidato(candidato)"
                    >
                      Editar
                    </button>
                  </div>
                  <div class="col">
                    <button
                      style="width: 100%"
                      v-on:click="deletarCandidato(candidato.id)"
                    >
                      Remover
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        
      </div>
    </DeashBoardComponent>
  </div>
</template>

<script>
import DeashBoardComponent from "../Deashboard/DeashBordComponent";

const axios = require("axios");

export default {
  name: "CandidatosComponent",

  data() {
    return {
      candidatos: [],
      search: "",
    };
  },

  mounted() {
    this.getCandidatos();
  },

  computed: {
    filteredList: function () {
      return this.candidatos.filter((candidato) => {
        return candidato.tecnologias
          .toLowerCase()
          .match(this.search.toLowerCase());
      });
    },
  },

  methods: {
    close() {
      this.$emit("close");
    },

    async deletarCandidato(id) {
      if (confirm("Confirma a exclusão?")) {
        const response = await axios.delete(
          "http://localhost/SistemaCadastroProgramadores/laravel/public/api/candidato/excluir/" +
            id,
          {
            headers: {
              Accept: "application/json",
              Authorization: "Bearer" + localStorage.getItem("token"),
            },
          }
        );
        if (response.status == 200) {
          console.log(response.data);
          alert("Candidato removido com sucesso!");
          this.getCandidatos();
        } else {
          console.error("Ocorreu um erro na API.");
        }
      }
    },

    async getCandidatos() {
      const response = await axios.get(
        "http://localhost/SistemaCadastroProgramadores/laravel/public/api/candidatos",
        {
          headers: {
            Accept: "application/json",
            Authorization: "Bearer" + localStorage.getItem("token"),
          },
        }
      );
      if (response.status == 200) {
        if (response.data.length == 0) {
          alert("Cadastre pelo menos um candidato para exibir a lista.");
        } else {
          console.log(response.data);
          this.candidatos = response.data;
        }
      } else {
        console.error("Ocorreu um erro na API.");
      }
    },
  },

  components: {
    DeashBoardComponent,
  },
};
</script>

<style lang="scss" src="./style.scss" scoped />