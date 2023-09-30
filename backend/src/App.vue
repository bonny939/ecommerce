<script setup>
import ability from "./services/ability";
import { onMounted, computed } from "vue";
import authStore from "./store/auth";

const store = authStore;

// Function to load abilities
function loadAbilities() {
  const user = store.state.user;

  if (user) {
    ability.update([{ action: user.ability, subject: "all" }]);
  }
}

// Call loadAbilities when the component is mounted
onMounted(() => {
  // Check if the user is authenticated before loading abilities
  if (store.state.isAuthenticated) {
    loadAbilities();
  }
});
</script>

<template>
  <router-view></router-view>
</template>

<style>
</style>
