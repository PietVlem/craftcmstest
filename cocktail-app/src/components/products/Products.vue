<template>
  <div class="container">
    <div>
      <div class="cart">
        <span>Cart ({{cart.length}})</span>
        <!-- <ul>
          <li :key="item" v-for="item in cart">
            item with id: {{ item }}
          </li>
        </ul> -->
      </div>
    </div>
    <ProductInfo :premium="premium" @add-to-cart="updateCart"/>
  </div>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
import ProductInfo from "./ProductInfo.vue";

@Component({
  components: {
    ProductInfo
  }
})
export default class Products extends Vue {
  premium: boolean = false;
  cart: number[] = [];

  updateCart(id: number){
    this.cart.push(id);
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.cart {
  padding: 20px;
  border: 1px solid black;
  margin-bottom: 40px;
}
</style>
