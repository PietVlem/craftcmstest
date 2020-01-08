<template>
  <div class="cocktail-wrapper container" v-if="SingleCocktail">
    <h1>{{ SingleCocktail.title }}</h1>
    <div v-html="SingleCocktail.info"></div>
    <div class="row">
      <div class="col-4">
        <img :src=SingleCocktail.image alt="">
      </div>
      <div class="col-8">
        <h2>Ingrediënten</h2>
        <ul>
          <li v-bind:key="ingredient" v-for="ingredient in SingleCocktail.ingredients">
            {{ ingredient.quantity }} {{ ingredient.ingredient }}
          </li>
        </ul>
      </div>
    </div>
    <h2>Instructies</h2>
    <ol>
      <li v-bind:key="instruction" v-for="instruction in SingleCocktail.instructions">
        {{ instruction.instruction }}
      </li>
    </ol>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
import { State, Action, Getter } from "vuex-class";

@Component
export default class CocktailInfo extends Vue {
  @Getter("SingleCocktail") SingleCocktail: any;
  @Action("fetchSingleCocktail") fetchSingleCocktail: any;

  mounted() {
    this.fetchSingleCocktail(this.$route.params.id);
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.cocktail-wrapper{
  margin-top: 40px;
}
</style>
