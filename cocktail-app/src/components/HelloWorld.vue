<template>
  <div class="hello">
    <h1>{{ msg }}</h1>
    <h1>{{ firstName }}</h1>
    <h1>{{ fullName }}</h1>
    <h4>{{ counter }}</h4>
    <button @click="incrementCounter">Press me</button>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
import axios from 'axios';

@Component
export default class HelloWorld extends Vue {
  @Prop() private msg!: string;
  firstName: string = "Pieter";
  lastName: string = "Vleminckx";
  counter: number = 0;

  get fullName(): string {
    return `${this.firstName} ${this.lastName}`;
  }

  incrementCounter(): number {
    return this.counter++;
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
