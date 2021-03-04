import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import "bootstrap/dist/css/bootstrap.min.css"
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'

import LoginComponent from './pages/Login/LoginComponent'
import HomeComponent from './pages/Home/HomeComponent'
import CandidatosComponent from './pages/Candidatos/CandidatosComponent'

Vue.config.productionTip = false
Vue.use(VueRouter)

//cria uma constante com as rotas
const routes = [
  { path: '/', name: 'login', component: LoginComponent },
  { path: '/home', name: 'home', component: HomeComponent },
  { path: '/candidatos', name: 'candidatos', component: CandidatosComponent },
  { path: '/criar/candidato', name: 'criar-candidato', component: HomeComponent }
]

//usa a instancia de VueRouter
const router = new VueRouter({
  routes
})

//disponibiliza router para o Vue
new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
