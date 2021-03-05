<template>
  <div>
    <DeashBoardComponent>
      <!-- chama painel da deashboard -->
      <div slot="slot-pages" class="content-pages">
        <header class="title_pages">
          <p>Cadastro de candidatos</p>
        </header>

        <div class="form">
          <form @submit.prevent="submit()">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nome">Nome</label>
                <input
                  required
                  type="nome"
                  class="form-control"
                  id="nome"
                  placeholder="Nome do Candidato"
                  v-model="nome"
                />
              </div>
              <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input
                  required
                  type="email"
                  class="form-control"
                  id="email"
                  placeholder="exemplo@gmail.com"
                  v-model="email"
                />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="idade">Idade</label>
                <input
                  required
                  type="number"
                  class="form-control"
                  id="idade"
                  placeholder="Digite a idade do candiato"
                  v-model="idade"
                />
              </div>
              <div class="form-group col-md-6">
                <label for="linkedin">URL Linkedin</label>
                <input
                  required
                  type="url"
                  class="form-control"
                  id="linkedin"
                  placeholder="Digite a URL do linkedin do candiato"
                  v-model="linkedin"
                />
              </div>
            </div>

            <label for="">C#</label>
            <input
              id="C#"
              type="checkbox"
              true-value="true"
              v-model="tecnologias"
              value="C#"
            />

            <label for="">Javascript</label>
            <input
              id="Javascript"
              type="checkbox"
              true-value="true"
              v-model="tecnologias"
              value="Javascript"
            />

            <label for="">Nodejs</label>
            <input
              id="Nodejs"
              type="checkbox"
              true-value="true"
              v-model="tecnologias"
              value="Nodejs"
            />

            <label for="">Angular</label>
            <input
              id="Angular"
              type="checkbox"
              true-value="true"
              v-model="tecnologias"
              value="Angular"
            />

            <label for="">React</label>
            <input
              id="React"
              type="checkbox"
              true-value="true"
              v-model="tecnologias"
              value="React"
            />

            <label for="">Ionic</label>
            <input
              id="Ionic"
              type="checkbox"
              true-value="true"
              v-model="tecnologias"
              value="Ionic"
            />

            <label for="">Mensageria</label>
            <input
              id="Mensageria"
              type="checkbox"
              true-value="true"
              v-model="tecnologias"
              value="Mensageria"
            />

            <label for="">PHP</label>
            <input
              id="PHP"
              type="checkbox"
              true-value="true"
              v-model="tecnologias"
              value="PHP"
            />

            <label for="">Laravel</label>
            <input
              id="Laravel"
              type="checkbox"
              true-value="true"
              v-model="tecnologias"
              value="Laravel"
            />

            <button class="btn btn-primary w-100">Finalizar cadastro</button>
          </form>
        </div>
      </div>
    </DeashBoardComponent>
  </div>
</template>

<script>
import DeashBoardComponent from "../Deashboard/DeashBordComponent";
import axios from "axios";

export default {
  name: "FormCandidatosComponent",

  data() {
    return {
      nome: "",
      email: "",
      idade: "",
      linkedin: "",
      tecnologias: [],
    };
  },

  methods: {
    async submit() {
      try {
        var response = await axios.post(
          "http://localhost/SistemaCadastroProgramadores/laravel/public/api/candidato/salvar",
          {
            nome: this.nome,
            email: this.email,
            idade: this.idade,
            linkedin: this.linkedin,
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
        console.log(error.toJSON());
        alert("O cadastro não pode ser finalizado.");
      }

      if (response.status == 200) {
        console.log(response.data);
        alert("Candidato cadastrado com sucesso!");
      }
    },
  },

  components: {
    DeashBoardComponent,
  },
};
</script>

<style lang="scss" src="./style.scss" scoped />