<template>
    <a :href="event.link" target="_blank" class="e-card">
        <div class="display">
            <img :src="`storage/${event.display}`" alt="Display" />
        </div>
        <div class="details">
            <div class="flex gap-4">
                <div class="title">
                    <h4 class="text-lg font-semibold">{{ event.title }}</h4>
                </div>
            </div>
        </div>

        <div class="link">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-box-arrow-up-right"
                viewBox="0 0 16 16"
            >
                <path
                    fill-rule="evenodd"
                    d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"
                />
                <path
                    fill-rule="evenodd"
                    d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"
                />
            </svg>
        </div>
    </a>
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
    background: #fff;
    cursor: pointer;
    transition: 0.3s;
    display: flex;
    border-radius: 20px;
    overflow: hidden;
    position: relative;
    align-items: center;
    &:hover {
        .display {
        }
    }

    .link {
        position: absolute;
        top: 20px;
        right: 20px;
    }

    .display {
        border-radius: 20px;
        height: 120px;
        width: 120px;
        transition: 0.3s;
        flex-shrink: 0;
        img {
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
                font-size: 18px;
            }

            b {
                white-space: nowrap;
            }
        }
    }
}
</style>
