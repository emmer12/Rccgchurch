<template>
    <Page
        :title="page.title"
        :breadcrumbs="page.breadcrumbs"
        :actions="page.actions"
        @action="onAction"
        :is-loading="page.loading"
    >
        <Panel>
            <Form id="edit-user" @submit.prevent="onSubmit">
                <TextInput
                    class="mb-4"
                    type="text"
                    :required="true"
                    name="title"
                    v-model="form.title"
                    :label="trans('Title')"
                />
                <TextInput
                    class="mb-4"
                    type="textarea"
                    :required="true"
                    name="description"
                    v-model="form.description"
                    :label="trans('Description')"
                />
                <TextInput
                    class="mb-4"
                    type="datetime-local"
                    name="date"
                    v-model="form.datetime"
                    :required="true"
                    :label="trans('Date')"
                />
                <TextInput
                    class="mb-4"
                    type="location"
                    :required="true"
                    name="location"
                    v-model="form.location"
                    :label="trans('Location')"
                />

                <FileInput
                    class="mb-4"
                    name="display"
                    v-model="form.display"
                    accept="image/*"
                    :label="trans('Preview Image')"
                    @click="form.display = ''"
                ></FileInput>
            </Form>
        </Panel>
    </Page>
</template>

<script>
import { defineComponent, onBeforeMount, reactive, ref } from "vue";
import { trans } from "@/helpers/i18n";
import { fillObject, reduceProperties } from "@/helpers/data";
import { useRoute } from "vue-router";
import { useAuthStore } from "@/stores/auth";
import { toUrl } from "@/helpers/routing";
import EventService from "@/services/EventService";
import Button from "@/views/components/input/Button";
import TextInput from "@/views/components/input/TextInput";
import Dropdown from "@/views/components/input/Dropdown";
import Alert from "@/views/components/Alert";
import Panel from "@/views/components/Panel";
import Page from "@/views/layouts/Page";
import FileInput from "@/views/components/input/FileInput";
import Form from "@/views/components/Form";

export default defineComponent({
    components: {
        Form,
        FileInput,
        Panel,
        Alert,
        Dropdown,
        TextInput,
        Button,
        Page,
    },
    setup() {
        const { user } = useAuthStore();
        const route = useRoute();
        const form = reactive({
            title: "",
            description: "",
            datetime: "",
            location: "",
            display: "",
        });

        const page = reactive({
            id: "edit_event",
            title: trans("Events Edit"),
            filters: false,
            loading: true,
            breadcrumbs: [
                {
                    name: trans("Events"),
                    to: toUrl("/events/list"),
                },
                {
                    name: trans("Edit Events"),
                    active: true,
                },
            ],
            actions: [
                {
                    id: "back",
                    name: trans("global.buttons.back"),
                    icon: "fa fa-angle-left",
                    to: toUrl("/events/list"),
                    theme: "outline",
                },
                {
                    id: "submit",
                    name: trans("global.buttons.update"),
                    icon: "fa fa-save",
                    type: "submit",
                },
            ],
        });

        const service = new EventService();

        onBeforeMount(() => {
            service.edit(route.params.id).then((response) => {
                fillObject(form, response.data.model);
                page.loading = false;
            });
        });

        function onAction(data) {
            switch (data.action.id) {
                case "submit":
                    onSubmit();
                    break;
            }
        }

        function onSubmit() {
            service.handleUpdate("edit-event", route.params.id, form);
            return false;
        }

        return {
            trans,
            user,
            form,
            onSubmit,
            onAction,
            page,
        };
    },
});
</script>

<style scoped></style>
