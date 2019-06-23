<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-size-66">
        <create-profile-form data-background-color="green">

        </create-profile-form>
      </div>
      <div class="md-layout-item md-medium-size-100 md-size-33">
        <user-card>

        </user-card>
      </div>
    </div>
  </div>
</template>

<script>
import {
  CreateProfile,
  UserCard
} from '@/pages'

export default{
  components: {
    CreateProfile,
    UserCard
  }
}
</script>
