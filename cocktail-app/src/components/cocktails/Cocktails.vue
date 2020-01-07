<template>
  <div class="hello">
    <ul v-if="cocktails">
      <li v-for="cocktail in cocktails" v-bind:key="cocktail.id">
        <a :href="'/cocktail/' + cocktail.id">{{ cocktail.title }}</a>
      </li>
    </ul>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
import axios from 'axios';

@Component
export default class Cocktails extends Vue {
  cocktails = null;

  mounted() {
    axios.get('http://crafttest.test/api/cocktails.json').then((res)=>{
      this.cocktails = res.data.data;
      console.log(this.cocktails);
    })
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
