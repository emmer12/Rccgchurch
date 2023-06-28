<template>
    <Page
        :title="page.title"
        :breadcrumbs="page.breadcrumbs"
        :actions="page.actions"
        @action="onAction"
    >
        <Panel>
            <Form id="create-event" @submit.prevent="onSubmit">
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
                    type="text"
                    :required="true"
                    name="link"
                    v-model="form.link"
                    :label="trans('Link')"
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
import { defineComponent, reactive } from "vue";
import { trans } from "@/helpers/i18n";
import { useAuthStore } from "@/stores/auth";
import Button from "@/views/components/input/Button";
import TextInput from "@/views/components/input/TextInput";
import Dropdown from "@/views/components/input/Dropdown";
import Alert from "@/views/components/Alert";
import Panel from "@/views/components/Panel";
import Page from "@/views/layouts/Page";
import FileInput from "@/views/components/input/FileInput";
import SermonService from "@/services/SermonService";
import { clearObject, reduceProperties } from "@/helpers/data";
import { toUrl } from "@/helpers/routing";
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
        const form = reactive({
            title: "",
            description: "",
            link: "",
            display: "",
        });

        const page = reactive({
            id: "create_services",
            title: trans("Create Services"),
            filters: false,
            breadcrumbs: [
                {
                    name: trans("Sermons"),
                    to: toUrl("/sermons/list"),
                },
                {
                    name: trans("Create Sermons"),
                    active: true,
                },
            ],
            actions: [
                {
                    id: "back",
                    name: trans("global.buttons.back"),
                    icon: "fa fa-angle-left",
                    to: toUrl("/sermons/list"),
                    theme: "outline",
                },
                {
                    id: "submit",
                    name: trans("global.buttons.save"),
                    icon: "fa fa-save",
                    type: "submit",
                },
            ],
        });

        const service = new SermonService();

        function onAction(data) {
            switch (data.action.id) {
                case "submit":
                    onSubmit();
                    break;
            }
        }

        function onSubmit() {
            service.handleCreate("create-event", form).then(() => {
                clearObject(form);
            });
            return false;
        }

        return {
            trans,
            user,
            form,
            page,
            onSubmit,
            onAction,
        };
    },
});
</script>

<style scoped></style>
