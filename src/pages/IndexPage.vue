<template>
  <q-page class="flex flex-center">
    <img
      alt="Quasar logo"
      src="~assets/quasar-logo-vertical.svg"
      style="width: 200px; height: 200px"
    />
  </q-page>
</template>

<script setup>
import { onMounted } from "vue";
import { useMainStore } from "stores/store";

// main store
const mainStore = useMainStore();
defineOptions({
  name: "IndexPage",
});

onMounted(() => {
  mainStore.topName = "Dashboard";
});
</script>
