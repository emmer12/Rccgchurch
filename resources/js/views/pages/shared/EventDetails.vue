<template>
    <Guest>
        <div class="container-x">
            <div class="contain" v-if="results.record && !results.loading">
                <div class="title">
                    <h2>{{ results.record.title }}</h2>
                </div>
                <div class="display">
                    <img :src="results.record.display_url" alt="Display" />
                </div>

                <div class="details">
                    <div class="my-3">
                        <p>
                            {{ results.record.description }}
                        </p>
                    </div>
                    <div class="flex gap-2 my-3">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="#6541e6"
                            class="w-5 h-5 shrink-0"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                            />
                        </svg>

                        <p class="text-gray-600">
                            {{ results.record.location }}
                        </p>
                    </div>

                    <div class="flex gap-2 my-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="#6541e6"
                            class="w-5 h-5 shrink-0"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"
                            />
                        </svg>

                        <div>
                            {{ moment(results.record.datetime).format("LLL") }}
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <template v-if="results.loading">
                    <Spinner :text-new-line="true"></Spinner>
                </template>
                <template v-else>
                    {{ trans("global.phrases.no_records") }}
                </template>
            </div>
        </div>
    </Guest>
</template>

<script>
import { trans } from "@/helpers/i18n";
import { reactive, onMounted } from "vue";
import { prepareQuery } from "@/helpers/api";
import Guest from "@/views/layouts/Guest";
import EventService from "@/services/EventService";
import moment from "moment";
import { useRoute } from "vue-router";

export default {
    components: {
        Guest,
    },
    setup() {
        const route = useRoute();
        const page = reactive({
            title: "Events",
            breadcrumbs: [
                {
                    name: "Events",
                    active: true,
                },
            ],
        });
        const service = new EventService();

        const results = reactive({
            loading: false,
            record: null,
        });

        function fetchPage() {
            const slug = route.params.slug;
            results.record = null;
            results.loading = true;
            service
                .getBySlug(slug)
                .then((response) => {
                    results.record = response.data.model;
                    results.loading = false;
                })
                .catch((error) => {
                    console.log(error);
                    results.loading = false;
                });
        }

        onMounted(() => {
            fetchPage();
        });

        return { page, results, trans, moment };
    },
};
</script>

<style lang="scss" scoped>
.contain {
    margin: 50px auto;
    width: 600px;
    max-width: 100%;

    .title {
        margin: 10px 0px;
        h2 {
            font-size: 32px;
            font-weight: 700;
        }
    }
}
</style>
