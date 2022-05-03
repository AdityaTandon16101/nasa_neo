<script setup>
import Chart from "@/Components/Chart.vue";
const props = defineProps([
  "numberOfAstroids",
  "fastestAstroids",
  "closestAstroids",
  "averageSizes",
]);
</script>

<template>
  <div>
    <div>
      <table class="table w-full">
        <thead>
          <tr>
            <th>Date</th>
            <th>Fastest</th>
            <th>Closest</th>
            <th>Average</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="astroid in props.fastestAstroids" :key="astroid"></tr>
        </tbody>
      </table>
      <strong>Fastest Asteroid (km/h)</strong>
    </div>
    <div>
      <Chart :numberOfAstroids="props.numberOfAstroids" />
    </div>
  </div>
</template>
