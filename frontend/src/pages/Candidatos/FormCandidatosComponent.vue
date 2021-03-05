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
            <div class="form-group">
              <label for="nome">Nome</label>
              <input
                required
                type="text"
                class="form-control"
                id="nome"
                placeholder="Digite o nome do candiato"
                v-model="nome"
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
                v-model="email"
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
                v-model="idade"
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
                v-model="linkedin"
              />
            </div>

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

            <div style="padding: 20px">
              <button class="btn btn-primary w-25">Salvar Registro</button>
            </div>
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