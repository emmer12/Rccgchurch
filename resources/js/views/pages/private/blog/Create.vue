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
                    name="content"
                    v-model="form.content"
                    :label="trans('Content')"
                />

                <FileInput
                    class="mb-4"
                    name="display"
                    v-model="form.display"
                    accept="image/*"
                    :label="trans('Preview Image')"
                    @click="form.display = ''"
                ></FileInput>

                <FileInput
                    class="mb-4"
                    name="audio"
                    v-model="form.audio"
                    :label="trans('Audio')"
                    @click="form.audio = ''"
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
import BlogService from "@/services/BlogService";
import { clearObject } from "@/helpers/data";
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
            title: "",
            content: "",
            display: null,
            audio: null,
        });

        const page = reactive({
            id: "create_blog",
            title: trans("Create Blog"),
            filters: false,
            breadcrumbs: [
                {
                    name: trans("Blog"),
                    to: toUrl("/blog/list"),
                },
                {
                    name: trans("Create Blog"),
                    active: true,
                },
            ],
            actions: [
                {
                    id: "back",
                    name: trans("global.buttons.back"),
                    icon: "fa fa-angle-left",
                    to: toUrl("/blog/list"),
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

        const service = new BlogService();

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
                router.push(toUrl("/blog/list"));
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
