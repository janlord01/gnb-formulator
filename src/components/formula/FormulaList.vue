<template>
  <q-table
    flat
    :pagination="pagination"
    :class="$q.dark.isActive ? 'text-white bg-blue-grey-10' : 'text-dark'"
    :rows="formulaStore.rowDatas"
    :columns="columns"
    :loading="formulaStore.loading"
    row-key="id"
    separator="horizontal"
    :visible-columns="
      $q.screen.gt.xs ? ['id', 'name', 'action'] : ['id', 'name', 'action']
    "
  >
    <template v-slot:loading>
      <q-inner-loading showing color="primary" />
    </template>
    <template v-slot:body="props">
      <q-tr :props="props">
        <q-td key="id" :props="props">
          {{ props.row.id }}
        </q-td>

        <q-td key="name" :props="props">
          {{ props.row.name }}
        </q-td>

        <q-td key="action" :props="props">
          <q-btn
            color="primary"
            :to="`/formula/${props.row.id}/edit`"
            icon="eva-edit-outline"
            size="sm"
          />
          <q-btn color="primary" icon="eva-printer-outline" size="sm" />
        </q-td>
      </q-tr>
    </template>
  </q-table>
  <!-- Edit Branch -->
  <!-- <q-dialog v-model="showEditDialog">
    <EditBranch
      :branch-id="branch_id"
      @hide-edit-dialog="showEditDialog = !showEditDialog"
    />
  </q-dialog>

  <q-dialog v-model="showAssignDialog">
    <assignBranch
      :branch-id="branch_id"
      @hide-assign-dialog="showAssignDialog = !showAssignDialog"
    />
  </q-dialog> -->

  <!-- Capture Image -->

  <!-- Edit Member -->
</template>

<script setup>
import { api } from "src/boot/axios";
import { useFormulaData } from "stores/formula/storeFormula";
import { LocalStorage } from "quasar";
import { ref, reactive, onMounted } from "vue";
import { useQuasar } from "quasar";
import { useRoute } from "vue-router";
// import { route } from "quasar/wrappers";

// import snapPicture from "./snapPicture.vue";

const route = useRoute();

const $q = useQuasar();

const formulaStore = useFormulaData();

const pagination = reactive({
  sortBy: "id",
  rowsPerPage: 10,
});
const columns = reactive([
  {
    name: "id",
    label: "ID",
    field: "id",
    align: "left",
    sortable: true,
    classes: "bg-grey-2",
  },
  {
    name: "name",
    label: "Formula Name",
    field: "name",
    align: "left",
    sortable: true,
  },
  {
    name: "action",
    label: "Action",
    field: "action",
    align: "left",
  },
]);
onMounted(() => {});
</script>

<style></style>
