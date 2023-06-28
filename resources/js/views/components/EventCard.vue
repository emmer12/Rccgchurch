<template>
    <router-link
        :to="{ name: 'events-details', params: { slug: event.slug } }"
        class="e-card"
    >
        <div class="display">
            <img :src="`storage/${event.display}`" alt="Display" />
        </div>
        <div class="details">
            <div class="flex gap-4">
                <div class="date text-center">
                    <span>{{ moment(event.datetime).format("MMM") }}</span>
                    <h3>{{ moment(event.datetime).format("DD") }}</h3>
                    <b class="text-gray-600">
                        {{ moment(event.datetime).format("hh:mm a") }}</b
                    >
                </div>
                <div class="title">
                    <h4 class="text-xl font-semibold">{{ event.title }}</h4>
                    <div class="flex gap-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="#6541e6"
                            class="w-5 h-5 shrink-0"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                            />
                        </svg>

                        <p class="text-gray-600">
                            {{ event.location }}
                        </p>
                    </div>
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
.e-card {
    border-radius: 20px;
    background: #fff;
    box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 12px;
    cursor: pointer;
    transition: 0.3s;
    &:hover {
        box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 20px;
        .display {
            transform: translateY(-10px);
        }
    }

    .display {
        height: 200px;
        transition: 0.3s;
        width: 100%;
        img {
            border-radius: 20px 20px 0px 0px;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }

    .details {
        margin: 10px 0px;
        padding: 20px;

        .date {
            margin-right: 15px;
            span {
                text-transform: uppercase;
                color: #6541e6;
                font-size: 16px;
                font-weight: 700;
            }

            h3 {
                font-weight: 700;
                font-size: 24px;
            }

            b {
                white-space: nowrap;
            }
        }
    }
}
</style>
