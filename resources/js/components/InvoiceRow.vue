<template>
  <div>
    <md-button @click="addRow" class="md-fab md-btn-fab md-mini md-primary" style="float: right">
      <md-icon>playlist_add</md-icon>
    </md-button>
    <div class="md-layout">
      <div class="md-layout-item md-small-size-100 md-size-33">
        <md-autocomplete
          v-model="costomer"
          :md-options="costomers"
          @md-changed="searchCompanies"
          md-input-max-length="50"
          autocomplete="off"
          md-dense>
          <label>Customer</label>
        </md-autocomplete>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-33">
        <md-autocomplete
          v-model="orderbooker"
          :md-options="orderbookers"
          @md-changed="searchProducts"
          @md-opened="searchProducts"
          md-input-max-length="50"
          md-dense>
          <label>Order Booker</label>
        </md-autocomplete>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-33">
        <md-autocomplete
          v-model="saleman"
          :md-options="salemans"
          @md-changed="searchProducts"
          @md-opened="searchProducts"
          md-input-max-length="50"
          md-dense>
          <label>Sale Man</label>
        </md-autocomplete>
       </div>
       <md-divider class="hr-divider-head"></md-divider>
    </div>
    <div class="md-layout" v-for="(row, index) in productrows" :key="index">
       <div class="md-layout-item md-small-size-100 md-size-40">
        <md-autocomplete
          v-model="row.product"
          :md-options="products"
          @md-changed="searchProducts"
          @md-opened="searchProducts"
          md-input-max-length="50"
          md-dense>
          <label>Product</label>
        </md-autocomplete>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-10">
         <md-field>
           <label>Bonus</label>
           <md-input v-model="row.bonus" type="number"></md-input>
         </md-field>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-10">
         <md-field>
           <label>Qty</label>
           <md-input v-model="row.qty" type="number"></md-input>
         </md-field>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-10">
         <md-field>
           <label>Total</label>
           <md-input v-model="row.total" type="number"></md-input>
         </md-field>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-10">
         <md-field>
           <label>Discount</label>
           <md-input v-model="row.discount" type="number"></md-input>
         </md-field>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-10">
         <md-field>
           <label>Disc.Total</label>
           <md-input v-model="row.disctotal" type="number"></md-input>
         </md-field>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-10">
        <md-button @click="removeRow(index)" class="md-fab md-btn-fab md-mini md-danger">
           <md-icon>delete</md-icon>
        </md-button>
       </div>
    </div>
    <md-dialog-confirm
      :md-active.sync="active"
      md-title="Confirm"
      md-content="Are you sure to add these stock into inventory?"
      md-confirm-text="Yes"
      md-cancel-text="Cancel"
      @md-cancel="onCancel"
      @md-confirm="save" />
 
    <md-button @click="active = true" class="md-success">Save</md-button>
    <md-button @click="window.print()" class="md-info"><md-icon>print</md-icon></md-button>
    <md-dialog-alert
      :md-active.sync="success"
      md-title="Success"
      md-content="Stock saved succesfully." />
    <md-dialog-alert
      :md-active.sync="fail"
      md-title="Failed"
      md-content="Stock failed to add." />
  </div>
</template>
<script>
  export default {
    name: "invoice-row",
    prop: {
    },
    data :() => {
      return {
        
        productrows: [{'company':null,'product':null,'qty':null,'bonus':null,'total':null,'discount':null,'disctotal':null}],
        costomer:null,
        costomers:[],
        orderbooker:null,
        orderbookers:[],
        saleman:null,
        salemans:[],
        companieslist: [],
        companies: [],
        productlist: [],
        products: [],
        active: false,
        success: false,
        fail: false,
        selectedDate: new Date('2018/03/26')
      };
    },
    mounted() {
      // Fetch initial 
    },
    methods: {
      searchCompanies (searchTerm) {
        axios.get('/search_companies?searchString='+searchTerm)
        .then(d => this.companieslist = d.data)
        .catch(err => console.log(err));

        this.companies = new Promise(resolve => {
          window.setTimeout(() => {
            if (!searchTerm) {
              resolve(this.companieslist)
            } else {
              const term = searchTerm.toLowerCase()

              resolve(this.companieslist.filter(( name ) => name.toLowerCase().includes(term)))
            }
          }, 500)
        })
      },
      searchProducts(searchTerm){
        axios.get('/search_products?searchString='+searchTerm)
              .then(d => {this.productlist = d.data;})
              .catch(err => console.log(err));

        

        this.products = new Promise(resolve => {
          window.setTimeout(() => {
            if (!searchTerm) {
              resolve(this.productlist)
            } else {
              const term = searchTerm.toLowerCase()

              resolve(this.productlist.filter(( name ) => name.toLowerCase().includes(term)))
            }
          },500)
        })
      },
      addRow(a){
        this.productrows.push({
          company: null,
          product: null,
          qty: null,
          carton: null,
          expire: null,
          unit_purchse_price: null,
          unit_sale_price: null
        })
      },
      removeRow (rowId) {
        this.productrows.splice(rowId, 1)
      },
      save () {
        axios.post('/inventory',{'productrows':this.productrows,'customer':this.customer,'customer':this.customer,'customer':this.customer})
        .then(d => {})
        .catch(err => console.log(err));
        this.success=true;
      },
      onCancel(){

      }
    },
    created(){
      
    }
  };
</script>
<style type="scss" scoped>
  .hr-divider{
    border-top: 2px dashed #aaa;
    width: 100%;
  }
  .hr-divider-head{
    border-top: 2px solid #aaa;
    width: 100%;
  }
</style>