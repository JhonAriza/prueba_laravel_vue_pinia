import router from '@/router';
import axios from 'axios';
import { defineStore } from 'pinia'

export const useStore = defineStore({
    id: 'users',
    state: () => ({
        users: [],
        isloading: false,
    }),
    actions: {
        async LoginData(data) {
            this.isloading = true;
            try {
              const res = await axios.post("http://localhost:8000/api/login", data)
           
              if (res.data.message=='Logueado correctamente') {
                alert(res.data.message);
                this.isloading = false;
                router.push('/home'); 

              } else {
                router.push('/register');
              }
            } catch (error) {
                alert("credenciales o correo incorrecto");
              console.error("Error during login:", error);
            }
          },

          async registerData(data) {
            this.isloading = true;
            try {
            const res = await axios.post("http://localhost:8000/api/register", data)
            if (res.data.access_token) {
                router.push('/home');
                data.name = "";
                data.email = "";
                data.password = "";
            } else {   alert("credenciales o correo incorrecto");
                this.isloading = false;
             //   alert(res.data.message)  
                 router.push('/');
            }
        } catch (error) {
            alert("debe ser un correo valido");
          console.error("Error during login:", error);
        }
        },


        async storeData(data) {
            this.isloading = true;
            // const res = await (await fetch("http://localhost:8000/api/contact", {
            //     method: "POST",
            //     body: JSON.stringify(data),
            // })).json();
            // we can use axios so the fetch method is not method
            const res = await axios.post("http://localhost:8000/api/users", data)
            if (res.data.message) {
                alert(res.data.message)
                this.isloading = false;
                router.push('/home')
                data.name = "";
                data.email = "";
                data.password = "";
            } else {
                this.isloading = false;
                alert(res.data.message)
            }
        },

        async getData() {
            this.isloading = true;
            const res = await axios.get("http://localhost:8000/api/users")
          //if(res.data.statusCode==200){
         if (res.data.message) {
                this.isloading = false;
                this.users = res.data.data;
            }
        },
        async deleteData(id) {
            const res = await axios.delete("http://localhost:8000/api/users/" + id)
            if (res.data.message) {
                alert(res.data.message)
            }
        },

        async updateData(data) {
            this.isloading = true;
            const res = await axios.post("http://localhost:8000/api/users/" + data.id, data)
            if (res.data.message) {
                alert(res.data.message)
                this.isloading = false;
                 router.push('/home');
                data.name = "";
 
            } else {
                this.isloading = false;
                alert(res.data.message)
            }

        },
        
    }
})