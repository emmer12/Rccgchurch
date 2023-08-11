<template>
    <Guest>
        <div class="banner1">
            <swiper
                :slides-per-view="1"
                :space-between="0"
                @swiper="onSwiper"
                :modules="modules"
                :autoplay="{ delay: 5000, disableOnInteraction: false }"
                :grabCursor="true"
                :effect="'creative'"
                :navigation="true"
                :creativeEffect="{
                    prev: {
                        shadow: true,
                        translate: [0, 0, -600],
                    },
                    next: {
                        translate: ['100%', 0, 0],
                    },
                }"
                @slideChange="onSlideChange"
            >
                <swiper-slide>
                    <div class="banner">
                        <div class="container-x">
                            <div class="flex flex-wrap">
                                <div class="content">
                                    <h4 class="mb-4 title" ref="title">
                                        Welcome to our church
                                    </h4>
                                    <h2 class="mb-8 title-2">
                                        Become a part of our community
                                    </h2>

                                    <!-- <Button class="mb-16" label="Learn More" /> -->
                                    <div class="store-i flex item-center mb-16">
                                        <img
                                            src="/assets/images/Apple Store.png"
                                            alt="Apple Store"
                                            class="mr-4"
                                        />
                                        <img
                                            src="/assets/images/Playstore.png"
                                            alt="Playstore"
                                        />
                                    </div>

                                    <p class="note">
                                        Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Ad voluptate
                                        cupiditate inventore.
                                    </p>
                                </div>
                                <div class="artworks"></div>
                            </div>
                        </div>
                        <div class="bs"></div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="banner2">
                        <div class="container-x">
                            <div class="flex flex-wrap">
                                <div class="content">
                                    <h4 class="mb-4 title" ref="title">
                                        Meet Our Happy Member
                                    </h4>
                                    <h2 class="mb-8 title-2">
                                        Become a part of our community
                                    </h2>

                                    <div class="store-i flex item-center mb-16">
                                        <Button
                                            class="mb-16"
                                            label="Beconme a member"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bs"></div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="banner3">
                        <div class="container-x">
                            <div class="flex flex-wrap">
                                <div class="content">
                                    <h4 class="mb-4 title" ref="title">
                                        Welcome to our church
                                    </h4>
                                    <h2 class="mb-8 title-2">
                                        Become a part of our community
                                    </h2>

                                    <!-- <Button class="mb-16" label="Learn More" /> -->
                                    <div class="store-i flex item-center mb-16">
                                        <img
                                            src="/assets/images/Apple Store.png"
                                            alt="Apple Store"
                                            class="mr-4"
                                        />
                                        <img
                                            src="/assets/images/Playstore.png"
                                            alt="Playstore"
                                        />
                                    </div>

                                    <p class="note">
                                        Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Ad voluptate
                                        cupiditate inventore.
                                    </p>
                                </div>
                                <div class="artworks"></div>
                            </div>
                        </div>
                        <div class="bs"></div>
                    </div>
                </swiper-slide>
            </swiper>
        </div>

        <!-- Meet Out Pastors -->

        <div class="out-pastor-section">
            <div class="container-x">
                <div class="flex flex-col-reverse sm:flex-row">
                    <div class="details flex-1">
                        <h4 class="anim">The Nehemiah's</h4>
                        <h2 class="anim">
                            Welcome to RCCG Nehemiah's Palace parish
                        </h2>
                        <p class="anim">
                            Pastor Gbolahan are the Lead Pastors of RCCG Church
                            in Uk. They’ve been in pastoral ministry for over 20
                            years.
                        </p>

                        <br />

                        <Button label="LEARN MORE" class="block anim" />
                    </div>
                    <div class="img flex-1">
                        <img
                            src="/assets/images/i3.jpg"
                            alt="Pastor Gbolahan"
                        />
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="mission">
            <div class="wrapper">
                <div class="img">
                    <img src="" />
                </div>
                <div>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing
                        elit. Fugiat exercitationem esse quidem hic, excepturi,
                        voluptatum sit, eaque deleniti accusamus quae sint?
                        Temporibus quasi in molestias alias perferendis, natus
                        quibusdam minus.
                    </p>

                    <div class="action">
                        <Button size="lg" label="Find Us" />
                    </div>
                </div>
            </div>
        </div> -->

        <div class="f-section">
            <div class="container-x">
                <div class="heading">
                    <h2>Stay Connected</h2>
                    <p>
                        Our purpose is to stand by your side through every
                        challenge and triumph. We form a united community that
                        remains active every day, beyond just Sundays. Utilize
                        these resources to maintain connections and progress
                        towards your future endeavors.
                    </p>
                </div>

                <div>
                    <div class="flex sm:flex-row flex-col box-con">
                        <div class="box-left">
                            <router-link
                                v-slot="{ navigate }"
                                :to="{ name: 'blog' }"
                            >
                                <div @click="navigate">
                                    <img
                                        src="/assets/images/message.jpg"
                                        alt=""
                                    />
                                    <h4>Sermon</h4>
                                </div>
                            </router-link>
                        </div>
                        <div class="box-right">
                            <router-link class="div" :to="{ name: 'events' }">
                                <img src="/assets/images/events2.jpg" alt="" />
                                <h4>Event</h4>
                            </router-link>
                            <router-link class="div" :to="{ name: 'pc' }">
                                <img src="/assets/images/pastor.jpg" alt="" />
                                <h4>Pastor's conner</h4>
                            </router-link>
                            <router-link class="div" :to="{ name: 'register' }">
                                <img src="/assets/images/i2.jpg" alt="" />
                                <h4>Become a Member</h4>
                            </router-link>

                            <div class="div">
                                <img src="/assets/images/app.jpg" alt="" />
                                <h4>Download our App</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="event-section">
            <div class="container-x">
                <div class="heading">
                    <h2>Upcoming Events</h2>
                </div>

                <div class="my-[30px]">
                    <div
                        class="body"
                        v-if="results.records.events.length && !results.loading"
                    >
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <EventCard
                                v-for="event in results.records.events"
                                :event="event"
                                :key="event.id"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="confession-section">
            <div class="container-x">
                <div class="heading left">
                    <h2>Our Monthly Confession</h2>
                </div>

                <div class="my-[30px]">
                    <div
                        class="body"
                        v-if="results.records.blogs.length && !results.loading"
                    >
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <ConfessionCard
                                v-for="blog in results.records.blogs"
                                :event="blog"
                                :key="blog.id"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- App Download section -->

        <div>
            <AppDownload />
        </div>
    </Guest>
