<template>
  <div>
    <v-container class="my-3">    
      <!-- {{ JSON.stringify(users) }} -->
      <div v-if="isloading">Loading.....</div>
      <div v-else>
        <table style="width: 100%">
          <thead>
            <tr style="width: 100%">
              <th class="text-left">Id</th>
              <th class="text-left">Name</th>
              <th class="text-left">Email</th>
              <th class="text-left">Edit</th>
              <th class="text-left">Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr
              style="width: 100%"
              v-for="(user, index) in users"
              :key="index"
            >
              <td class="text-left pa-3">{{ index + 1 }}</td>
              <td class="text-left pa-3">{{ user.name }}</td>
              <td class="text-left pa-3">{{ user.email }}</td>
              <td class="text-left pa-3">
                <router-link :to="`/update/${user.id}`">
                  <v-btn color="success" text>Edit</v-btn></router-link
                >
              </td>
              <td class="text-left">
                <v-btn color="error" text @click="deletedata(user.id)"
                  >Delete</v-btn
                >
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </v-container>
  </div>
</template>
<script>
import { mapActions, mapState } from "pinia";
import { useStore } from "@/store";
export default {
  name: "tabelComp",
  computed: {
    ...mapState(useStore, ["users", "isloading"]),
  },
  methods: {
    ...mapActions(useStore, ["getData", "deleteData"]),

    deletedata(id) {
      this.deleteData(id);

      this.getData();
    },
  },
  mounted() {
    this.getData();
  },
};
</script>
<style>
</style>