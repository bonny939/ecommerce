import { defineStore } from "pinia";
import ability from "../services/ability";
import axios from "axios";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    authUser: JSON.parse(localStorage.getItem("user")),
    token: localStorage.getItem("auth") || false
  }),
  getters: {
    authenticated: (state) => !!state.token,
    user: (state) => state.authUser
  },
  actions: {
    async getToken() {
      await axios.get("sanctum/");
    },
    async getUser() {
      try {
        const data = await axios.get("api/getuser");

        console.log("Response data:", response.data);
        const userAbility = data.ability;

  
        this.authUser = data.data;
        this.token = true;
        localStorage.setItem("user", JSON.stringify(data.data));
        ability.update([{ action: userAbility, subject: "all" }]);
      } catch (error) {
        console.error("Error while fetching user data:", error);
      }
    },

    async logout() {
      ability.update([]);
      this.token = false;
      this.authUser = null;
      localStorage.removeItem("auth");
      localStorage.removeItem("user");
      await axios.post("/api/logout");
    }
  }
});