</template>

<script>
import Guest from "@/views/layouts/Guest";
import AppDownload from "@/views/components/AppDownload";
import gsap from "gsap";
import EventCard from "@/views/components/EventCard.vue";
import ConfessionCard from "@/views/components/ConfessionCard.vue";
import EventService from "@/services/EventService";
import { reactive, onMounted } from "vue";
import { prepareQuery } from "@/helpers/api";
import Spinner from "@/views/components/icons/Spinner";
import { trans } from "@/helpers/i18n";
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from "swiper/vue";
import { EffectCreative, Autoplay, Navigation } from "swiper/modules";
import ScrollTrigger from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);
// Import Swiper styles
import "swiper/css";
import "swiper/css/autoplay";
import "swiper/css/effect-creative";
import "swiper/css/pagination";
import "swiper/css/navigation";

export default {
    components: {
        Guest,
        AppDownload,
        EventCard,
        Spinner,
        Swiper,
        SwiperSlide,
        ConfessionCard,
    },
    methods: {
        runAnim() {
            gsap.timeline()
                .from(".title", {
                    x: -50,
                    opacity: 0,
                })
                .from(".title-2", {
                    x: -50,
                    opacity: 0,
                })
                .from(".store-i,.note", {
                    opacity: 0,
                });
        },
        onSwiper(swiper) {},
        onSlideChange() {
            this.runAnim();
        },
    },
    mounted() {
        this.runAnim();
        gsap.from(".box-right div", {
            scrollTrigger: ".box-right div",
            scale: 0.7,
            duration: 1,
            stagger: "0.2",
            ease: "Back.easeOut",
        });

        gsap.from(".anim", {
            scrollTrigger: ".anim",
            y: 30,
            duration: 2,
            stagger: "0.2",
            ease: "Back.easeOut",
        });
    },
    setup() {
        const service = new EventService();

        const mainQuery = reactive({
            page: 1,
            search: "",
        });

        const results = reactive({
            loading: false,
            records: {
                blogs: [],
                events: [],
            },
            pagination: {
                meta: null,
                links: null,
            },
        });

        function fetchPage(params) {
            results.records = [];
            results.loading = true;
            let query = prepareQuery(params);
            service
                .get("/home-data")
                .then((response) => {
                    console.log(response.data);
                    results.records.blogs = response.data.blogs;
                    results.records.events = response.data.events;

                    results.loading = false;
                })
                .catch((error) => {
                    console.log(error);
                    // alertStore.error(getResponseError(error));
                    results.loading = false;
                });
        }

        onMounted(() => {
            fetchPage(mainQuery);
        });

        return {
            results,
            trans,
            modules: [EffectCreative, Autoplay, Navigation],
        };
    },
};
</script>

