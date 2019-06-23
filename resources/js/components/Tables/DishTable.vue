<template>
  <div>
    <md-table v-model="dishes" :table-header-color="tableHeaderColor">
      <md-table-row slot="md-table-row" slot-scope="{ item }">
        <md-table-cell md-label="Id">{{ item.id }}</md-table-cell>
        <md-table-cell md-label="Title">{{ item.name }}</md-table-cell>
        <md-table-cell md-label="Cost">{{ item.cost }}</md-table-cell>
        <md-table-cell md-label="Person">{{ item.person }}</md-table-cell>
      </md-table-row>
    </md-table>
  </div>
</template>

<script>
export default {
  name: "dish-table",
  props: {
    tableHeaderColor: {
      type: String,
      default: ""
    }
  },
  data() {
    return {
      selected: [],
      dishes: []
    };
  },
  created(){
    axios.get('/dishes')
    .then(d => this.dishes = d.data)
    .catch(err => console.log(err));
  }
};
</script>
