<template >
  <div>
    <div class="bg-dark">
      <v-container class="p-4">
        <h2 class="text-center text-white">crear Usuario</h2>
      </v-container>
    </div>
    <CreateUserVue />
  </div>
</template>
<script>
import CreateUserVue from "@/components/CreateUserVue.vue";

export default {
  name: "CreateView",
  components: {
    CreateUserVue,
  },
};
</script>
<style>
</style>