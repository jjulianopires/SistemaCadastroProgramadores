<template>
  <div>
    <DeashBoardComponent>
      <!-- chama painel da deashboard -->
      <div slot="slot-pages" class="content-pages">
        <header class="title_pages">
          <p>Lista de Candidatos</p>
        </header>

        <input
          type="text"
          v-model="search"
          placeholder="Filtrar por tecnologias"
        />

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
                      v-on:click="deletarCandidato(candidato.id)"
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

        <!-- <div class="lista">
          <input
            type="text"
            v-model="search"
            placeholder="Filtrar por tecnologias"
          />
          <div
            v-for="candidato in filteredList"
            :key="candidato.id"
            style="padding: 5px"
          >
            <div class="card w-75">
              <div class="card-body">
                <h5 class="descricao"><b>Nome:</b> {{ candidato.nome }}</h5>
                <p class="card-text">
                  <b>E-mail:</b> {{ candidato.email }} <br />
                  <b>Idade:</b> {{ candidato.idade }} <br />
                  <b>URL linkedin:</b> {{ candidato.linkedin }} <br />
                  <b>Tecnologias:</b> {{ String(candidato.tecnologias) }}
                </p>
              </div>
              <button v-on:click="deletarCandidato(candidato.id)">
                Remover Candidato
              </button>
            </div>
          </div>
        </div> -->

        <!-- <div class="search-wrapper">
          <input type="text" v-model="search" placeholder="Search title.." />
          <label>Search title:</label>
        </div>
        <div class="wrapper">
          <div
            class="card"
            v-for="candidato in filteredList"
            :key="candidato.id"
          >
            <small>posted by: {{ candidato.nome }}</small>
            {{ candidato.email }}
          </div>
        </div> -->
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
    async deletarCandidato(id) {
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