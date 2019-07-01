<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <notifications></notifications>

    <side-bar>
      <mobile-menu slot="content"></mobile-menu>
      <sidebar-link to="/dashboard">
        <md-icon>dashboard</md-icon>
        <p>Dashboard</p>
      </sidebar-link>
      <sidebar-link to="/add_product">
        <md-icon>widgets</md-icon>
        <p>Add Products</p>
      </sidebar-link>
      <sidebar-link to="/create_invoice">
        <md-icon>description</md-icon>
        <p>Create Invoice</p>
      </sidebar-link>
      <sidebar-link to="/receive_invoice">
        <md-icon>assignment_returned</md-icon>
        <p>Receive Invoice</p>
      </sidebar-link>
      <sidebar-link to="/add_order_booker">
        <md-icon>directions_walk</md-icon>
        <p>Add Order Booker</p>
      </sidebar-link>
      <sidebar-link to="/add_sale_man">
        <md-icon>local_shipping</md-icon>
        <p>Add Sale Man</p>
      </sidebar-link>
      <sidebar-link to="/order_booker_list">
        <md-icon>dehaze</md-icon>
        <p>Order Booker List</p>
      </sidebar-link>
      <sidebar-link to="/sale_man_list">
        <md-icon>dehaze</md-icon>
        <p>Sale Man List</p>
      </sidebar-link>
      <sidebar-link to="/product_list">
        <md-icon>dehaze</md-icon>
        <p>Product List</p>
      </sidebar-link>
      <sidebar-link to="/company_list">
        <md-icon>dehaze</md-icon>
        <p>Company List</p>
      </sidebar-link>
      <sidebar-link to="/expense_report">
        <md-icon>list_alt</md-icon>
        <p>Sales Report</p>
      </sidebar-link>
      <sidebar-link to="/sales_report">
        <md-icon>list_alt</md-icon>
        <p>Expense Report</p>
      </sidebar-link>
      <sidebar-link to="/maps">
        <md-icon>settings</md-icon>
        <p>Settings</p>
      </sidebar-link>
    </side-bar>

    <div class="main-panel">
      <top-navbar></top-navbar>

      <dashboard-content> </dashboard-content>

      <content-footer v-if="!$route.meta.hideFooter"></content-footer>
    </div>
  </div>
</template>
<style lang="scss"></style>
<script>
import TopNavbar from "./TopNavbar.vue";
import ContentFooter from "./ContentFooter.vue";
import DashboardContent from "./Content.vue";
import MobileMenu from "@/pages/Layout/MobileMenu.vue";

export default {
  components: {
    TopNavbar,
    DashboardContent,
    ContentFooter,
    MobileMenu
  }
};
</script>
