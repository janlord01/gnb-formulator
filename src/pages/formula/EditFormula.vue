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
          >Update Formula</q-toolbar-title
        >
      </q-toolbar>
      <q-form
        class="column q-pa-md shawdow full-width block"
        ref="formName"
        @submit="onSubmit"
      >
        <div class="row q-col-gutter-none relative-position">
          <div :class="$q.screen.gt.sm ? 'col q-mb-md' : 'full-width'">
            <q-input
              filled
              label="Formula Name*"
              name="code"
              class=""
              type="text"
              v-model="formulaData.name"
            >
              <template v-slot:prepend>
                <q-icon name="science" />
              </template>
            </q-input>
            <q-separator
              class="q-mt-lg"
              :class="$q.screen.gt.sm ? '' : 'q-mt-lg q-mb-md'"
            />
          </div>
        </div>
        <div
          class="row q-col-gutter-none relative-position"
          v-for="(item, index) in formulaData.items"
          :key="index"
        >
          <div
            :class="
              $q.screen.gt.sm ? 'col q-mb-md q-mr-sm' : 'full-width q-mb-xs'
            "
          >
            <q-input
              filled
              label="Raw Material Name*"
              name="code"
              type="text"
              v-model="item.name"
            >
              <template v-slot:prepend>
                <q-icon name="eva-file-text-outline" />
              </template>
            </q-input>
          </div>
          <div
            :class="
              $q.screen.gt.sm ? 'col-4 q-mb-md q-mr-sm' : 'full-width q-mb-xs'
            "
          >
            <q-input
              filled
              label="Raw Code Name*"
              name="code"
              type="text"
              v-model="item.code"
            >
              <template v-slot:prepend>
                <q-icon name="eva-code-outline" />
              </template>
            </q-input>
          </div>
          <div
            :class="$q.screen.gt.sm ? 'col-3 q-mb-md ' : 'full-width q-mb-xs'"
          >
            <q-input
              filled
              label="Percentage*"
              name="code"
              v-model="item.percentage"
            >
              <template v-slot:prepend>
                <q-icon name="eva-percent-outline" />
              </template>
            </q-input>
          </div>
          <div :class="$q.screen.gt.sm ? '' : 'full-width q-mb-sm q-mt-sm'">
            <q-separator />
          </div>
        </div>

        <div class="full-width q-mb-md">
          <q-btn
            unelevated
            label="Add Row"
            class="text-center"
            color="grey-7"
            size="md"
            @click="addRow"
          />
        </div>
        <q-separator class="q-mt-md q-mb-lg" />
        <div class="row align-center">
          <q-btn
            unelevated
            label="Create"
            class="text-center"
            :style="$q.screen.gt.md ? 'width: 25%' : 'width: 100%'"
            color="primary"
            size="md"
            type="submit"
          />
        </div>
      </q-form>

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
import formulaList from "components/formula/FormulaList.vue";
import { useFormulaData } from "stores/formula/storeFormula";

// main store
const mainStore = useMainStore();

// declare router
const router = useRouter();
const formulaData = useFormulaData();

const addRow = () => {
  formulaData.generateRow([{ name: "", code: "", percentage: "" }]);
};
const newToken = ref(LocalStorage.getItem("jwt"));
const $q = useQuasar();

const route = useRoute();

const searchFormula = ref("");
const onSearchSubmit = () => {};
const onLoadAllData = () => {};

const countBranch = ref(null);
const branches = ref(null);

const onSubmit = () => {
  $q.loading.show();
  api
    .post(
      `/api/formula`,
      {
        name: formulaData.name,
        ingredients: formulaData.items,
      },
      {
        headers: {
          Authorization: "Bearer " + newToken.value,
        },
      }
    )
    .then((response) => {
      console.log(response);
      if (response.data.status === 200) {
        setTimeout(() => {
          $q.notify({
            position: "bottom",
            type: "positive",
            timeout: 3000,
            message: response.data.message,
          });
          $q.loading.hide();

          router.go(-1);
        }, 500);
      } else {
        setTimeout(() => {
          $q.notify({
            position: "bottom",
            type: "negative",
            timeout: 3000,
            message: response.data.message,
          });
          $q.loading.hide();
        }, 3000);
      }
    })
    .catch((error) => {
      console.log(error);
      setTimeout(() => {
        $q.notify({
          position: "bottom",
          type: "negative",
          timeout: 3000,
          message: "Error, Something went wrong",
        });
        $q.loading.hide();
      }, 3000);
    });
};

onMounted(() => {
  mainStore.topName = "Update Formula";
  // getBranchUserCount();
  // codesStore.getAllBranches(route.params.slug);
  // mainStore.loc = "Branches";
});
</script>
<style>
.search_input {
  margin-top: 10px;
  margin-right: 10px;
}
</style>
