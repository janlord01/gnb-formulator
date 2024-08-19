import { defineStore } from "pinia";

export const useMainStore = defineStore("mainStore", {
  state: () => ({
    topName: "Product Formulator",
  }),
  getters: {
    doubleCount: (state) => state.counter * 2,
  },
  actions: {
    increment() {
      this.counter++;
    },
  },
});
