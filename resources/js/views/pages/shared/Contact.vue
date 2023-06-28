<template>
    <div>
        <Banner :title="page.title" :breadcrumbs="page.breadcrumbs" />

        <div class="container-x">
            <div class="my-4">
                <h2>WORSHIP WITH US @</h2>
                <div>
                    <b>Email:</b>
                    <p>admin@rccginspirationhouse.co.uk</p>
                </div>
                <div>
                    <b>Telephone:</b>
                    <p>034 3225 23</p>
                </div>
                4
            </div>
        </div>
    </div>
</template>

<script>
import { reactive } from "vue";
export default {
    setup() {
        const page = reactive({
            title: "Contact Us",
            breadcrumbs: [
                {
                    name: "Contact Us",
                    active: true,
                },
            ],
        });

        return { page };
    },
};
</script>

<style></style>
