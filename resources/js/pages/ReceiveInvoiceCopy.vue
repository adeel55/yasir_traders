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
              <md-table v-model="datalist" :table-header-color="tableHeaderColor">

                <md-table-empty-state md-label="No record found">
                </md-table-empty-state>

                <md-table-row slot="md-table-row" slot-scope="{ item }">
                  <md-table-cell md-label="Sr.">{{ item.invoice_id }}</md-table-cell>
                  <md-table-cell md-label="Customer">
                    <router-link :to="{ name: 'EditInvoice', params: { id: item.invoice_id } }">{{ item.customer_name }}</router-link>
                  </md-table-cell>
                  <md-table-cell md-label="Order Booker">{{ item.orderbooker_name }}</md-table-cell>
                  <md-table-cell md-label="Sale Man">{{ item.saleman_name }}</md-table-cell>
                  <md-table-cell md-label="Date">{{ item.created_at }}</md-table-cell>
                  <md-table-cell md-label="Delete"><md-button @click="deleteInvoice(item.invoice_id)" class="md-fab md-btn-fab md-mini md-danger">
                     <md-icon>delete</md-icon>
                  </md-button></md-table-cell>
                </md-table-row>
              </md-table>
              <!-- Divider -->
              <md-divider class="hr-divider"></md-divider>
              <!-- Pagination -->
              <pagination :data="pgdata" @pagination-change-page="getResults" :limit="pglimit">
                <span slot="prev-nav">&lt; Previous</span>
                <span slot="next-nav">Next &gt;</span>
              </pagination>
            </div>
          </md-card-content>
          <md-card-actions>
            <div class="md-layout">
              <div class="md-layout-item md-small-size-100 md-size-70">
                <label>Expense</label>
                <input class="myinp" type="number">
                <input class="myinp" type="text"><br>
                <label>Expense</label>
                <input class="myinp" type="number">
                <input class="myinp" type="text">
              </div>
              <div class="md-layout-item md-small-size-100 md-size-20">
                <md-button class="md-success">Received all Invoices</md-button>
              </div>
            </div>
          </md-card-actions>
        </md-card>
      </div>
    </div>
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
      datalist: [],
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
      .then(d => {this.datalist = d.data.data; this.pgdata = d.data; })
      .catch(err => console.log(err));
    },
    filter(){
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
