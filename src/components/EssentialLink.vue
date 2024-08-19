<template>
  <q-item clickable tag="a" class="q-pl-lg q-pr-lg" :to="props.link">
    <q-item-section v-if="props.icon" avatar>
      <q-icon :name="props.icon" />
    </q-item-section>

    <q-item-section>
      <q-item-label style="margin-left: -20px">{{ props.title }}</q-item-label>
      <!-- <q-item-label caption>{{ props.caption }}</q-item-label> -->
    </q-item-section>
  </q-item>
</template>

<script setup>
defineOptions({
  name: "EssentialLink",
});

const props = defineProps({
  title: {
    type: String,
    required: true,
  },

  caption: {
    type: String,
    default: "",
  },

  link: {
    type: String,
    default: "#",
  },

  icon: {
    type: String,
    default: "",
  },
});
</script>

<style scoped lang="css">
.q-router-link--active {
  background: #9f51b927;
  border-right: solid 10px #9f51b9;
  color: #9f51b9;
}
</style>
