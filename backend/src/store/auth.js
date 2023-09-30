
import { createStore } from "vuex";

const authStore = createStore({
  state: {
    user: null,
    isAuthenticated: false,
  },
  mutations: {
    setUser(state, user) {
      state.user = user;
      state.isAuthenticated = Boolean(user);
    },
    clearUser(state) {
      state.user = null;
      state.isAuthenticated = false;
    },
  },
  actions: {
    login({ commit }, user) {
      // Perform your login logic here, and once authenticated, commit the user to the state
      commit("setUser", user);
    },
    logout({ commit }) {
      // Perform your logout logic here, and then clear the user from the state
      commit("clearUser");
    },
  },
  getters: {
    // Add any getters you may need
  },
});

export default authStore;
