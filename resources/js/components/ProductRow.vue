<template>
  <div>
    <md-button @click="addRow" class="md-fab md-btn-fab md-mini md-primary" style="float: right">
      <md-icon>playlist_add</md-icon>
    </md-button>
    <div class="md-layout" v-for="(row, index) in productrows" :key="index">
       <div class="md-layout-item md-small-size-100 md-size-30">
        <md-autocomplete
          v-model="row.company"
          :md-options="companies"
          @input="searchCompanies"
          md-dense>
          <label>Company</label>
        </md-autocomplete>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-30">
        <md-autocomplete
          v-model="row.product"
          :md-options="row.search"
          @input="searchProducts(index)"
          autocomplete="off"
          md-dense>
          <label>Product</label>
        </md-autocomplete>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-20">
         <md-field>
           <label>Qty</label>
           <md-input v-model="row.qty" type="number"></md-input>
         </md-field>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-20">
        <md-button @click="removeRow(index)" class="md-fab md-btn-fab md-mini md-danger">
           <md-icon>delete</md-icon>
        </md-button>
       </div>
    </div>
  </div>
</template>
<script>
  export default {
    name: "ProductRow",
    props: {
    },
    data() {
      return {
        
        productrows: [{'company':null,'product':null,'qty':null,'search':[]}],
        companies: [],
        products: [],
        productname: "",
        qty: "",
        selected: [],
        mhalls: [],
        pgdata: {},
        msg: ""
      };
    },
    mounted() {
      // Fetch initial 
    },
    methods: {
      searchCompanies(){
        axios.get('/search_companies',{'searchString':this.selectedcompany})
        .then(d => this.companies = d.data)
        .catch(err => console.log(err));
      },
      searchProducts(index){
        this.productrows[index].search = [];
        console.log(this.productrows[index].product);
        axios.get('/search_products',{'searchString':this.productrows[index].product})
        .then(d => this.productrows[index].search = d.data)
        .catch(err => console.log(err));
      },
      addRow(a){
        this.productrows.push({
          company: null,
          product: null,
          qty: null,
          search:[]
        })
      },
      removeRow (rowId) {
        this.productrows.splice(rowId, 1)
      }
    },
    created(){
      axios.get('/companies')
        .then(d => this.mhalls = d.data.data)
        .catch(err => console.log(err));
    }
  };
</script>