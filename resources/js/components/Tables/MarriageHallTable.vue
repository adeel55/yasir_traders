<template>
  <div>
    <md-table v-model="mhalls" :table-header-color="tableHeaderColor">
      <md-table-row slot="md-table-row" slot-scope="{ item }">
        <md-table-cell md-label="Id">{{ item.id }}</md-table-cell>
        <md-table-cell md-label="Name">{{ item.name }}</md-table-cell>
        <md-table-cell md-label="Address">{{ item.address }}</md-table-cell>
        <md-table-cell md-label="Website">{{ item.website }}</md-table-cell>
      </md-table-row>
    </md-table>
    <md-divider></md-divider>
    <pagination class="mt-5" :data="pgdata" @pagination-change-page="getResults"></pagination>
  </div>
</template>

<script>
export default {
  name: "marriage-hall-table",
  props: {
    tableHeaderColor: {
      type: String,
      default: ""
    }
  },
  data() {
    return {
      selected: [],
      mhalls: [],
      pgdata: {},
      msg: ""
    };
  },
  mounted() {
    // Fetch initial results
    this.getResults();
  },
  methods: {
    
    // Our method to GET results from a Laravel endpoint
    getResults(page = 1) {
      axios.get('/marriage_halls?page='+ page)
      .then(d => {this.mhalls = d.data.data; this.pgdata = d.data})
      .catch(err => console.log(err));
    }
  },
  created(){
    axios.get('/marriage_halls')
      .then(d => this.mhalls = d.data.data)
      .catch(err => console.log(err));
  }
};
</script>
