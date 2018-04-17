<template>
  <router-view></router-view>
</template>

<script>
import userStore from '../../assets/js/stores/userStore'

export default {
  name: 'app',
  created() {
    this.redirect()
  },
  methods: {
    redirect() {
      if (!userStore.state.authenticated) {
        this.$router.push('/login')
      }
    }
  }
}
</script>

<style>
  /* Import Font Awesome Icons Set */
  @import '~flag-icon-css/css/flag-icon.min.css';
  /* Import Font Awesome Icons Set */
  $fa-font-path: '~font-awesome/fonts/';
  @import '~font-awesome/css/font-awesome.min.css';
  /* Import Simple Line Icons Set */
  $simple-line-font-path: '~simple-line-icons/fonts/';
  @import '~simple-line-icons/css/simple-line-icons.css';
  /* Import Bootstrap Vue Styles */
  @import '~bootstrap-vue/dist/bootstrap-vue.css';
</style>
<style lang="scss">
  // Import Main styles for this application
  @import '../scss/style';
</style>
