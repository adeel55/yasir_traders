<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <md-card>
          <md-card-header data-background-color="green">
            <h4 class="title">Vendors List</h4>
            <a href="/"></a>
          </md-card-header>
          <md-card-content>
            <vendor-table table-header-color="green"></vendor-table>
          </md-card-content>
        </md-card>
      </div>
    </div>
  </div>
</template>

<script>
import {
  VendorTable,
  OrderedTable,
  NavTabsTable
} from '@/components'

export default{
  components: {
    OrderedTable,
    VendorTable,
    NavTabsTable
  }
}
</script>
