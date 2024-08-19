import { defineStore } from "pinia";
import { api } from "src/boot/axios";
import { useQuasar, Notify, Loading, LocalStorage } from "quasar";

export const useFormulaData = defineStore("formulaStore", {
  state: () => ({
    rowDatas: [],
    tempRowDatas: [],
    loading: true,
    name: "",
    items: [
      {
        name: "",
        code: "",
        percentage: "",
      },
    ],
  }),
  getters: {},
  actions: {
    generateRow(payload) {
      Object.entries(payload).map(([kay, val]) => {
        this.items.push(val);
      });
    },
    async getAllFormulas() {
      this.loading = true;
      this.rowDatas = [];
      this.tempRowDatas = [];
      var newToken = LocalStorage.getItem("jwt");
      await api
        .get(`api/formula`, {
          headers: {
            Authorization: "Bearer " + newToken,
          },
        })
        .then((response) => {
          console.log(response);
          if (response.status === 200) {
            setTimeout(() => {
              Object.entries(response.data.data).map(([key, val]) => {
                this.tempRowDatas.push(val);
              });
              this.rowDatas = this.tempRowDatas;

              this.loading = false;
            }, 500);
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    async getFormula(payload) {
      this.loading = true;
      this.rowDatas = [];
      this.tempRowDatas = [];
      var newToken = LocalStorage.getItem("jwt");
      await api
        .get(`api/formula/${payload}/edit`, {
          headers: {
            Authorization: "Bearer " + newToken,
          },
        })
        .then((response) => {
          console.log(response);
          if (response.status === 200) {
            setTimeout(() => {
              Object.entries(response.data.data).map(([key, val]) => {
                this.tempRowDatas.push(val);
              });
              this.rowDatas = this.tempRowDatas;

              this.loading = false;
            }, 500);
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
});
