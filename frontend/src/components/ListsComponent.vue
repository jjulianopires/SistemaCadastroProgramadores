<template>
  <div class="lists">
    <div class="top">
      <p><strong>Candidatos</strong></p>
      <hr />
    </div>

    <div class="content">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Idade</th>
              <th scope="col">Linkedin URL</th>
              <th scope="col">Tecnologias</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="candidato in candidatos" :key="candidato.id">
              <th scope="row">{{candidato.id}}</th>
              <td>{{candidato.nome}}</td>
              <td>{{candidato.email}}</td>
              <td>{{candidato.idade}}</td>
              <td>{{candidato.linkedin}}</td>
              <td>{{candidato.tecnologias}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ListsComponent",
  props:{
      candidatos: Array,
  }
};
</script>

<style lang="scss" scoped>
.lists {
  width: 100%;
  padding: 15px;
  border-radius: 5px;
  background-color: #fff;
}
</style>