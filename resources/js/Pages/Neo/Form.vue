<script setup>
import ValidationErrors from "@/Components/ValidationErrors.vue";
import Label from "@/Components/Label.vue";
import Input from "@/Components/Input.vue";
import Button from "@/Components/Button.vue";
import { useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
  start_date: "2020-04-01",
  end_date: "2020-04-10",
});

const submit = () => {
  form.get(route("nasa.neo"), {
    onFinish: () => form.reset(),
  });
};
</script>

<template>
  <div class="w-1/4 mx-auto">
    <form @submit.prevent="submit">
      <ValidationErrors class="mb-4" />
      <div class="text-xl my-3">Get NASA NEO Data</div>
      <div class="mb-2">
        <Label class="leading-8" value="Choose Start Date" />
        <Input class="w-full" type="date" name="start_date" v-model="form.start_date" />
      </div>
      <div>
        <Label class="leading-8" value="Choose End Date" />
        <Input class="w-full" type="date" name="end_date" v-model="form.end_date" />
      </div>
      <Button class="mt-2" type="submit">Submit</Button>
    </form>
  </div>
</template>
