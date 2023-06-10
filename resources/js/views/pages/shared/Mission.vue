<template>
    <Guest>
        <Banner :title="page.title" :breadcrumbs="page.breadcrumbs" />
        <div class="container-x">
            <div class="flex">
                <div class="py-10 w-full sm:w-1/2">
                    <div class="header">
                        <h2>Our Mission & Vision</h2>
                    </div>
                    <div class="py-3">
                        <div
                            class="elementor-heading-title elementor-size-default"
                        >
                            <p
                                style="
                                    box-sizing: inherit;
                                    color: rgb(68, 68, 68);
                                    font-family: Roboto, sans-serif;
                                    font-size: 16px;
                                    white-space: normal;
                                "
                            >
                                1) To make heaven.
                            </p>
                            <p
                                style="
                                    box-sizing: inherit;
                                    color: rgb(68, 68, 68);
                                    font-family: Roboto, sans-serif;
                                    font-size: 16px;
                                    white-space: normal;
                                "
                            >
                                2) To take as many people with us.
                            </p>
                            <p
                                style="
                                    box-sizing: inherit;
                                    color: rgb(68, 68, 68);
                                    font-family: Roboto, sans-serif;
                                    font-size: 16px;
                                    white-space: normal;
                                "
                            >
                                3) To have a member of RCCG in every family of
                                all nations.
                            </p>
                            <p
                                style="
                                    box-sizing: inherit;
                                    color: rgb(68, 68, 68);
                                    font-family: Roboto, sans-serif;
                                    font-size: 16px;
                                    white-space: normal;
                                "
                            >
                                4) To accomplish No. 1 above, holiness will be
                                our lifestyle.
                            </p>
                            <p
                                style="
                                    box-sizing: inherit;
                                    color: rgb(68, 68, 68);
                                    font-family: Roboto, sans-serif;
                                    font-size: 16px;
                                    white-space: normal;
                                "
                            >
                                5) To accomplish No. 2 and 3 above, we will
                                plant churches within five minutes walking
                                distance in every city and town of developing
                                countries and within five minutes driving
                                distance in every city and town of developed
                                countries.
                            </p>
                            <p
                                style="
                                    box-sizing: inherit;
                                    color: rgb(68, 68, 68);
                                    font-family: Roboto, sans-serif;
                                    font-size: 16px;
                                    white-space: normal;
                                "
                            >
                                6) We will pursue these objectives until every
                                Nation in the world is reached for the Lord
                                Jesus Christ
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Guest>
</template>

<script>
import Guest from "@/views/layouts/Guest";
import { reactive } from "vue";

export default {
    components: {
        Guest,
    },
    setup() {
        const page = reactive({
            title: "History",
            breadcrumbs: [
                {
                    name: "Mission & Vision",
                    active: true,
                },
            ],
        });

        return { page };
    },
};
</script>

<style></style>
