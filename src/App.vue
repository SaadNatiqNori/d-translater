<template>
  <div id="app" :class="(mode === 'true') ? 'bodyDark' : 'bodyy' ">
    <div id="nav">
       <navbarTB />
      <br><br><br>
    </div>
    <transition name="fade" mode="out-in">
      <router-view />
    </transition>
  </div>
</template>

<script>
import navbarTB from "@/components/navbarTB";
import { darkTheme } from './main';
import { lightTheme } from './main';
export default {
  data : function(){
    return{
      mode : 'false'
    }
  },
  components : {
    navbarTB
  },
  mounted : function(){
    const thiS = this;
      darkTheme.$on('darkMode', (data) => {
          thiS.mode = data;
      });
      lightTheme.$on('lightTheme', (data) => {
          thiS.mode = data;
      });
  }
}
</script>

<style>
#app {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
.fade-enter-active,
.fade-leave-active {
  transition-duration: 0.3s;
  transition-property: opacity;
  transition-timing-function: ease;
}

.fade-enter,
.fade-leave-active {
  opacity: 0
}
.bodyDark{
  background-color: #484a4e;
  color: #fff;
}
.bodyy{
  background-color: #eee;
}
</style>
