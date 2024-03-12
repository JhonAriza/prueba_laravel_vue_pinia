<template >
    <div>
      <div class="bg-dark">
        <v-container class="p-4">
          <h2 class="text-center text-white">Inicio</h2>
        </v-container>
      </div>
      <LoginUserVue />
    </div>
  </template>
  <script>
  import LoginUserVue from "@/components/LoginUserVue.vue";
  
  export default {
    name: "LoginView",
    components: {
      LoginUserVue,
    },
  };
  </script>
  <style>
  </style>