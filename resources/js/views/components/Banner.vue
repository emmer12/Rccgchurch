<template>
    <div class="banner">
        <div class="container-x">
            <div>
                <h1>{{ $props.title || "Banner" }}</h1>
            </div>

            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <router-link
                        :to="toUrl('/')"
                        class="inline-flex items-center text-sm font-medium text-gray-300 hover:text-gray-200 dark:text-gray-400 dark:hover:text-white"
                    >
                        <i class="fa fa-home mr-3"></i>
                        {{ trans("global.pages.home") }}
                    </router-link>
                </li>
                <li
                    v-for="(item, index) in $props.breadcrumbs"
                    :aria-current="
                        index < $props.breadcrumbs.length - 1 ? 'page' : ''
                    "
                    :key="index"
                >
                    <div class="flex items-center">
                        <i class="fa fa-angle-right"></i>
                        <!-- eslint-disable -->
                        <router-link
                            v-if="index < $props.breadcrumbs.length - 1"
                            :to="item.to"
                            class="ml-1 text-sm font-medium text-gray-300 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white"
                            v-html="item.name"
                        />
                        <!--eslint-enable-->
                        <span
                            v-else
                            class="ml-1 text-sm font-medium text-gray-200 md:ml-2 dark:text-gray-400"
                            v-text="item.name"
                        ></span>
                    </div>
                </li>
            </ol>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import { toUrl } from "@/helpers/routing";
import { trans } from "@/helpers/i18n";

export default defineComponent({
    props: {
        title: {
            type: String,
            default: "",
        },
        breadcrumbs: {
            type: Array,
            default: [],
        },
    },
    setup() {
        return {
            toUrl,
            trans,
        };
    },
});
</script>

<style lang="scss" scoped>
.banner {
    height: 220px;
    background: #161722;
    display: flex;
    /* justify-content: center; */
    align-items: center;
    color: #fff;
    font-weight: 700;
    font-size: 24px;
}
</style>