<style lang="scss" scoped>
.banner,
.banner2,
.banner3 {
    background-color: #121212;
    background-image: url(/assets/images/banner1.png);
    height: 663px;
    position: relative;
    .content {
        padding-top: 128px;
        width: 50%;

        h4 {
            font-size: 16px;
            text-transform: uppercase;
            color: #f5f3ff;
            font-weight: 700;
            /* width: 0%; */
            overflow: hidden;
            display: block;
            /* white-space: nowrap; */
        }

        h2 {
            font-size: 64px;
            text-transform: uppercase;
            color: #fff;
            font-weight: 700;
            letter-spacing: -0.01em;
            line-height: 82px;
        }

        p.note {
            font-size: 16px;
            color: #fff;
            position: relative;
            margin-left: 42px;

            &:after {
                content: "";
                position: absolute;
                width: 31px;
                height: 2px;
                background: #d021d8;
                left: -39px;
                top: 12px;
            }
        }
    }
}

.banner2 {
    background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3)),
        url(/assets/images/i1.jpg);
}
.banner3 {
    background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.3)),
        url(/assets/images/i1.jpg);
}

.out-pastor-section {
    background: #fff;
    padding: 100px 0px;
    /* background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.5)),
        url(/assets/images/i3.jpg);
    background-attachment: fixed; */
    .details {
        padding: 20px 15px;
    }

    .img {
        height: 400px;
        border-radius: 20px;
        width: 100%;
        position: relative;
        position: relative;
        border: 2px solid #d021d8;

        &::after {
            content: "Welcome to God's Family";
            height: 50px;
            width: 300px;
            background: #d021d8;
            position: absolute;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            z-index: 1;
            color: #fff;
            text-align: center;
            line-height: 55px;
            font-weight: 700;
            border: 2px solid #d021d8;
            bottom: -40px;
        }

        img {
            height: 100%;
            object-fit: cover;
            width: 100%;
            border-radius: 20px;
            position: relative;
            z-index: 4;
        }
    }

    h4 {
        font-size: 20px;
        text-transform: uppercase;
        color: #d021d8;
        font-weight: 500;
        margin: 10px 0px;
    }

    h2 {
        font-size: 50px;
        font-weight: 700;
        /* text-transform: uppercase; */
        line-height: 50px;
        margin-bottom: 20px;
    }

    p {
        font-size: 20px;
    }
}

