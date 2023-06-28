<template>
    <Page
        :title="page.title"
        :breadcrumbs="page.breadcrumbs"
        :actions="page.actions"
        @action="onPageAction"
    >
        <div class="gallery-con" v-if="table">
            <div
                class="gallery-item"
                v-for="data in table.records"
                :key="data.id"
            >
                <div class="trash" @click="onDelete(data.id)">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-trash"
                        viewBox="0 0 16 16"
                    >
                        <path
                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"
                        />
                        <path
                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"
                        />
                    </svg>
                </div>
                <img
                    v-if="data.display_url"
                    :src="data.display_url"
                    alt="Gallery Image"
                />
            </div>
        </div>
    </Page>
</template>

<script>
import { trans } from "@/helpers/i18n";
import GalleryService from "@/services/GalleryService";
import { watch, onMounted, defineComponent, reactive, ref } from "vue";
import { getResponseError, prepareQuery } from "@/helpers/api";
import { toUrl } from "@/helpers/routing";
import { useAlertStore } from "@/stores";
import alertHelpers from "@/helpers/alert";
import Page from "@/views/layouts/Page";
import Table from "@/views/components/Table";
import Avatar from "@/views/components/icons/Avatar";
import Filters from "@/views/components/filters/Filters";
import FiltersRow from "@/views/components/filters/FiltersRow";
import FiltersCol from "@/views/components/filters/FiltersCol";
import TextInput from "@/views/components/input/TextInput";
import Dropdown from "@/views/components/input/Dropdown";

export default defineComponent({
    components: {
        Dropdown,
        TextInput,
        FiltersCol,
        FiltersRow,
        Filters,
        Page,
        Table,
        Avatar,
    },
    setup() {
        const service = new GalleryService();
        const alertStore = useAlertStore();
        const mainQuery = reactive({
            page: 1,
            search: "",
        });

        const page = reactive({
            id: "list_gallery",
            title: trans("Gallery"),
            breadcrumbs: [
                {
                    name: trans("Gallery"),
                    to: toUrl("/gallery"),
                    active: true,
                },
            ],
            actions: [
                // {
                //     id: "filters",
                //     name: trans("global.buttons.filters"),
                //     icon: "fa fa-filter",
                //     theme: "outline",
                // },
                {
                    id: "new",
                    name: trans("global.buttons.add_new"),
                    icon: "fa fa-plus",
                    to: toUrl("/gallery/create"),
                },
            ],
            toggleFilters: false,
        });

        const table = reactive({
            pagination: {
                meta: null,
                links: null,
            },
            actions: {
                delete: {
                    id: "delete",
                    name: trans("global.actions.delete"),
                    icon: "fa fa-trash",
                    showName: false,
                    danger: true,
                },
            },
            loading: false,
            records: null,
        });

        function onTableSort(params) {
            mainQuery.sort = params;
        }

        function onTablePageChange(page) {
            mainQuery.page = page;
        }

        function onDelete(id) {
            alertHelpers.confirmDanger(function () {
                service.delete(id).then(function (response) {
                    fetchPage(mainQuery);
                });
            });
        }

        function onPageAction(params) {
            switch (params.action.id) {
                case "filters":
                    page.toggleFilters = !page.toggleFilters;
                    break;
            }
        }

        function onFiltersClear() {
            let clonedFilters = mainQuery.filters;
            for (let key in clonedFilters) {
                clonedFilters[key].value = "";
            }
            mainQuery.filters = clonedFilters;
        }

        function fetchPage(params) {
            table.records = [];
            table.loading = true;
            let query = prepareQuery(params);
            service
                .index(query)
                .then((response) => {
                    table.records = response.data.data;
                    table.pagination.meta = response.data.meta;
                    table.pagination.links = response.data.links;
                    table.loading = false;
                })
                .catch((error) => {
                    alertStore.error(getResponseError(error));
                    table.loading = false;
                });
        }

        watch(mainQuery, (newTableState) => {
            fetchPage(mainQuery);
        });

        onMounted(() => {
            fetchPage(mainQuery);
        });

        return {
            trans,
            page,
            table,
            onTablePageChange,
            onTableSort,
            onPageAction,
            onFiltersClear,
            mainQuery,
            onDelete,
        };
    },
});
</script>
<style lang="scss" scoped>
.gallery-con {
    display: grid;
    grid-template-columns: repeat(4, 1fr);

    .gallery-item {
        border-radius: 5px;
        height: 200px;
        width: 100%;
        position: relative;

        .trash {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #fff;
            box-shadow: 1px 0px 3px #dedde1;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;

            svg {
                fill: red;
            }
        }

        img {
            height: 100%;
            width: 100%;
            border-radius: 5px;
            background: #fff;
            object-fit: cover;
        }
    }
}
</style>
