<template >
  <div>
    <div class="bg-dark">
      <v-container class="p-4">
        <h2 class="text-center text-white">update</h2>
      </v-container>
    </div>
    <EditUserVue />
  </div>
</template>
<script>
import EditUserVue from "@/components/EditUser.vue";

export default {
  name: "UpdateView",
  components: {
    EditUserVue,
  },
};
</script>
<style>
</style>