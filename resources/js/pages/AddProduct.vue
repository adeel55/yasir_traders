<template>
  <div class="content">
    
    <md-card>
      <md-card-header data-background-color="green">
        <h4 class="title">Add Products</h4>
      </md-card-header>
      <md-card-content>

        <product-row></product-row>

      </md-card-content>
    </md-card>

  </div>
</template>

<script>
import { DialogPrompt,ProductRow } from "@/components"
export default {
  props: {
    tableHeaderColor: {
      type: String,
      default: "green"
    }
  },
  data() {
    return {
      selected: [],
      pgdata: {},
      msg: ""
    };
  },
  mounted() {
    

  },
  methods: {
    addRow(){
      this.$emit('addedRow','Hi');
    }
  },
  created(){
    
  }
};

</script>
<style lang="scss" scoped>
  small {
    display: block;
  }
</style>
