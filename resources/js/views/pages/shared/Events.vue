<template>
    <Guest>
        <div>
            <Banner :title="page.title" :breadcrumbs="page.breadcrumbs" />
            <div class="container-x">
                <div class="contain">
                    <div class="header">
                        <h2>Upcoming Events</h2>
                    </div>

                    <div
                        class="body"
                        v-if="
                            results.records &&
                            results.records.length &&
                            !results.loading
                        "
                    >
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <EventCard
                                v-for="event in results.records"
                                :event="event"
                                :key="event.id"
                            />
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
            </div>
        </div>
    </Guest>
</template>

<script>
import EventCard from "@/views/components/EventCard.vue";
import EventService from "@/services/EventService";
import { reactive, onMounted } from "vue";
import Guest from "@/views/layouts/Guest";
import { trans } from "@/helpers/i18n";
import { prepareQuery } from "@/helpers/api";
import Spinner from "@/views/components/icons/Spinner";

export default {
    components: {
        EventCard,
        Spinner,
        Guest,
    },
    setup() {
        const service = new EventService();

        const mainQuery = reactive({
            page: 1,
            search: "",
        });

        const results = reactive({
            loading: false,
            records: [],
            pagination: {
                meta: null,
                links: null,
            },
        });

        function fetchPage(params) {
            results.records = [];
            results.loading = true;
            let query = prepareQuery(params);
            service
                .getAll(query)
                .then((response) => {
                    results.records = response.data.data;
                    results.pagination.meta = response.data.meta;
                    results.pagination.links = response.data.links;
                    results.loading = false;
                })
                .catch((error) => {
                    console.log(error);
                    // alertStore.error(getResponseError(error));
                    results.loading = false;
                });
        }

        const page = reactive({
            title: "Events",
            breadcrumbs: [
                {
                    name: "Events",
                    active: true,
                },
            ],
        });

        onMounted(() => {
            fetchPage(mainQuery);
        });

        return { page, results, trans };
    },
};
</script>

<style lang="scss" scoped>
.contain {
    margin: 50px 0px;
    .header {
        margin: 50px 0px;
    }
}
</style>
