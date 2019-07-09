<template>
  <div>
    </md-button>
    <div class="md-layout">
      <div class="md-layout-item md-small-size-100 md-size-25">
        <md-autocomplete
          v-model="customer"
          :md-options="customers"
          @md-changed="searchCustomer"
          md-input-max-length="50"
          autocomplete="off"
          md-dense>
          <label>Customer</label>
        </md-autocomplete>
       </div>

       <div class="md-layout-item md-small-size-100 md-size-25">
        <md-autocomplete
          v-model="orderbooker"
          :md-options="orderbookers"
          @md-changed="searchOrderBooker"
          md-input-max-length="50"
          md-dense>
          <label>Order Booker</label>
        </md-autocomplete>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-25">
        <md-autocomplete
          v-model="saleman"
          :md-options="salemens"
          @md-changed="searchSaleMen"
          md-input-max-length="50"
          md-dense>
          <label>Sale Man</label>
        </md-autocomplete>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-25">
        <md-field>
          <label>Created On</label>
          <md-input v-model="invoicedate" type="date"></md-input>
        </md-field>
       </div>
       <md-divider class="hr-divider-head"></md-divider>
    </div>
    <div class="md-layout" v-for="(row, index) in rows" :key="index">
       <div class="md-layout-item md-small-size-100 md-size-30">
        <md-autocomplete
          v-model="row.product"
          :md-options="products"
          @md-changed="searchProducts"
          @md-selected="productChoosed(index)"
          md-input-max-length="50"
          md-dense>
          <label>Product</label>
        </md-autocomplete>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-10">
         <md-field>
           <label>Qty</label>
           <md-input v-model="row.qty" type="number" @input="count_total(index)"></md-input>
         </md-field>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-10">
         <md-field>
           <label>Bonus</label>
           <md-input v-model="row.bonus" type="number"></md-input>
         </md-field>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-10">
         <md-field>
           <label>Total</label>
           <md-input v-model="row.total" type="number"></md-input>
         </md-field>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-15">
         <md-field>
           <label>Discount</label>
           <md-input v-model="row.discount" type="number" @input="count_disctotal(index)"></md-input>
         </md-field>
       </div>
       <div class="md-layout-item md-small-size-100 md-size-15">
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
    <div class="md-layout">
       <div class="md-layout-item md-small-size-100 md-size-60"></div>
       <div class="md-layout-item md-small-size-100 md-size-40">
          <label class="mylabel">Invoice Total</label>
          <input v-model="invoicetotal" class="myinp myinp1" type="text"><br>
          <label class="mylabel">Invoice Received</label>
          <input v-model="invoicereceived" class="myinp" type="text">
       </div>
    </div>
    <md-dialog-confirm
      :md-active.sync="active"
      md-title="Confirm"
      md-content="Are you sure to save this Invoice?"
      md-confirm-text="Yes"
      md-cancel-text="Cancel"
      @md-cancel="onCancel"
      @md-confirm="save" />
 
    <md-button @click="active = true" class="md-success">Save</md-button>
    <md-button @click="addRow" class="md-primary">Add <md-icon>playlist_add</md-icon></md-button>
    <md-button class="md-info"><md-icon>print</md-icon></md-button>
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
        
        rows: [{'product':null,'qty':0,'bonus':0,'total':0,'discount':0,'disctotal':0.0,'unit_price':0}],
        customer:null,
        invoicedate:null,
        customers:[],
        customerlist: [],
        orderbooker:null,
        orderbookers:[],
        orderbookerlist:[],
        saleman:null,
        salemens:[],
        salemenlist: [],
        companieslist: [],
        companies: [],
        productlist: [],
        products: [],
        invoicetotal: 0,
        invoicereceived: null,
        active: false,
        success: false,
        fail: false,
        selectedDate: new Date('2018/03/26')
      };
    },
    mounted: function() {
        this.invoicedate = this.getDate();
        this.count_invoicetotal();
    },
    methods: {
      count_total(index){
        this.rows[index].total = (this.rows[index].qty * this.rows[index].unit_price).toFixed(2);
        this.count_disctotal(index)
        this.count_invoicetotal()
      },
      count_disctotal(index){
        let disc = (this.rows[index].discount/100).toFixed(2) * this.rows[index].total;
        this.rows[index].disctotal = (this.rows[index].total - disc).toFixed(2);
        this.count_invoicetotal()
      },
      count_invoicetotal(){
        this.invoicetotal = Number(0.00);
        for (var i = 0; i < this.rows.length; i ++) {
          this.invoicetotal += (Number(this.invoicetotal) + Number(this.rows[i].disctotal));
        }
      },
      productChoosed(index){
        axios.get('/get_sale_price?product='+this.rows[index].product)
        .then(d => this.rows[index].unit_price = d.data)
        .catch(err => console.log(err));
      },
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
      searchSaleMen(searchTerm){
        axios.get('/search_salemen?searchString='+searchTerm)
              .then(d => {this.salemenlist = d.data;})
              .catch(err => console.log(err));

        

        this.salemens = new Promise(resolve => {
          window.setTimeout(() => {
            if (!searchTerm) {
              resolve(this.salemenlist)
            } else {
              const term = searchTerm.toLowerCase()

              resolve(this.salemenlist.filter(( name ) => name.toLowerCase().includes(term)))
            }
          },500)
        })
      },
      searchCustomer(searchTerm){
        axios.get('/search_customer?searchString='+searchTerm)
              .then(d => {this.customerlist = d.data;})
              .catch(err => console.log(err));

        

        this.customers = new Promise(resolve => {
          window.setTimeout(() => {
            if (!searchTerm) {
              resolve(this.customerlist)
            } else {
              const term = searchTerm.toLowerCase()

              resolve(this.customerlist.filter(( name ) => name.toLowerCase().includes(term)))
            }
          },500)
        })
      },
      searchOrderBooker(searchTerm){
        axios.get('/search_orderbooker?searchString='+searchTerm)
              .then(d => {this.orderbookerlist = d.data;})
              .catch(err => console.log(err));

        

        this.orderbookers = new Promise(resolve => {
          window.setTimeout(() => {
            if (!searchTerm) {
              resolve(this.orderbookerlist)
            } else {
              const term = searchTerm.toLowerCase()

              resolve(this.orderbookerlist.filter(( name ) => name.toLowerCase().includes(term)))
            }
          },500)
        })
      },
      addRow(a){
        this.rows.push({
          product: null,
          qty: null,
          bonus: null,
          total: null,
          discount: null,
          disctotal: null
        })
      },
      removeRow (rowId) {
        this.rows.splice(rowId, 1)
      },
      save () {
        axios.post('/invoice',{'productrows':this.rows,'customer':this.customer,'orderbooker':this.orderbooker,'saleman':this.saleman,'invoicedate':this.invoicedate,'invoicetotal':this.invoicetotal})
        .then(d => {console.log(d.data)})
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
  .hr-divider-head{
    border-top: 2px solid #aaa;
    width: 100%;
  }
  .mylabel{ font-weight: bold; }
  .myinp{ border: none; border-bottom: 2px solid #888; }
  .myinp1{ width: 170px; }
</style>