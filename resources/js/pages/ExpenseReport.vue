<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <md-card>
          <md-card-header data-background-color="green">
            <h4 class="title">Expense Report</h4>
            <a href="/"></a>
          </md-card-header>
          <md-card-content>
            <!-- Filters -->
            <div class="md-layout">
              <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-33">
                <md-field>
                  <input v-model="filtersale_men" @input="filterlist" type="text" placeholder="Search By SaleMan">
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
                    <th>SaleMan</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item ,index) in datalist" :key="index">
                    <td>{{ item.expense_id }}</td>
                    <td>{{ item.saleman_name }}</td>
                    <td>{{ item.amount }}</td>
                    <td>{{ item.description }}</td>
                    <td>{{ item.created_at }}</td>                  </tr>
                </tbody>
              </table>
            </div>
            <!-- Divider -->
            <md-divider class="hr-divider"></md-divider>
            <!-- Pagination -->
            <pagination :data="pgdata" @pagination-change-page="getResults" :limit="pglimit">
              <span slot="prev-nav">&lt; Previous</span>
              <span slot="next-nav">Next &gt;</span>
            </pagination>
          </md-card-content>
          <md-divider class="hr-divider"></md-divider>
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
      filtersale_men: '',
      filtercreated_at: '',
      flt_str:'',
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
      axios.get('/expense?page='+ page + this.flt_str)
      .then(d => {this.datalist = d.data.data; this.pgdata = d.data; })
      .catch(err => console.log(err));
    },
    filter(){
      this.flt_str += '&filterstrjoinsale_men-name='+this.filtersale_men
      this.flt_str += '&filterdatejoinexpenses-created_at='+this.filtercreated_at
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
