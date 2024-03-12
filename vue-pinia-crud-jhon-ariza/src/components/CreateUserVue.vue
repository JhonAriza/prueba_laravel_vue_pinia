<template>
  <div>
    <v-container>
      <v-row justify="center">
        <v-col xl="6" lg="6" md="6" sm="12">
          <router-link to="/home">
            <v-btn text class="my-2" color="primary"
              >Usuarios</v-btn
            ></router-link
          >
          <v-card>
            <v-card-title> Create Form </v-card-title>
            <v-card-subtitle>
              <form style="width: 100%" class="pa-3" @submit.prevent="store()">
                <v-text-field
                  style="width: 100%"
                  outlined
                  v-model="name"
                  label="Enter Your Name"
                ></v-text-field>
                <v-text-field
                  style="width: 100%"
                  outlined
                  v-model="email"
                  label="Enter Your Email"
                ></v-text-field>
                <v-text-field
                  style="width: 100%"
                  outlined
                  v-model="password"
                  label="Enter Your password" type="password" 
                ></v-text-field><v-btn type="submit" text color="primary">{{
                  isloading ? "Saving..." : "Save"
                }}</v-btn>
              </form>
            </v-card-subtitle>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>
<script>
import { mapActions, mapState } from "pinia";
import { useStore } from "@/store";
export default {
  name: "CreateComp",
  data: () => ({
    name: "",
    email: "",
    password: "",
  }),
  computed: {
    ...mapState(useStore, ["isloading"]),
  },
  methods: {
    ...mapActions(useStore, ["storeData"]),
    store() {
      const data = {
        name: this.name,
        email: this.email,
        password: this.password,
      };
      this.storeData(data);
    },
  },
};
</script>
<style></style>
