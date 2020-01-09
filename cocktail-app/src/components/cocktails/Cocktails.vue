<template>
  <div class="container" v-if="AllCocktails">
    <div class="cocktail-wrapper row" v-for="cocktail in AllCocktails" v-bind:key="cocktail.id">
      <div class="col-4">
        <img :src=cocktail.image alt="">
      </div>
      <div class="col-8">
        <a :href="'/cocktail/' + cocktail.id">
          <h2>{{ cocktail.title }}</h2>
        </a>
        <div v-html="cocktail.info"></div>
        <a :href="'/cocktail/' + cocktail.id" class="button button-primary">
          Lees meer
        </a>
      </div>
    </div>
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
.container{
  margin-top: 40px;
}
.cocktail-wrapper{
  margin-bottom: 40px,
}

</style>
