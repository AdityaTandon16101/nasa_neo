<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Chart from "@/Components/Chart.vue";
import { onMounted } from "@vue/runtime-core";
const props = defineProps([
  "dates",
  "numberOfAstroids",
  "fastestAstroids",
  "closestAstroids",
  "averageSizes",
]);

// onMounted(() => {
//   console.info("dates", props.dates);
//   console.info("no_of_astroids", props.numberOfAstroids);
//   console.info("fastestAstroids", props.fastestAstroids);
//   console.info("closestAstroids", props.closestAstroids);
//   console.info("averageSizes", props.averageSizes);
// });
</script>

<template>
  <div class="w-3/4 mt-4 mx-auto">
    <table class="table w-3/5 mx-auto">
      <thead>
        <tr>
          <th>Date</th>
          <th>Fastest</th>
          <th>Closest</th>
          <th>Average</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(date, index) in props.dates" :key="date">
          <td>{{ index }} - {{ date }}</td>
          <td>{{ props.fastestAstroids[index].name }}</td>
          <td>{{ props.closestAstroids[index].name }}</td>
          <td>{{ props.averageSizes[index] }}</td>
        </tr>
      </tbody>
    </table>
    <div class="flex-1 h-60">
      <Chart :dates="props.dates" :numberOfAstroids="props.numberOfAstroids" />
    </div>
    <div>
      <Link :href="route('index')">Go Back</Link>
    </div>
  </div>
</template>