@media (max-width: 640px) {
    .banner,
    .banner2,
    .banner3 {
        background-position-x: center;
        height: auto;
        .content {
            /* padding-top: 128px; */
            padding: 50px 0px;
            width: 100%;

            h4 {
                font-size: 14px;
            }

            h2 {
                font-size: 34px;
                line-height: 40px;
            }

            p.note {
                &:after {
                    left: -40px;
                }
            }
        }

        .store-i {
            max-width: 90%;

            img {
                width: 50%;
            }
        }
    }

    .out-pastor-section {
        background: #fff;
        padding: 50px 0px;
        .details {
            padding: 50px 15px;
        }

        h2 {
            font-size: 2.2em;
            line-height: 40px;
        }

        p {
            font-size: 20px;
        }
    }

    .heading {
        h2 {
            font-size: 24px !important;
        }
        p {
            font-size: 14px !important;
        }
    }

    .box-con .box-right {
        gap: 10px !important;
    }
}
.heading {
    text-align: center;
    padding: 20px 0px;
    max-width: 100%;
    width: 640px;
    margin: auto;

    &.left {
        text-align: start;
        margin: 0;
        width: 100%;
    }

    h2 {
        position: relative;
        font-size: 34px;
        letter-spacing: -2px;
        font-weight: 900;
        display: inline-block;
    }
    p {
        color: #667085;
        font-size: 16px;
        font-weight: 500;
        padding: 20px 0px;
    }
}

.confession-section {
    background: #f8f3f5;
    padding: 50px 0px;
}
.event-section {
    background: #fff;
    padding: 50px 0px;
}
.f-section {
    padding: 50px 0px;
    text-align: center;
}

.bs {
    /* background: url(/assets/images/beige-torn-edge.png); */
    position: absolute;
    bottom: -5px;
    width: 100%;
    height: 37px;
}

.mission {
    padding: 10px;
    height: 400px;
    background: #fff;
    display: flex;
    align-items: center;
    text-align: center;

    .wrapper {
        margin: auto;
        width: 700px;
        max-width: 100%;
        font-size: 18px;

        .img {
            height: 120px;
            width: 120px;
            border-radius: 50%;
            background: #f5f5f5;
            margin: 10px auto;
        }
        .action {
            margin: 20px 0px;
        }
    }
}

.box-con {
    align-items: center;
    gap: 30px;
    .box-left {
        flex: 1;
        border-radius: 20px;
        position: relative;
        overflow: hidden;
        cursor: pointer;
        img {
            transition: 0.3s;
        }
        div h4 {
            transition: 0.3s;
        }

        &:hover {
            img {
                scale: 1.2;
            }

            &:after {
                background: rgb(23 0 105 / 0%);
            }

            div h4 {
                margin-left: 20px;
            }
        }

        &:after {
            content: "";
            position: absolute;
            border-radius: 20px;
            height: 100%;
            width: 100%;
            inset: 0;
            background: #210e2c4f;
            z-index: 224;
            pointer-events: none;
            transition: 0.3s;
        }

        img {
            border-radius: 20px;
        }

        h4 {
            position: absolute;
            bottom: 10px;
            color: white;
            font-size: 18px;
            font-weight: 700;
            left: 15px;
            z-index: 333;
        }
    }
    .box-right {
        padding: 10px;
        flex: 1;
        gap: 30px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        padding: 10px;

        .div {
            border-radius: 20px;
            overflow: hidden;
            position: relative;

            &:hover {
                img {
                    scale: 1.2;
                }

                &:after {
                    background: rgb(23 0 105 / 0%);
                }

                h4 {
                    color: white;
                }
            }

            h4 {
                position: absolute;
                bottom: 10px;
                color: rgba(255, 255, 255, 0.9);
                font-size: 18px;
                font-weight: 700;
                left: 15px;
                z-index: 333;
                transition: 0.3s;
            }
            img {
                transition: 0.4s;
                border-radius: 20px;
                cursor: pointer;
                object-fit: cover;
                height: 100%;
                z-index: 111;
                position: relative;
            }

            &:after {
                content: "";
                position: absolute;
                height: 100%;
                width: 100%;
                inset: 0;
                background: rgb(23 0 105 / 61%);
                z-index: 224;
                pointer-events: none;
                transition: 0.3s;
            }
        }
    }
}
</style>

<style>
.swiper-button-next,
.swiper-button-prev {
    background-color: #ffffffa1 !important;
    border-radius: 100%;
    color: #d021d8 !important;
    height: 50px;
    width: 50px;
}

.swiper-button-next:after,
.swiper-button-prev:after {
    font-size: 24px;
}
</style>
