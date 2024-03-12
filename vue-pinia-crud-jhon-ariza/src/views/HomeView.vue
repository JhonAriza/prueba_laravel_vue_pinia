<template>
  <div>
    <div class="bg-dark">
      <v-container class="p-4">
        <h2 class="text-center text-white">Usuarios </h2>
      </v-container>
    </div>
    <v-container class="my-3">
      <v-card>
        <div class="d-flex justify-space-between align-center pa-3">
          <v-card-title>Jhon Alexander ariza Duarte)</v-card-title>
          <router-link to="/create">
            <v-btn text color="success">Nuevo Usuario</v-btn></router-link
          ><router-link to="/">
            <v-btn text class="my-2" color="secondary"
              >Exit.</v-btn
            ></router-link
          >
        </div>
      </v-card>
    </v-container>
    <UserTableVue />
  </div>
</template>

<script>
import UserTableVue from "@/components/UserTable.vue";

export default {
  name: "HomeView",
  components: {
    UserTableVue,
  },
};
</script>

<style >
.bg-dark {
  background-color: rgb(48, 47, 47);
}
a {
  text-decoration: none !important;
}
</style>
