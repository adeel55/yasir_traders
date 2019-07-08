<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <md-card>
          <md-card-header data-background-color="green">
            <h4 class="title">Sales Report</h4>
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
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Bonus</th>
                    <th>Avg Price</th>
                    <th>Purchase</th>
                    <th>Sale</th>
                    <th>profit</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item ,index) in datalist" :key="index">
                    <td>{{ item.product_name }}</td>
                    <td>{{ item.sum_qty }}</td>
                    <td>{{ item.sum_bonus }}</td>
                    <td>{{ item.avg_unit_price }}</td>
                    <td>{{ item.sum_purchase_amount }}</td>
                    <td>{{ item.sum_sales_amount }}</td>
                    <td>{{ item.profit }}</td>
                  </tr>
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
      active: false,
      success: false,
      fail: false,
      pgdata: {},
      pglimit: 5
    };
  },
  mounted() {
    // Fetch initial resu
    this.filtercreated_at = this.getDate();
  },
  watch: {
    // whenever filtercreated_at changes, this function will run
    filtercreated_at: function () {
      this.getResults();
    }
  },
  methods: {
    
    // Our method to GET results from a Laravel endpoint
    getResults(page = 1) {
      this.filter();
      axios.get('/sale?page='+ page + this.flt_str)
      .then(d => {this.datalist = d.data.data; this.pgdata = d.data; })
      .catch(err => console.log(err));
    },
    filter(){
      // this.flt_str += '&filterdatejoinsales-created_at='+this.filtercreated_at
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
