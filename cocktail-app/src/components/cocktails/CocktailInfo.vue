<template>
  <div class="hello">
    <div v-if="SingleCocktail">
      <p>{{ SingleCocktail.title }}</p>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
import { State, Action, Getter } from 'vuex-class';
import axios from 'axios';

@Component
export default class CocktailInfo extends Vue {
  @Getter('SingleCocktail') SingleCocktail: any;
  @Action('fetchSingleCocktail') fetchSingleCocktail: any;

  mounted() {
    this.fetchSingleCocktail(this.$route.params.id);
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
