<template>
  <div class="content">
    <DialogPrompt length="80" placeholder="Marriage Hall Name..." title="Add New Company" confirm="Add" cancel="Cancel"></DialogPrompt>
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <md-card>
          <md-card-header data-background-color="green">
            <h4 class="title">Companies List</h4>
          </md-card-header>
          <md-card-content>
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
          </md-card-content>
        </md-card>
      </div>
    </div>

  </div>
</template>

<script>
import { DialogPrompt } from "@/components"
export default {
  props: {
    tableHeaderColor: {
      type: String,
      default: "green"
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
      axios.get('/companies?page='+ page)
      .then(d => {this.mhalls = d.data.data; this.pgdata = d.data})
      .catch(err => console.log(err));
    }
  },
  created(){
    axios.get('/companies')
      .then(d => this.mhalls = d.data.data)
      .catch(err => console.log(err));
  }
};

</script>
