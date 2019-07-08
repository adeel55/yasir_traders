<template>
  <div class="content">
    
    <md-card>
      <md-card-header data-background-color="green">
        <h4 class="title">Create New Invoice</h4>
      </md-card-header>
      <md-card-content>

        <invoice-row></invoice-row>

      </md-card-content>
    </md-card>

  </div>
</template>

<script>
import { InvoiceRow } from "@/components"
export default {
  props: {
    tableHeaderColor: {
      type: String,
      default: "green"
    }
  },
  data() {
    return {
      
    };
  },
  mounted() {
    

  },
  methods: {
    addRow(){
      
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
