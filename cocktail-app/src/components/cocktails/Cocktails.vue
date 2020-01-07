<template>
  <div class="hello">
    <ul v-if="AllCocktails">
      <li v-for="cocktail in AllCocktails" v-bind:key="cocktail.id">
        <a :href="'/cocktail/' + cocktail.id">{{ cocktail.title }}</a>
      </li>
    </ul>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
import { State, Action, Getter } from 'vuex-class';

@Component
export default class Cocktails extends Vue {
  @Getter('AllCocktails') AllCocktails: any;
  @Action('fetchCocktails') fetchCocktails: any;

  mounted() {
    this.fetchCocktails();
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
ul{
  background-color: red;
  li{
    background-color: aqua;
  }
}

</style>
