<template >
    <div>
      <div class="bg-dark">
        <v-container class="p-4">
          <h2 class="text-center text-white">register</h2>
        </v-container>
      </div>
      <RegisterUserVue />
    </div>
  </template>
  <script>
  import RegisterUserVue from "@/components/RegisterUserVue.vue";
  
  export default {
    name: "RegisterView",
    components: {
      RegisterUserVue,
    },
  };
  </script>
  <style>
  </style>