<template>
  <div>
    <DeashBoardComponent>
      <!-- chama painel da deashboard -->
      <div slot="slot-pages" class="content-pages">
        <header class="title_pages">
          <p>Formulário de cadastro de candidatos</p>
        </header>

        <div class="form">
          <form @submit.prevent="submit()">
            
            <div class="form-group">
              <label for="exampleInputEmail1">Nome</label>
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
              <label for="exampleInputEmail1">E-mail</label>
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
              <label for="exampleInputEmail1">Idade</label>
              <input
                required
                type="number"
                class="form-control"
                id="idade"
                placeholder="Digite a idade do candiato"
                v-model="idade"
              />
            </div>

             <div class="form-group">
              <label for="exampleInputEmail1">Url linkedin</label>
              <input
                required
                type="url"
                class="form-control"
                id="linkedin"
                placeholder="Digite a URL do linkedin do candiato"
                v-model="linkedin"
              />
            </div>

             

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
      tecnologias: "",
    };
  },

  methods: {
    async submit() {
      try {
        var response = await axios.post(
          "http://localhost/SistemaCadastroProgramadores/laravel/public/api/auth/candidato/salvar",
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