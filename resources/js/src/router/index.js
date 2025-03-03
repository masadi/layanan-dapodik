import Vue from 'vue'
import VueRouter from 'vue-router'

// Routes
import { canNavigate } from '@/libs/acl/routeProtection'
import { isUserLoggedIn, getUserData } from '@/auth/utils'
import dashboard from './routes/1_dashboard'
import layanan_siswa from './routes/2_layanan_siswa'
import layanan_ptk from './routes/3_layanan_ptk'
import layanan_yayasan from './routes/4_layanan_yayasan'
/*
import data_master from './routes/3_data_master'
import procurement from './routes/4_procurement'
import inventory from './routes/5_inventory'
import point_of_sales from './routes/6_point_of_sales'
import supply_chain from './routes/7_supply_chain'
import bank from './routes/8_bank'
import accounts from './routes/9_accounts'
*/
import pages from './routes/pages'
Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  scrollBehavior() {
    return { x: 0, y: 0 }
  },
  routes: [
    { path: '/', redirect: { name: 'dashboard' } },
    ...dashboard, 
    ...layanan_siswa,
    ...layanan_ptk,
    ...layanan_yayasan,
    /*...inventory,
    ...point_of_sales,
    ...supply_chain,
    ...bank,
    ...accounts,*/
    ...pages,
    {
      path: '*',
      redirect: 'error-404',
    },
  ],
})
router.beforeEach((to, _, next) => {
  const isLoggedIn = isUserLoggedIn()
  const title = to.meta.pageTitle || to.meta.webTitle
  if (title) {
    document.title = `${title} | ${app_name}`
  } else {
    document.title = app_name
  }
  console.log(to);
  console.log(canNavigate(to));
  if (!canNavigate(to)) {
    // Redirect to login if not logged in
    if (!isLoggedIn) return next({ name: 'auth-login' })

    // If logged in => not authorized
    return next({ name: 'misc-not-authorized' })
  }

  // Redirect if logged in
  if (to.meta.redirectIfLoggedIn && isLoggedIn) {
    const userData = getUserData()
    next({ name: 'dashboard' })
  }

  return next()
})

// ? For splash screen
// Remove afterEach hook if you are not using splash screen
router.afterEach(() => {
  // Remove initial loading
  const appLoading = document.getElementById('loading-bg')
  if (appLoading) {
    appLoading.style.display = 'none'
  }
})

export default router
