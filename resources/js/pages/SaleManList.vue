<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <md-card>
          
          <!-- Filters -->
          <div class="md-layout">
            <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50">
              <md-field>
                <label>search by name</label>
                <md-input v-model="filtername" @input="getResults" type="text"></md-input>
              </md-field>
            </div>
            <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50">
              <md-field>
                <label>search by phone</label>
                <md-input v-model="filterphone" @input="getResults" type="text"></md-input>
              </md-field>
            </div>
          </div>
          <md-card-header data-background-color="green">
            <h4 class="title">SaleMan List</h4>
            <a href="/"></a>
          </md-card-header>
          <md-card-content>
            <div>
              <md-table v-model="datalist" :table-header-color="tableHeaderColor">
                <md-table-row slot="md-table-row" slot-scope="{ item }">
                  <md-table-cell md-label="Id">{{ item.id }}</md-table-cell>
                  <md-table-cell md-label="Name">{{ item.name }}</md-table-cell>
                  <md-table-cell md-label="Phone No.">{{ item.phone }}</md-table-cell>
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
      filtername: '',
      filterphone: '',
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
      axios.get('/saleman?page='+ page + this.flt_str)
      .then(d => {this.datalist = d.data.data; this.pgdata = d.data})
      .catch(err => console.log(err));
    },
    filter(){
      this.flt_str += '&filtername='+this.filtername
      this.flt_str += '&filterphone='+this.filterphone
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
