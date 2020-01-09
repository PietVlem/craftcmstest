<template>
  <div class="review">
    <h2>Review this product</h2>
    <!-- .prevent = preventdefault -->
    <form @submit.prevent="onSubmit">
      <div v-if="errors.length">
        <p><b>Please correct following errors</b></p>
        <ul>
          <li v-for="error in errors" :key="error">
            {{ error }}
          </li>
        </ul>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input
          type="text"
          class="form-control"
          id="exampleFormControlInput1"
          placeholder="john Doe"
          v-model="name"
        />
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Review</label>
        <textarea
          class="form-control"
          id="exampleFormControlTextarea1"
          rows="3"
          v-model="review"
        ></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Rate this product</label>
        <select
          class="form-control"
          id="exampleFormControlSelect1"
          v-model.number="rating"
        >
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <button>Send</button>
    </form>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
import { bus } from '../../EventBus/EventBus';
import uuid from "uuid";

@Component({
  components: {}
})
export default class ProductReview extends Vue {
  name: string = '';
  review: string = '';
  rating: number = 0;
  errors: string[] = [];

  onSubmit() {
    if (this.name && this.review && this.rating) {
      let productReview = {
        id: uuid.v1(),
        name: this.name,
        review: this.review,
        rating: this.rating
      };
      bus.$emit("review-submitted", productReview);
      this.name = '';
      this.review = '';
      this.rating = 0;
    } else {
      if (!this.name) this.errors.push("Name required.");
      if (!this.review) this.errors.push("review required.");
      if (!this.rating) this.errors.push("rating required.");
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.review {
  padding-top: 40px;
}
</style>
