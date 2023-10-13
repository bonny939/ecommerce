<script setup>
import ability from "./services/ability";
import { onMounted } from "vue";
import { useAuthStore } from "./stores/auth";
import { storeToRefs } from "pinia";

const { authenticated, user } = storeToRefs(useAuthStore());
function loadAbilities() {
  if (!authenticated.value) return;
  ability.update([{ action: user.ability, subject: "all" }]);
}


onMounted(() => {
  loadAbilities();
});
</script>

<template>
  <router-view></router-view>
</template>

<style>
</style>

