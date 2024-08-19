const routes = [
  {
    path: "/",
    component: () => import("layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("pages/IndexPage.vue") }],
  },

  {
    path: "/",
    redirect: "/login",
    component: () => import("layouts/AuthLayout.vue"),
    name: "login",
    meta: {
      requiredAuth: false,
    },
    children: [
      {
        path: "/login",
        component: () => import("pages/auth/LoginPage.vue"),
        name: "login",
      },
      // {
      //   path: "/register",
      //   component: () => import("pages/auth/RegisterPage.vue"),
      //   name: "register",
      // },
    ],
  },

  {
    path: "/",
    component: () => import("layouts/MainLayout.vue"),
    name: "formula",
    meta: {
      requiredAuth: false,
    },
    children: [
      {
        path: "/formula",
        component: () => import("pages/formula/FormulaIndex.vue"),
        name: "formula-index",
      },
      {
        path: "/formula/create",
        component: () => import("pages/formula/CreateFormula.vue"),
        name: "formula-create",
      },
      {
        path: "/formula/:id/edit",
        component: () => import("pages/formula/EditFormula.vue"),
        name: "formula-edit",
      },
    ],
  },
  {
    path: "/",
    component: () => import("layouts/MainLayout.vue"),
    name: "raw-material",
    meta: {
      requiredAuth: false,
    },
    children: [
      {
        path: "/raw-materials",
        component: () => import("pages/ingredients/IngredientIndexPage.vue"),
        name: "rawmats-index",
      },
      // {
      //   path: "/formula/create",
      //   component: () => import("pages/formula/CreateFormula.vue"),
      //   name: "formula-create",
      // },
      // {
      //   path: "/formula/:id/edit",
      //   component: () => import("pages/formula/EditFormula.vue"),
      //   name: "formula-edit",
      // },
    ],
  },
  // Always leave this as last one,
  // but you can also remove it
  {
    path: "/:catchAll(.*)*",
    component: () => import("pages/ErrorNotFound.vue"),
  },
];

export default routes;
