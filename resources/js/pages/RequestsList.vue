<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <md-card>
          <md-card-header data-background-color="green">
            <h4 class="title">All Customers Requests</h4>
            <a href="/"></a>
          </md-card-header>
          <md-card-content>
            <request-table table-header-color="green"></request-table>
          </md-card-content>
        </md-card>
      </div>
    </div>
  </div>
</template>

<script>
import {
  RequestTable,
  OrderedTable,
  NavTabsTable
} from '@/components'

export default{
  components: {
    OrderedTable,
    RequestTable,
    NavTabsTable
  }
}
</script>
