<template>
    <Guest>
        <div>
            <Banner :title="page.title" :breadcrumbs="page.breadcrumbs" />

            <div class="container-x">
                <div v-if="imgs.length">
                    <div class="gallery">
                        <div
                            v-for="(src, index) in imgs"
                            :key="index"
                            class="pic"
                            @click="() => showImg(index)"
                        >
                            <img :src="src" />
                        </div>
                    </div>
                    <vue-easy-lightbox
                        :visible="visibleRef"
                        :imgs="imgs"
                        :index="indexRef"
                        @hide="onHide"
                    ></vue-easy-lightbox>
                </div>
                <div class="text-center py-5" v-else>
                    <template v-if="results.loading">
                        <Spinner :text-new-line="true"></Spinner>
                    </template>
                    <template v-else>
                        {{ trans("global.phrases.no_records") }}
                    </template>
                </div>
            </div>
        </div>
    </Guest>
</template>

<script>
import Guest from "@/views/layouts/Guest";
import { reactive, ref, onMounted, computed } from "vue";
import { prepareQuery } from "@/helpers/api";
import GalleryService from "@/services/GalleryService";
import Spinner from "@/views/components/icons/Spinner";
import { trans } from "@/helpers/i18n";

export default {
    components: {
        Guest,
        Spinner,
    },
    setup() {
        const page = reactive({
            title: "Gallery",
            breadcrumbs: [
                {
                    name: "Gallery",
                    active: true,
                },
            ],
        });
        const service = new GalleryService();

        const visibleRef = ref(false);
        const indexRef = ref(0);

        const results = reactive({
            loading: false,
            records: [],
            pagination: {
                meta: null,
                links: null,
            },
        });

        const imgs = computed(() => {
            return results.records.map((image) => image.display_url);
        });

        const mainQuery = reactive({
            page: 1,
            search: "",
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

        onMounted(() => {
            fetchPage(mainQuery);
        });

        const showImg = (index) => {
            indexRef.value = index;
            visibleRef.value = true;
        };
        const onHide = () => (visibleRef.value = false);

        return {
            page,
            visibleRef,
            indexRef,
            imgs,
            showImg,
            onHide,
            trans,
            results,
        };
    },
};
</script>

<style scoped lang="scss">
.gallery {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    margin: 50px 0px;

    .pic {
        border: 2px solid #fff;
        cursor: pointer;
        transition: 0.2s;
        img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        &:hover {
            border: 2px solid #6541e6;
        }
    }
}

@media (max-width: 640px) {
    .gallery {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>
