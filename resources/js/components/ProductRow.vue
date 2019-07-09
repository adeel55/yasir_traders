<template>
  <div>
    <div class="md-layout">
     <div class="md-layout-item md-small-size-100 md-size-50">
      <md-autocomplete
        v-model="company"
        :md-options="companies"
        @md-changed="searchCompanies"
        md-input-max-length="50"
        autocomplete="off"
        md-dense>
        <label>Company</label>
      </md-autocomplete>
     </div>
     <div class="md-layout-item md-small-size-100 md-size-50">
      <md-field>
        <label>Purchase On</label>
        <md-input v-model="purchasedate" type="date"></md-input>
      </md-field>
     </div>
    </div>
    <div class="md-layout" v-for="(row, index) in productrows" :key="index">
       <div class="md-layout-item md-small-size-100 md-size-20">
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
           <label>Qty</label>
           <md-input v-model="row.qty" type="number" @input="count_unit_purchase(index)"></md-input>
         </md-field>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-10">
         <md-field>
           <label>Carton</label>
           <md-input v-model="row.carton" type="number"></md-input>
         </md-field>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-10">
         <md-field>
           <label>Total</label>
           <md-input v-model="row.total_purchase" @input="count_unit_purchase(index)" type="number"></md-input>
         </md-field>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-15">
         <md-field>
           <label>Unit Purchase</label>
           <md-input v-model="row.unit_purchase_price" type="number"></md-input>
         </md-field>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-15">
         <md-field>
           <label>Unit Sale</label>
           <md-input v-model="row.unit_sale_price" type="number"></md-input>
         </md-field>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-10">
         <md-field>
           <label>Expire</label>
           <md-input v-model="row.expire" type="date"></md-input>
           <!-- <md-datepicker v-model="row.selectedDate"/> -->
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
    <md-button @click="addRow" class="md-primary">
      <md-icon>playlist_add</md-icon> Add
    </md-button>
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
    name: "ProductRow",
    prop: {
    },
    data :() => {
      return {
        
        productrows: [{'product':null,'qty':null,'carton':null,'expire':null,'unit_purchase_price':null,'unit_sale_price':null,'expire':null,'total_purchase':null}],
        company:null,
        purchasedate: null,
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
    mounted :function() {
        this.purchasedate = this.getDate();
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
          product: null,
          qty: null,
          carton: null,
          expire: null,
          unit_purchase_price: null,
          unit_sale_price: null,
          total_purchase: null
        })
      },
      count_unit_purchase(index){
        this.productrows[index].unit_purchase_price = (this.productrows[index].total_purchase / this.productrows[index].qty).toFixed(2);
      },
      removeRow (rowId) {
        this.productrows.splice(rowId, 1)
      },
      save () {
        axios.post('/inventory',{'productrows':this.productrows,'company':this.company,'purchasedate':this.purchasedate})
        .then(d => {console.log(d)})
        .catch(err => console.log(err));
        this.success=true;
      },
      onCancel(){

      },
      getDate () {
        const toTwoDigits = num => num < 10 ? '0' + num : num;
        let today = new Date();
        let year = today.getFullYear();
        let month = toTwoDigits(today.getMonth() + 1);
        let day = toTwoDigits(today.getDate());
        return `${year}-${month}-${day}`;
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
</style>