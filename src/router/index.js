import Vue from "vue";
import VueRouter from "vue-router";
import index from "../views/Home.vue";
import about from "../views/About.vue";
import team from "../views/Team.vue";
import addword from "../views/addWord.vue";
import login from "../views/Login.vue";
import register from "../views/Register.vue";
import profile from "../views/Profile.vue";
import dashboard from "../views/Dashboard.vue";
 
Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: index
  },
  {
    path: "/about",
    name: "About",
    component : about
  },
  {
    path: "/team",
    name: "Team",
    component : team
  },
  {
    path: "/addWord",
    name: "addWord",
    component : addword
  },
  {
    path: "/login",
    name: "Login",
    component : login
  },
  {
    path : "/register",
    name : "Register",
    component : register
  },
  {
    path : "/profile",
    name : "Profile",
    component : profile
  },
  {
    path : "/dashboard",
    name : "Dashboard",
    component : dashboard
  }
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

export default router;