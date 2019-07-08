<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <md-card>
          
          <!-- Filters -->
          <div class="md-layout">
            <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-33">
              <md-field>
                <label>By Customer</label>
                <md-input v-model="filtercustomers" @input="getResults" type="text"></md-input>
              </md-field>
            </div>
            <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-33">
              <md-field>
                <label>By Saleman</label>
                <md-input v-model="filtersale_men" @input="getResults" type="text"></md-input>
              </md-field>
            </div>
            <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-33">
              <md-field>
                <label>By OrderBooker</label>
                <md-input v-model="filterorder_bookers" @input="getResults" type="text"></md-input>
              </md-field>
            </div>
          </div> 
          <md-card-header data-background-color="green">
            <h4 class="title">Invoices Deployed</h4>
            <a href="/"></a>
          </md-card-header>
          <md-card-content>
            <div>
              <md-table v-model="datalist" :table-header-color="tableHeaderColor">
                <md-table-row slot="md-table-row" slot-scope="{ item }">
                  <md-table-cell md-label="Id">{{ item.id }}</md-table-cell>
                  <md-table-cell md-label="Name">{{ item.customer }}</md-table-cell>
                  <md-table-cell md-label="Phone No.">{{ item.order_booker }}</md-table-cell>
                  <md-table-cell md-label="Phone No.">{{ item.saleman }}</md-table-cell>
                </md-table-row>
              </md-table>
              <md-divider class="hr-divider"></md-divider>
              <pagination :data="pgdata" @pagination-change-page="getResults" :limit="pglimit">
                <span slot="prev-nav">&lt; Previous</span>
                <span slot="next-nav">Next &gt;</span>
              </pagination>
            </div>
          </md-card-content>
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
      filterid,
      filtercreated_at,
      flt_str:'',
      datalist: [],
      pgdata: {},
      pglimit: 5
    };
  },
  mounted() {
    // Fetch initial results
    this.getResults();
  },
  methods: {
    
    // Our method to GET results from a Laravel endpoint
    getResults(page = 1) {
      this.filter()
      axios.get('/invoice?page='+ page + this.flt_str)
      .then(d => {this.datalist = d.data.data; this.pgdata = d.data})
      .catch(err => console.log(err));
    },
    filter(){
      this.flt_str += '&filterstrjoincustomers-name='+this.filtercustomers
      this.flt_str += '&filterstrjoinsale_men-name='+this.filtersale_men
      this.flt_str += '&filterstrjoinorder_bookers-name='+this.filterorder_bookers
    }
  },
  created(){
    this.getResults();
  }
};
</script>
<style type="scss" scoped>
  .hr-divider{
    border-top: 2px dashed #aaa;
    width: 100%;
  }
</style>
