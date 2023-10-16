import { defineStore } from "pinia";
import ability from "../services/ability";
import axios from "axios";
import axiosClient from "../axios";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    authUser: JSON.parse(localStorage.getItem("user")),
    token: sessionStorage.getItem("TOKEN") || false
  }),
  getters: {
    authenticated: (state) => !!state.token,
    user: (state) => state.authUser
  },
  actions: {
    async getToken() {
      await axios.get("TOKEN");
    },
    async getUser() {
      const data = await axiosClient.get("getuser");
      this.authUser = data.data;
      localStorage.setItem("user", JSON.stringify(data.data));
      ability.update([{ action: data.data.ability, subject: "all" }]);
    },

    async logout() {
      ability.update([]);
      sessionStorage.removeItem('TOKEN')
      this.authUser = null;
      localStorage.removeItem("auth");
      localStorage.removeItem("user");
      await axiosClient.post("/logout");
    }
  }
});
