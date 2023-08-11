<template>
    <router-link
        :to="{ name: 'pc-details', params: { slug: event.slug } }"
        class="c-card"
    >
        <div class="display">
            <img :src="`storage/${event.display}`" alt="Display" />
        </div>
        <div class="details">
            <div class="">
                <div class="title1">
                    <h4 class="text-xl font-semibold">{{ event.title }}</h4>
                </div>

                <div class="my-2 action">
                    <router-link
                        class="text-theme-600"
                        :to="{
                            name: 'pc-details',
                            params: { slug: event.slug },
                        }"
                    >
                        Read More
                        <i class="fa fa-arrow-right"></i>
                    </router-link>
                </div>
            </div>
        </div>
    </router-link>
</template>

<script>
import { defineComponent } from "vue";
import { toUrl } from "@/helpers/routing";
import { trans } from "@/helpers/i18n";
import moment from "moment";

export default defineComponent({
    props: {
        event: {
            type: Object,
        },
    },
    setup() {
        return {
            toUrl,
            trans,
            moment,
        };
    },
});
</script>

<style lang="scss" scoped>
.c-card {
    background: #fff;
    box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 12px;
    cursor: pointer;
    transition: 0.3s;
    .details .action {
        transition: 0.3s;
    }
    &:hover {
        box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 20px;
        .display {
            transform: translateY(-10px);
        }

        .details .action {
            transform: translateX(10px);
        }
    }

    .display {
        height: 200px;
        transition: 0.3s;
        width: 100%;
        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }

    .details {
        margin: 10px 0px;
        padding: 20px;
    }
}
</style>
