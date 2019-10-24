import Vue    from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import Home       from '../pages/home/index.vue'


export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
        path: '/',
        name: 'home',
        icon: 'bubble_chart',
        component: Home,
    },
  ]
})
