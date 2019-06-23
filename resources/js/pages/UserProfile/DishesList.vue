<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <md-card>
          <md-card-header data-background-color="green">
            <h4 class="title">Dishes List</h4>
            <a href="/"></a>
          </md-card-header>
          <md-card-content>
            <dish-table table-header-color="green"></dish-table>
          </md-card-content>
        </md-card>
      </div>
    </div>
  </div>
</template>

<script>
import {
  DishTable,
  OrderedTable,
  NavTabsTable
} from '@/components'

export default{
  components: {
    OrderedTable,
    DishTable,
    NavTabsTable
  }
}
</script>
