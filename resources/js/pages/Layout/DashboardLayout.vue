<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <notifications></notifications>

    <side-bar>
      <mobile-menu slot="content"></mobile-menu>
      <sidebar-link to="/dashboard">
        <md-icon>dashboard</md-icon>
        <p>Dashboard</p>
      </sidebar-link>
      <sidebar-link to="/user">
        <md-icon>person</md-icon>
        <p>Vendor Profile</p>
      </sidebar-link>
      <sidebar-link to="/create_vendore_profile">
        <md-icon>person</md-icon>
        <p>Vreate Vendor Profile</p>
      </sidebar-link>
      <sidebar-link to="/vendorslist">
        <md-icon>supervisor_account</md-icon>
        <p>Vendors list</p>
      </sidebar-link>
      <sidebar-link to="/mhallslist">
        <md-icon>location_city</md-icon>
        <p>MarriageHalls list</p>
      </sidebar-link>
      <sidebar-link to="/disheslist">
        <md-icon>fastfood</md-icon>
        <p>Dishes list</p>
      </sidebar-link>
      <sidebar-link to="/requestslist">
        <md-icon>message</md-icon>
        <p>Requests</p>
      </sidebar-link>
      <sidebar-link to="/notifications">
        <md-icon>comment</md-icon>
        <p>Notifications</p>
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
