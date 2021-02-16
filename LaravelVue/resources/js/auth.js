import driverAuthBearer      from '@websanova/vue-auth/dist/drivers/auth/bearer.js';
import driverHttpAxios       from '@websanova/vue-auth/dist/drivers/http/axios.1.x.js';
import driverRouterVueRouter from '@websanova/vue-auth/dist/drivers/router/vue-router.2.x.js';
import router from './router';
// Auth base configuration some of this options
// can be override in method calls
const config = {
  plugins:{
    router:router
  },
  auth: driverAuthBearer,
  http: driverHttpAxios,
  router: driverRouterVueRouter,
  tokenDefaultName: 'laravel-vue-spa',
  tokenStore: ['localStorage'],
  rolesVar: 'role',
  registerData: {url: 'auth/register', method: 'POST', redirect: '/Auth/login'},
  loginData: {url: 'auth/login', method: 'POST', redirect: '', fetchUser: true},
  logoutData: {url: 'auth/logout', method: 'POST', redirect: '/', makeRequest: true},
  fetchData: {url: 'auth/user', method: 'GET', enabled: true},
  refreshData: {url: 'auth/refresh', method: 'GET', enabled: true, interval: 30}
}
export default config