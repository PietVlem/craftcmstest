<template>
  <div class="hello">
    <div v-if="cocktail">
      <p>{{ cocktail.title }}</p>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
import axios from 'axios';

@Component
export default class CocktailInfo extends Vue {
  cocktail = null;
  
  mounted() {
    axios.get('http://crafttest.test/api/cocktails/'+ this.$route.params.id +'.json').then((res)=>{
      this.cocktail = res.data.data[0];
      console.log(this.cocktail);
    })
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
