<template>
  <div class="hello">
    <h1>{{ title }}</h1>
    <div class="row">
      <div class="col-4">
        <img :src="image" height="200" alt />
      </div>
      <div class="col-8">
        <div>
          <p v-if="data.inStock">In Stock</p>
          <p v-else>Out of Stock</p>
        </div>
        <div>
          <p>Shipping: {{ shipping }}</p>
        </div>
        <div>
          <p v-if="inventory > 10">More then 10 in store</p>
          <p v-else-if="inventory <= 10 && inventory > 0">Almost sold out!</p>
          <p v-else>Sold Out</p>
        </div>
        <div>
          <p v-show="data.ugly">sock are fugly!</p>
        </div>
        <div
          v-for="(variant, index) in data.variants"
          :key="variant.id"
          class="color-box"
          :style="{ backgroundColor: variant.variantColor }"
          @mouseover="updateProduct(index)"
        ></div>
        <div>
          <button
            @click="addToCart"
            :disabled="enableDisableBtn"
            :class="{ disabledButton: enableDisableBtn }"
          >Add to cart</button>
        </div>
      </div>
    </div>
    <ProductTabs :reviews="data.reviews" />
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
import ProductTabs from './ProductTabs.vue';
import { bus } from '../../EventBus/EventBus';

@Component({
  components: {
    ProductTabs
  }
})
export default class ProductInfo extends Vue {
  @Prop() private premium!: string;
  data = {
    product: "Socks",
    brand: "Reebock",
    selectedIndex: 0,
    inStock: true,
    ugly: true,
    variants: [
      {
        variantId: 1,
        variantColor: "Yellow",
        variantImage:
          "https://www.happysocks.com/media/catalog/product/m/a/magentoimage_d58ps3qrgje6n3dd.png?quality=80&fit=bounds&height=700&width=700&canvas=700%3A700",
        variantQuantity: 9
      },
      {
        variantId: 2,
        variantColor: "Black",
        variantImage:
          "https://www.happysocks.com/media/catalog/product/m/a/magentoimage_zcdixuuhebyvfqwh.png?quality=80&fit=bounds&height=700&width=700&canvas=700:700",
        variantQuantity: 0
      }
    ],
    reviews: [],
  };

  /* functions */
  addToCart() {
    this.$emit(
      "add-to-cart",
      this.data.variants[this.data.selectedIndex].variantId
    );
  }

  updateProduct(index: number) {
    this.data.selectedIndex = index;
  }

  /* addReview(productReview: any) {
    this.data.reviews.push(productReview);
  } */

  /* Computed functions */
  get title(): string {
    return this.data.brand + " " + this.data.product;
  }

  get image(): string {
    return this.data.variants[this.data.selectedIndex].variantImage;
  }

  get inventory(): number {
    return this.data.variants[this.data.selectedIndex].variantQuantity;
  }

  get enableDisableBtn(): boolean {
    return this.data.variants[this.data.selectedIndex].variantQuantity === 0
      ? true
      : false;
  }

  get shipping(): string {
    return this.premium ? "Free" : "€ 2.99";
  }

  mounted() {
    bus.$on('review-submitted', (productReview: any) => {
      this.data.reviews.push(productReview);
    })
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.color-box {
  width: 40px;
  height: 40px;
  margin: 5px;
}
button {
  background-color: aquamarine;
  &.disabledButton {
    background-color: gray;
  }
}
</style>
