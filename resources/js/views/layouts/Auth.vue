<template>
    <main class="flex items-center justify-center min-h-screen">
        <div
            class="bg-theme-50 flex rounded-2xl shadow-lg items-center w-[380px]"
        >
            <div class="w-full md:w-full px-4 md:px-8 py-8">
                <slot></slot>
            </div>
        </div>
    </main>
</template>

<script>
import { defineComponent } from "vue";
import { trans } from "@/helpers/i18n";

export default defineComponent({
    name: "Auth",
    setup() {
        let AppConfig = window.AppConfig;

        return {
            trans,
            AppConfig,
        };
    },
});
</script>
