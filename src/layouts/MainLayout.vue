<template>
  <q-layout view="lhh Lpr lFf">
    <q-header class="text-dark bg-white">
      <q-toolbar>
        <!-- <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="toggleLeftDrawer"
        /> -->

        <q-toolbar-title> {{ mainStore.topName }}</q-toolbar-title>

        <div>
          <q-btn
            size="md"
            icon-right="eva-log-out"
            color="primary"
            no-caps
            dense
            flat
          />
        </div>
      </q-toolbar>
    </q-header>

    <q-footer
      class="text-dark"
      :class="
        $q.dark.isActive ? 'text-white bg-blue-grey-10 ' : 'text-dark bg-grey-2'
      "
    >
      <q-toolbar v-if="$q.screen.width > 1008">
        <q-toolbar-title style="font-size: 14px"
          >Product Formulator &copy; Copyright 2024. Created By: Janlord Luga
        </q-toolbar-title>
      </q-toolbar>
      <q-tabs
        v-else
        dense
        no-caps
        active-color="white"
        indicator-color="white"
        class="bg-primary text-white text-sm q-pt-sm text-caption text-weight-thin menu_size"
        active-class="active_link_mobile"
        v-model="tab"
      >
        <q-route-tab
          name="home"
          ripple
          :to="`/dashboard`"
          icon="eva-home-outline"
          label="Home"
        />
        <!-- <q-route-tab
          name="products"
          :to="`/${computedSlug}/products`"
          ripple
          icon="o_fastfood"
          label="Products"
        /> -->

        <q-route-tab
          name="raw"
          ripple
          :to="`/raw-materials`"
          icon="eva-list-outline"
          label="Raw Materials"
        />
        <q-route-tab
          name="formula"
          ripple
          :to="`/formula`"
          icon="o_ballot"
          label="Formula"
        />
        <q-route-tab
          name="Menu"
          ripple
          icon="menu"
          label="Menu"
          @click="toggleLeftDrawer"
        />
      </q-tabs>
    </q-footer>

    <q-drawer
      class="sidebar"
      :width="250"
      :mini="miniState"
      @mouseover="$q.screen.gt.sm ? (miniState = false) : ''"
      @mouseout="$q.screen.gt.sm ? (miniState = true) : ''"
      bordered
      v-model="leftDrawerOpen"
      :breakpoint="960"
      show-if-above
      :class="
        $q.dark.isActive ? 'text-white bg-blue-grey-10 ' : 'text-dark bg-grey-2'
      "
    >
      <q-list>
        <!-- <q-item-label header> Logo Here </q-item-label> -->
        <div class="q-pa-md">
          <q-img
            src="/images/formulator-logo.png"
            :width="!miniState ? '100px' : '30px'"
            class="block q-mx-auto"
          />
        </div>
        <div class="q-mt-sm">
          <EssentialLink
            v-for="link in linksList"
            :key="link.title"
            v-bind="link"
          />
        </div>
      </q-list>
    </q-drawer>

    <q-page-container class="">
      <div :class="$q.screen.gt.xs ? 'q-pa-lg' : 'q-pa-sm'">
        <router-view />
      </div>
    </q-page-container>
  </q-layout>
</template>

<script setup>
import { ref } from "vue";
import EssentialLink from "components/EssentialLink.vue";
import { useMainStore } from "stores/store";
import { useQuasar } from "quasar";

// access quasar functions
const $q = useQuasar();

// main store
const mainStore = useMainStore();

const miniState = ref(false);
defineOptions({
  name: "MainLayout",
});

const linksList = [
  {
    title: "Dashboard",
    icon: "eva-home-outline",
    link: "/",
  },
  {
    title: "Users",
    icon: "eva-person-outline",
    link: "/users",
  },
  {
    title: "Raw Materials",
    icon: "eva-list-outline",
    link: "/raw-materials",
  },
  {
    title: "Formula",
    icon: "o_ballot",
    link: "/formula",
  },
  {
    title: "Print logs",
    icon: "o_history",
    link: "/print-logs",
  },
  {
    title: "Settings",
    icon: "eva-settings-outline",
    link: "/settings",
  },
];

const leftDrawerOpen = ref(false);

function toggleLeftDrawer() {
  leftDrawerOpen.value = !leftDrawerOpen.value;
}
</script>
