<template>
  <div class="content">
    <DialogPrompt length="80" placeholder="Marriage Hall Name..." title="Add Marriage Hall" confirm="Add" cancel="Cancel"></DialogPrompt>
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <md-card>
          <md-card-header data-background-color="green">
            <h4 class="title">Marriage Halls List</h4>
          </md-card-header>
          <md-card-content>
            <marriage-hall-table table-header-color="green"></marriage-hall-table>
          </md-card-content>
        </md-card>
      </div>
    </div>

  </div>
</template>

<script>
import {
  MarriageHallTable,
  OrderedTable,
  NavTabsTable,
  Modal,
  DialogPrompt
} from '@/components'

export default{
  components: {
    OrderedTable,
    MarriageHallTable,
    NavTabsTable,
    Modal
  }
}
</script>
