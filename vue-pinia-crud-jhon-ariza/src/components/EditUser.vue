<template >
  <div>
    <v-container>
       {{ JSON.stringify(users) }}
      <v-row justify="center">
        <v-col xl="6" lg="6" md="6" sm="12">
          <router-link to="/home">
            <v-btn text class="my-2" color="secondary"
              >Usuarios</v-btn
            ></router-link
          >
          <v-card>
            <v-card-title> Update Form </v-card-title>
            <v-card-subtitle>
              <form
                style="width: 100%"
                class="pa-3"
                @submit.prevent="updatedata()"
              >
                <v-text-field
                  style="width: 100%"
                  outlined
                  v-model="name"
                  label="Enter Your Name"
                ></v-text-field><v-btn type="submit" text color="primary">{{
                  isloading ? "Updating..." : "Update"
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
import axios from "axios";
import { mapActions } from "pinia";
import { useStore } from "@/store";
export default {
  name: "EditComp",
  data: () => ({
    id: "",
    name: "",
  }),
  methods: {
    ...mapActions(useStore, ["updateData"]),
    updatedata() {
      // console.log('Datos del usuario para actualizar ', data);
      const data = {
        id: this.$route.params.id,
        name: this.name,
      
      };  console.log(data.id, data.name);
      this.updateData(data);
    },
  },
  async mounted() {
    try {
        const userId = this.$route.params.id;
        const res = await axios.get(`http://localhost:8000/api/users/${userId}`);
        
        // console.log('Datos del usuario:', res.data.data);
        this.name = res.data.data.name;
    
    } catch (error) {
        console.error('Error al obtener datos del usuario:', error);
    }
},

};
</script>
<style>
</style>