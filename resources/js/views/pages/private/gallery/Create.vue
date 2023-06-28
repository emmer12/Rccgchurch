<template>
    <Page
        :title="page.title"
        :breadcrumbs="page.breadcrumbs"
        :actions="page.actions"
        @action="onAction"
    >
        <Panel>
            <Form id="create-event" @submit.prevent="onSubmit">
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
import GalleryService from "@/services/GalleryService";
import { clearObject, reduceProperties } from "@/helpers/data";
import { toUrl } from "@/helpers/routing";
import Form from "@/views/components/Form";
import { useRouter } from "vue-router";

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
        const router = useRouter();
        const form = reactive({
            display: "",
        });

        const page = reactive({
            id: "create_events",
            title: trans("Create Gallery"),
            filters: false,
            breadcrumbs: [
                {
                    name: trans("Gallery"),
                    to: toUrl("/gallery/list"),
                },
                {
                    name: trans("Create Gallery"),
                    active: true,
                },
            ],
            actions: [
                {
                    id: "back",
                    name: trans("global.buttons.back"),
                    icon: "fa fa-angle-left",
                    to: toUrl("/gallery/list"),
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

        const service = new GalleryService();

        function onAction(data) {
            switch (data.action.id) {
                case "submit":
                    onSubmit();
                    break;
            }
        }

        function onSubmit() {
            service.handleCreate("create-gallery", form).then(() => {
                clearObject(form);
            });
            router.push({ name: "gallery.list" });
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
