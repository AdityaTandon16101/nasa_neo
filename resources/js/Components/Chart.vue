<script setup>
import { Chart } from "chart.js";

const props = defineProps(["numberOfAstroids"]);

const ctx = document.getElementById("Chart").getContext("2d");

const barChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: Object.keys(props.numberOfAstroids),
    datasets: [
      {
        label: "Number of Astroids",
        data: Object.values(props.numberOfAstroids),
        borderWidth: 1,
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
});
</script>

<template>
  <canvas id="Chart" width="400" height="400"></canvas>
</template>
