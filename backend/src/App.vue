<script setup>
import ability from "./services/ability";
import { onMounted } from "vue";
import { useAuthStore } from "./stores/auth";
import { storeToRefs } from "pinia";

const { authenticated, user } = storeToRefs(useAuthStore());
function loadAbilities() {
  if (!authenticated.value) return;
  const userAbilities = localStorage.getItem("user");
  if (userAbilities) {
    const parsedUser = JSON.parse(userAbilities);
    if (parsedUser.ability) {
      ability.update([{ action: parsedUser.ability, subject: "all" }]);
    }
    return parsedUser;
  }
}

onMounted(() => {
  loadAbilities();
  console.log(loadAbilities());

});
</script>

<template>
  <router-view></router-view>
</template>

<style>
</style>

