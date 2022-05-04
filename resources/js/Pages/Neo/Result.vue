<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Chart from "@/Components/Chart.vue";
const props = defineProps([
  "dates",
  "numberOfAstroids",
  "fastestAstroids",
  "closestAstroids",
  "averageSizes",
]);
</script>

<template>
  <div class="flex flex-row flex-wrap w-3/4 mt-4 mx-auto">
    <table class="table border w-3/5 mx-auto">
      <thead>
        <tr>
          <th>Date</th>
          <th>Fastest</th>
          <th>Closest</th>
          <th>Average</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b" v-for="(date, index) in props.dates" :key="date">
          <td>{{ date }}</td>
          <td>{{ props.fastestAstroids[index].name }}</td>
          <td>{{ props.closestAstroids[index].name }}</td>
          <td>
            {{ parseFloat(props.averageSizes[index]).toFixed(5) }}
          </td>
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
