<template>
  <div class>
    <span
      class="tab"
      :class="{activeTab: selectedTab === tab}"
      v-for="(tab) in tabs"
      :key="tab"
      @click="selectedTab = tab"
    >{{ tab }}</span>
    <div class="padding-top" v-show="selectedTab === 'Reviews'">
      <h2>Reviews</h2>
      <p v-if="!reviews.length">there are no reviews</p>
      <ul>
        <li v-for="review in reviews" :key="review.id">
          <p>name: {{ review.name }}</p>
          <p>Rating: {{ review.rating }}</p>
          <p>Review: {{ review.review }}</p>
        </li>
      </ul>
    </div>
    <ProductReview v-show="selectedTab === 'Make a review'"/>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
import ProductReview from "./ProductReview.vue";

@Component({
  components: {
      ProductReview
  }
})
export default class ProductTabs extends Vue {
  @Prop() private reviews!: any[];
  tabs: string[] = ["Reviews", "Make a review"];
  selectedTab: string = "Reviews";
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.padding-top{
  padding-top: 40px;
}
.tab{
  margin-right: 20px;
  &.activeTab{
    color: rebeccapurple;
    text-decoration: underline;
  }
}
</style>
