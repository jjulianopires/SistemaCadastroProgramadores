<template>
  <div>
    <DeashBoardComponent>
      <!-- chama painel da deashboard -->
      <div slot="slot-pages" class="content-pages">
        <header class="title_pages">
          <p>Lista de Candidatos</p>
        </header>

        <!-- <button class="btn btn-info float-right" @click="showEditModal = true">
          <i class="fas fa-user">&nbsp;&nbsp; Adicionar Candidato</i>
        </button> -->

        <!-- COMEÇO MODAL -->
        <div id="overlay" v-if="showEditModal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Editar Candidato</h5>
                <button type="button" class="close" v-on:click="fecharModal()">
                  <span class="aria-hidden=true">&times; </span>
                </button>
              </div>
              <div class="modal-body p-4">
                <form @submit.prevent="submit()">
                  <div class="form-group">
                    <label for="nome">Nome</label>
                    <input
                      required
                      type="text"
                      class="form-control"
                      id="nome"
                      placeholder="Digite o nome do candiato"
                      v-model="candidato.nome"
                    />
                  </div>

                  <div class="form-group">
                    <label for="email">E-mail</label>
                    <input
                      required
                      type="email"
                      class="form-control"
                      id="email"
                      aria-describedby="emailHelp"
                      placeholder="exemple@gmail.com"
                      v-model="candidato.email"
                    />
                  </div>

                  <div class="form-group">
                    <label for="idade">Idade</label>
                    <input
                      min="5"
                      max="100"
                      required
                      type="number"
                      class="form-control"
                      id="idade"
                      placeholder="Digite a idade do candiato"
                      v-model="candidato.idade"
                    />
                  </div>

                  <div class="form-group">
                    <label for="linkedin">Url linkedin</label>
                    <input
                      required
                      type="url"
                      class="form-control"
                      id="linkedin"
                      placeholder="Digite a URL do linkedin do candiato"
                      v-model="candidato.linkedin"
                    />
                  </div>

                  <!-- TECNOLOGIAS -->
                  <div>
                    <label for=""
                      >Selecione as Tecnologias que o candidato possui
                      conhecimento:</label
                    >
                  </div>

                  <div>
                    <input
                      style="width: 20px"
                      id="C#"
                      type="checkbox"
                      true-value="true"
                      v-model="tecnologias"
                      value="C#"
                    />
                    <label for="">C#</label>
                  </div>

                  <div>
                    <input
                      style="width: 20px"
                      id="Javascript"
                      type="checkbox"
                      true-value="true"
                      v-model="tecnologias"
                      value="Javascript"
                    />
                    <label for="">Javascript</label>
                  </div>

                  <div>
                    <input
                      style="width: 20px"
                      id="Nodejs"
                      type="checkbox"
                      true-value="true"
                      v-model="tecnologias"
                      value="Nodejs"
                    />
                    <label for="">Nodejs</label>
                  </div>
                  <div>
                    <input
                      style="width: 20px"
                      id="Angular"
                      type="checkbox"
                      true-value="true"
                      v-model="tecnologias"
                      value="Angular"
                    />
                    <label for="">Angular</label>
                  </div>
                  <div>
                    <input
                      style="width: 20px"
                      id="React"
                      type="checkbox"
                      true-value="true"
                      v-model="tecnologias"
                      value="React"
                    />
                    <label for="">React</label>
                  </div>
                  <div>
                    <input
                      style="width: 20px"
                      id="Ionic"
                      type="checkbox"
                      true-value="true"
                      v-model="tecnologias"
                      value="Ionic"
                    />
                    <label for="">Ionic</label>
                  </div>
                  <div>
                    <input
                      style="width: 20px"
                      id="Mensageria"
                      type="checkbox"
                      true-value="true"
                      v-model="tecnologias"
                      value="Mensageria"
                    />
                    <label for="">Mensageria</label>
                  </div>
                  <div>
                    <input
                      style="width: 20px"
                      id="PHP"
                      type="checkbox"
                      true-value="true"
                      v-model="tecnologias"
                      value="PHP"
                    />
                    <label for="">PHP</label>
                  </div>

                  <div>
                    <input
                      style="width: 20px"
                      id="Laravel"
                      type="checkbox"
                      true-value="true"
                      v-model="tecnologias"
                      value="Laravel"
                    />
                    <label for="">Laravel</label>
                  </div>
                  <!-- FIM TECNOLOGIAS -->
                  <div class="form-group">
                    <button
                      class="btn btn-info tamanho-btn btn-block"
                      @click.prevent="atualizarCandidato(candidato)"
                    >
                      Atualizar Dados
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- FIM MODAL -->

        <!-- COMEÇO CARDS -->
        <div class="cards-candidatos" v-if="showCardsList">
          <div class="row" style="padding: 15px">
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
                        @click.prevent="editarCandidato(candidato, candidato.id)"
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
        <!-- FIM LISTA -->
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
      showEditModal: false,
      showCardsList: true,
      candidato: "",
      tecnologias: [],
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
    // editarCandidato(candidato) {

    // let candidatos = this.candiatos.map(candidatosMap) => {
    //   if (candidatosMap.id == candidato.id) {
    //     return candidato;
    //   }
    //     return contactMap;
    // });
    // this.candidato = candidato;
    // localStorage.setItem('candidatosApp', JSON.stringify(candidatos));
    // },

    editarCandidato(candidato, id) {
      const re = /\s*,\s*/;
      const listaTecnologias = candidato.tecnologias.split(re);
      this.tecnologias = listaTecnologias;

      this.candidato = candidato;
      this.candidato.id = id;
      this.showEditModal = true;
      this.showCardsList = false;
    },

    fecharModal() {
      this.showEditModal = false;
      this.showCardsList = true;
    },

    abrirModal() {
      this.showEditModal = true;
      this.showCardsList = false;
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

    async atualizarCandidato() {
      try {
        var response = await axios.post(
          "http://localhost/SistemaCadastroProgramadores/laravel/public/api/candidato/atualizar",
          {
            id: this.candidato.id,
            nome: this.candidato.nome,
            email: this.candidato.email,
            idade: this.candidato.idade,
            linkedin: this.candidato.linkedin,
            tecnologias: this.tecnologias,
          },
          {
            headers: {
              Accept: "application/json",
              Authorization: "Bearer" + localStorage.getItem("token"),
            },
          }
        );
      } catch (error) {
        alert("O cadastro não pode ser finalizado.");
      }

      if (response.status == 200) {
        console.log(response.data);
        alert("Candidato atualizado com sucesso!");
      }

      this.showEditModal = false;
      this.showCardsList = true;
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