<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <md-card>
          <md-card-header data-background-color="green">
            <h4 class="title">Invoices Deployed</h4>
            <a href="/"></a>
          </md-card-header>
          <md-card-content>
            <!-- Filters -->
            <div class="md-layout">
              <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-33">
                <md-field>
                  <input v-model="filtercustomers" @input="filterlist" type="text" placeholder="Search By Customer">
                </md-field>
              </div>
              <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-33">
                <md-field>
                  <input v-model="filtersale_men" @input="filterlist" type="text" placeholder="Search By SaleMan">
                </md-field>
              </div>
              <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-33">
                <md-field>
                  <input v-model="filterorder_bookers" @input="filterlist" type="text" placeholder="Search By OrderBooker">
                </md-field>
              </div>
              <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-33">
                <md-field>
                  <input v-model="filterid" @input="filterlist" type="string" placeholder="Search By Invoice No.">
                </md-field>
              </div>
              <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-33">
                <md-field>
                  <input v-model="filtercreated_at" type="date">
                </md-field>
              </div>
            </div>
            <md-divider class="hr-divider"></md-divider>
            <div>
              <table class="mytable">
                <thead>
                  <tr>
                    <th>Sr.</th>
                    <th>Customer</th>
                    <th>OrderBooker</th>
                    <th>SaleMan</th>
                    <th>Total</th>
                    <th>Received</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item ,index) in datalist" :key="index">
                    <td>{{ item.invoice_id }}</td>
                    <td><router-link :to="{ name: 'EditInvoice', params: { id: item.invoice_id } }">{{ item.customer_name }}</router-link></td>
                    <td>{{ item.orderbooker_name }}</td>
                    <td>{{ item.saleman_name }}</td>
                    <td>{{ item.total }}</td>
                    <td><input type="number" v-model="item.received" class="myinp" step="any"></td>
                    <td>
                      <md-icon @click="deleteInvoice(item.invoice_id)" class="myicon md-accent">delete</md-icon>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- Divider -->
          </md-card-content>
          <md-divider class="hr-divider"></md-divider>
          <md-card-actions>
            <div class="md-layout">
              <div class="md-layout-item md-small-size-100 md-size-60">
                <label>Expense</label>
                <input class="myinp" v-model="expense[0].amount" type="number">
                <input class="myinp" v-model="expense[0].desc" type="text"><br>
                <label>Expense</label>
                <input class="myinp" v-model="expense[1].amount" type="number">
                <input class="myinp" v-model="expense[1].desc" type="text">
              </div>
              <div class="md-layout-item md-small-size-100 md-size-35">
                <label>Total All Invoice_.</label>
                <input class="myinp" v-model="allinvoicestotal" type="number"><br>
                <label>Total Received___</label>
                <input class="myinp" v-model="allinvoicesreceived" type="number">
              </div>
            </div>
          </md-card-actions>
          <div class="md-layout">
            <div class="md-layout-item md-small-size-100 md-size-70"></div>
            <div class="md-layout-item md-small-size-100 md-size-25">
              <md-button @click="active = true" class="md-success">Received all Invoices</md-button>
            </div>
          </div>
        </md-card>
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
  name: "SaleManList",
  props: {
    tableHeaderColor: {
      type: String,
      default: "green"
    }
  },
  data() {
    return {
      selected: [],
      filtercustomers: '',
      filtersale_men: '',
      filterorder_bookers: '',
      filterid: null,
      filtercreated_at: '',
      flt_str:'',
      expense: [{amount:0.0,desc:'Petrol'},{amount:0.0,desc:'Misc.'}],
      allinvoicestotal: null,
      allinvoicesreceived: null,
      datalist: [],
      active: false,
      success: false,
      fail: false,
      pgdata: {},
      pglimit: 5
    };
  },
  mounted() {
    // Fetch initial results
    this.getResults();
    this.filtercreated_at = this.getDate();
  },
  watch: {
    // whenever filtercreated_at changes, this function will run
    filtercreated_at: function (newQuestion, oldQuestion) {
      console.log(this.filtercreated_at)
      this.getResults();
    }
  },
  methods: {
    
    // Our method to GET results from a Laravel endpoint
    getResults(page = 1) {
      this.filter();
      axios.get('/invoice?page='+ page + this.flt_str)
      .then(d => {this.datalist = d.data; })
      .catch(err => console.log(err));
    },
    filter(){
      this.flt_str += '&filternumjoininvoices-received=0'
      this.flt_str += '&filterstrjoincustomers-name='+this.filtercustomers
      this.flt_str += '&filterstrjoinsale_men-name='+this.filtersale_men
      this.flt_str += '&filterstrjoinorder_bookers-name='+this.filterorder_bookers
      this.flt_str += '&filternumjoininvoices-id='+this.filterid
      this.flt_str += '&filterdatejoininvoices-created_at='+this.filtercreated_at
    },
    filterlist(){
      this.getResults();
    },
    getDate () {
      const toTwoDigits = num => num < 10 ? '0' + num : num;
      let today = new Date();
      let year = today.getFullYear();
      let month = toTwoDigits(today.getMonth() + 1);
      let day = toTwoDigits(today.getDate());
      return `${year}-${month}-${day}`;
    },
    deleteInvoice(id,ind){
      axios.post('/invoice/'+ id, {'id':id, '_method':'DELETE'})
      .then(d => { this.getResults(); })
      .catch(err => console.log(err));

    },
    save(){
      axios.post('/invoice_received',{'expense':this.expense,'productrows':this.datalist,'customer':this.customer,'orderbooker':this.orderbooker,'saleman':this.saleman,'invoicedate':this.invoicedate})
        .then(d => { console.log(d.data) })
        .catch(err => console.log(err));
        this.success=true;

    },
    onCancel(){

    }
  },
  created(){
    this.getResults();
  }
};
</script>
<style lang="scss" scoped>
.md-field{
  padding-top: 5px !important;
  margin: 0px 0px 0px;
  min-height: 35px !important;
  input{
    padding: 0px 10px;
    height: 30px;
    width:100%;
    font-size: 0.8rem;
  }
}
.hr-divider{
  border-top: 2px dashed #aaa;
  width: 100%;
  margin: 20px 0px;
}
</style>
