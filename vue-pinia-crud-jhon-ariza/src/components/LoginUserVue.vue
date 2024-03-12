<template>
  <div>
    <v-container>
      <v-row justify="center">
        <v-col cols="12" sm="8" md="6" lg="4">
          <router-link to="/register">
            <v-btn text class="my-2" color="secondary">Registrarse</v-btn>
          </router-link>
          
          <v-card>
            <v-card-title> Login User </v-card-title>
            <v-card-subtitle>
              <form style="width: 100%" class="pa-3" @submit.prevent="store()">
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
                  label="Enter Your Password"
                ></v-text-field>
                <v-btn type="submit"  text color="primary">
                  {{ isloading ? "Logging in..." : "Iniciar Sesion" }}
                </v-btn>
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
import { useRouter } from "vue-router";

export default {
  name: "LoginComp",
  data: () => ({
    email: "",
    password: "",
  }),
  computed: {
    ...mapState(useStore, ["isloading"]),
  },
  methods: {
    ...mapActions(useStore, ["LoginData"]),
    async store() {
      const data = {
        email: this.email,
        password: this.password,
      };

      try {
        const response = await this.LoginData(data);

        if (response.success === "Logueado correctamente") {
          // Redirige a la vista '/home'
          const router = useRouter();
          router.push("/home");
        } else {
          // Muestra un mensaje de error o realiza alguna acción
          alert(response.message);
        }
      } catch (error) {
        console.error("Error during login:", error);
        // Manejo de errores si es necesario
      }
    },
  },
};
</script>

<style scoped>
/* Puedes agregar estilos específicos para este componente si es necesario */
</style>
