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
                            {{ results.record.content }}
                        </p>
                    </div>

                    <div class="2 my-2">
                        <audio :src="results.record.audio_url" controls></audio>
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
import BlogService from "@/services/BlogService";
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
        const service = new BlogService();

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
