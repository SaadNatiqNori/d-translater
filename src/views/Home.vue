<template>
  <div class="home">
    <index />
  </div>
</template>

<script>
// import axios from "axios";
// import $ from "jquery";
// @ is an alias to /src
import index from "@/components/index.vue";

export default {
  data: function() {
    return {};
  },
  created: function() {
    // this.$swal({
    //   icon: "success",
    //   title: "سەرکەوتووبوو",
    //   text: "داواکارییەکەت بەسەرکەوتوویی جێبەجێ کرا"
    // });
  },
  name: "Home",
  components: {
    index
  }
};
</script>
