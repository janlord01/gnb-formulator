<template>
  <q-card style="max-width: 400px; width: 800px">
    <!-- <q-linear-progress :value="onProgressBar" color="green" size="md" /> -->
    <q-toolbar class="bg-primary text-white">
      <q-toolbar-title> Create Raw Material </q-toolbar-title>
      <q-btn flat icon="close" round v-close-popup></q-btn>
    </q-toolbar>
    <q-card-section>
      <q-form
        class="q-pa-md shawdow full-width block"
        ref="formName"
        @submit="onSubmit"
      >
        <div class="row q-col-gutter-none relative-position">
          <div class="full-width q-mb-md">
            <q-input filled label="Name" type="text" v-model="formData.name">
              <template v-slot:prepend>
                <q-icon name="local_phone" />
              </template>
            </q-input>
          </div>
          <div class="full-width q-mb-md">
            <q-input filled label="Code" type="text" v-model="formData.code">
              <template v-slot:prepend>
                <q-icon name="local_phone" />
              </template>
            </q-input>
          </div>
        </div>

        <div class="row align-center">
          <q-btn
            unelevated
            label="Create"
            class="text-center full-width"
            color="primary"
            size="md"
            type="submit"
          />
        </div>
      </q-form>
    </q-card-section>
  </q-card>
</template>
<script setup>
import { ref, reactive, onMounted, onBeforeMount } from "vue";
import { useQuasar } from "quasar";
import { api } from "src/boot/axios";
import { LocalStorage } from "quasar";
import { useRoute, useRouter } from "vue-router";

const emit = defineEmits(["hideCreateDialog"]);
const route = useRoute();
const $q = useQuasar();

onMounted(() => {});

const formData = reactive({
  name: null,
  code: null,
});
</script>
