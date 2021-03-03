import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import LoginComponent from './pages/Login/LoginComponent'
import HomeComponent from './pages/Home/HomeComponent'
import "bootstrap/dist/css/bootstrap.min.css"

Vue.config.productionTip = false
Vue.use(VueRouter)

//cria uma constante com as rotas
const routes = [
  { path: '/', name: 'login', component: LoginComponent },
  { path: '/home', name: 'home', component: HomeComponent }
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
