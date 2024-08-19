<template>
  <div>
    <q-layout view="lHh Lpr lFf" class="shadow-2 rounded-borders">
      <q-page-container>
        <router-view />
      </q-page-container>
    </q-layout>
  </div>
</template>

<script>
import { ref } from "vue";

import { LocalStorage, useQuasar } from "quasar";

const $q = useQuasar();
const menuList = [
  {
    icon: "key",
    label: "Login",
    to: "/login",
    separator: false,
  },
  {
    icon: "save_as",
    label: "Register",
    to: "/register",
    separator: false,
  },
];

export default {
  setup() {
    const $q = useQuasar();
    // const splitterModel = ref(50);
    return {
      drawer: ref(false),
      menuList,
      splitterModel: ref(50),
    };
  },
};
</script>
<style scoped></style>
