<template>
  <div id="app">
    <Navigation/>
    <router-view></router-view>
  </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import Navigation from './components/mainComponents/Navigation.vue';

@Component({
  components: {
    Navigation
  },
})
export default class App extends Vue {}
</script>

<style lang="scss" scoped>

</style>
