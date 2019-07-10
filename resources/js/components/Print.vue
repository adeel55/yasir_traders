<template>
  <div id="app">
    <random v-if="printer_off"></random>
 
    <printer :printcomponent="$options.components.test"  @printerStatus="printer_off = $event" :printer_off="printer_off"></printer>
  </div>
</template>
<script>

import printer from "vue-printer";
import test from "./ProductRow"; // just shows where $options.components.test is from
 
 
export default {
  name: "app",
  components: {
    printer,
    test
  },
  data() {
    return {
      printer_off: true
    };
  }
};

</script>
<style></style>