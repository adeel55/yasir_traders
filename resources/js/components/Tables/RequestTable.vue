<template>
  <div>
    <md-table v-model="requests" :table-header-color="tableHeaderColor">
      <md-table-row slot="md-table-row" slot-scope="{ item }">
        <md-table-cell md-label="Id">{{ item.id }}</md-table-cell>
        <md-table-cell md-label="Title">{{ item.title }}</md-table-cell>
        <md-table-cell md-label="Cost">{{ item.cost }}</md-table-cell>
        <md-table-cell md-label="Person">{{ item.person }}</md-table-cell>
      </md-table-row>
    </md-table>
  </div>
</template>

<script>
export default {
  name: "request-table",
  props: {
    tableHeaderColor: {
      type: String,
      default: ""
    }
  },
  data() {
    return {
      selected: [],
      requests: []
    };
  },
  created(){
    axios.get('/requests')
    .then(d => this.requests = d.data)
    .catch(err => console.log(err));
  }
};
</script>
