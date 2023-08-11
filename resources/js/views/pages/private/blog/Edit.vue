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
                    name="content"
                    v-model="form.content"
                    :label="trans('content')"
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
                    accept="image/*"
                    :label="trans('Audio')"
                    @click="form.audio = ''"
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
import BlogService from "@/services/BlogService";
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
            content: "",
            audio: "",
            display: "",
        });

        const page = reactive({
            id: "edit_event",
            title: trans("Blog Edit"),
            filters: false,
            loading: true,
            breadcrumbs: [
                {
                    name: trans("Blog"),
                    to: toUrl("/blog/list"),
                },
                {
                    name: trans("Edit Blog"),
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
                    name: trans("global.buttons.update"),
                    icon: "fa fa-save",
                    type: "submit",
                },
            ],
        });

        const service = new BlogService();

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
            service.handleUpdate("edit-blog", route.params.id, form);
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
