import { createApp } from "vue";
import { createPinia } from "pinia";

import router from "@/router";
import i18n from "@/plugins/i18n";
import App from "@/App";
import Button from "@/views/components/input/Button";
import Logo from "@/views/components/Logo";
import Banner from "@/views/components/Banner";

const app = createApp(App);

app.component("Button", Button);
app.component("Logo", Logo);
app.component("Banner", Banner);

app.use(createPinia());

app.use(router);
app.use(i18n);

app.mount("#app");
