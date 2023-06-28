<template>
    <Guest>
        <div>
            <Banner :title="page.title" :breadcrumbs="page.breadcrumbs" />

            <div class="container-x">
                <div class="gallery">
                    <div
                        v-for="(src, index) in imgs"
                        :key="index"
                        class="pic"
                        @click="() => showImg(index)"
                    >
                        <img :src="src" />
                    </div>
                </div>
                <vue-easy-lightbox
                    :visible="visibleRef"
                    :imgs="imgs"
                    :index="indexRef"
                    @hide="onHide"
                ></vue-easy-lightbox>
            </div>
        </div>
    </Guest>
</template>

<script>
import Guest from "@/views/layouts/Guest";
import { reactive, ref } from "vue";
export default {
    components: {
        Guest,
    },
    setup() {
        const page = reactive({
            title: "Gallery",
            breadcrumbs: [
                {
                    name: "Gallery",
                    active: true,
                },
            ],
        });
        const visibleRef = ref(false);
        const indexRef = ref(0);
        const imgs = [
            "https://via.placeholder.com/450.png/",
            "https://via.placeholder.com/300.png/",
            "https://via.placeholder.com/150.png/",
            {
                src: "https://via.placeholder.com/450.png/",
                title: "this is title",
            },
        ];
        const showImg = (index) => {
            indexRef.value = index;
            visibleRef.value = true;
        };
        const onHide = () => (visibleRef.value = false);
        return { page, visibleRef, indexRef, imgs, showImg, onHide };
    },
};
</script>

<style scoped lang="scss">
.gallery {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    margin: 50px 0px;

    .pic {
        border: 2px solid #fff;
        cursor: pointer;
        transition: 0.2s;
        img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        &:hover {
            border: 2px solid #6541e6;
        }
    }
}
</style>
