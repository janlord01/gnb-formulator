<template>
  <q-page class="">
    <div
      :class="
        $q.dark.isActive
          ? 'shadow-1 q-pa-md rounded-borders text-white bg-dark q-pa-lg'
          : 'shadow-1 q-pa-md rounded-borders text-dark bg-white q-pa-lg'
      "
      style="border-radius: 20px"
    >
      <q-toolbar class="q-mt-sm">
        <q-toolbar-title
          class="text-h6"
          :class="$q.screen.gt.sm ? '' : 'invisible'"
          >Raw Materials</q-toolbar-title
        >

        <q-input
          bottom-slots
          v-model="searchFormula"
          @keyup="onSearchSubmit"
          label="Search Raw Material"
          outlined
          class="search_input"
          :style="!$q.screen.gt.sm ? 'display:none' : ''"
        >
          <template v-slot:append>
            <q-icon
              v-if="searchFormula !== ''"
              name="close"
              class="cursor-pointer"
            />
            <q-icon name="search" size="sm" />
          </template>
        </q-input>
        <q-btn
          icon="add_circle"
          color="primary"
          size="sm"
          style="padding-top: 15px; padding-bottom: 15px; margin-bottom: 15px"
          :label="$q.screen.gt.xs ? 'Add Raw Material' : 'Create'"
          :to="'/formula/create'"
        />
      </q-toolbar>
      <rawMatsList />

      <!-- <q-dialog v-model="showCreateDialog">
        <createBranch
          @hide-create-dialog="showCreateDialog = !showCreateDialog"
          @create-branch="getBranchUserCount"
        />
      </q-dialog> -->
    </div>
  </q-page>
</template>

<script setup>
import { ref, reactive, onMounted, onBeforeMount } from "vue";
import { LocalStorage, useQuasar } from "quasar";
import { api } from "src/boot/axios";
import { useRoute, useRouter } from "vue-router";
import { useMainStore } from "stores/store";
import { useFormulaData } from "src/stores/formula/storeFormula";
import rawMatsList from "components/ingredients/ListRawMats.vue";

// main store
const mainStore = useMainStore();
// formula store
const formulaStore = useFormulaData();

// declare router
const router = useRouter();

const $q = useQuasar();

const route = useRoute();

const searchFormula = ref("");
const onSearchSubmit = () => {};
const onLoadAllData = () => {};

const countBranch = ref(null);
const branches = ref(null);

const showCreateDialog = ref(false);
const showImportDialog = ref(false);

const createDialog = () => {
  showCreateDialog.value = true;
};
const ImportDialog = () => {
  showImportDialog.value = true;
};
onMounted(() => {
  mainStore.topName = "Raw Materials";
  formulaStore.getAllFormulas();
});
</script>
<style></style>
