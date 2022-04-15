import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/inertia-vue3'
import {SnackbarService, Vue3Snackbar} from "vue3-snackbar";
import "vue3-snackbar/dist/style.css";
import store from "./store";

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({el, App, props, plugin}) {
    createApp({render: () => h(App, props)})
      .use(plugin)
      .use(store)
      .use(SnackbarService)
      .mount(el)
  },
})