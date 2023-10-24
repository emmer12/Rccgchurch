<template>
    <nav>
        <div class="h-20 navigation" id="nav">
            <div class="container-x">
                <div class="wrapper">
                    <div class="logo">
                        <router-link to="/"> <Logo /></router-link>
                    </div>
                    <div class="menu hidden sm:flex">
                        <ul class="left">
                            <router-link to="/" v-slot="{ navigate }">
                                <li @click="navigate">Home</li>
                            </router-link>
                            <li @click="toggle">
                                About us

                                <ul
                                    class="dropdown"
                                    :class="{ added: state.show }"
                                >
                                    <div class="drop-wrap">
                                        <router-link
                                            to="/history"
                                            v-slot="{ navigate }"
                                        >
                                            <li @click="navigate">
                                                Our History
                                            </li>
                                        </router-link>
                                        <router-link
                                            to="/our-mission"
                                            v-slot="{ navigate }"
                                        >
                                            <li @click="navigate">
                                                Our Mission and Vision
                                            </li>
                                        </router-link>
                                        <router-link
                                            to="/our-belief"
                                            v-slot="{ navigate }"
                                        >
                                            <li @click="navigate">
                                                Our Beliefs
                                            </li>
                                        </router-link>
                                    </div>
                                </ul>
                            </li>
                            <router-link to="/contact-us" v-slot="{ navigate }">
                                <li @click="navigate">Contact</li>
                            </router-link>
                            <router-link to="/sermons" v-slot="{ navigate }">
                                <li @click="navigate">Sermons</li>
                            </router-link>
                            <router-link to="/events" v-slot="{ navigate }">
                                <li @click="navigate">Events</li>
                            </router-link>
                            <router-link to="/gallery" v-slot="{ navigate }">
                                <li @click="navigate">Gallery</li>
                            </router-link>
                        </ul>
                        <div class="right flex gap-2">
                            <Button to="register" label="Sign up" />
                            <a href="">
                                <Button theme="outline" label="Give" />
                            </a>
                        </div>
                    </div>

                    <div class="block sm:hidden">
                        <input
                            class="hidden"
                            type="checkbox"
                            v-model="state.sidebar"
                            id="active"
                        />
                        <label for="active" class="menu-btn"
                            ><span></span
                        ></label>
                        <label for="active" class="close"></label>
                        <div class="m-wrapper">
                            <ul class="left">
                                <router-link to="/" v-slot="{ navigate }">
                                    <li @click="navigate">Home</li>
                                </router-link>
                                <li @click="toggle">
                                    About us

                                    <ul class="ml-3">
                                        <div>
                                            <router-link
                                                to="/history"
                                                v-slot="{ navigate }"
                                            >
                                                <li @click="navigate">
                                                    Our History
                                                </li>
                                            </router-link>
                                            <router-link
                                                to="/our-mission"
                                                v-slot="{ navigate }"
                                            >
                                                <li @click="navigate">
                                                    Our Mission and Vision
                                                </li>
                                            </router-link>
                                            <router-link
                                                to="/our-belief"
                                                v-slot="{ navigate }"
                                            >
                                                <li @click="navigate">
                                                    Our Beliefs
                                                </li>
                                            </router-link>
                                        </div>
                                    </ul>
                                </li>
                                <router-link
                                    to="/sermons"
                                    v-slot="{ navigate }"
                                >
                                    <li @click="navigate">Sermons</li>
                                </router-link>
                                <router-link to="/events" v-slot="{ navigate }">
                                    <li @click="navigate">Events</li>
                                </router-link>
                                <router-link
                                    to="/gallery"
                                    v-slot="{ navigate }"
                                >
                                    <li @click="navigate">Gallery</li>
                                </router-link>
                                <!-- <router-link to="#" v-slot="{ navigate }">
                                    <li @click="navigate">Blog</li>
                                </router-link> -->
                            </ul>
                            <ul class="right">
                                <Button label="Sign up" />
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import Button from "@/views/components/input/Button";
import { reactive, watch } from "vue";
import { useRoute } from "vue-router";

export default {
    components: {
        Button,
    },
    data() {
        return {
            direction: 0,
            prevDirection: 0,
            prevScroll: window.scrollY || document.documentElement.scrollTop,
        };
    },
    created() {
        window.addEventListener("scroll", this.checkScroll);
    },
    methods: {
        checkScroll: function () {
            let curScroll =
                window.scrollY || document.documentElement.scrollTop;

            if (curScroll > this.prevScroll) {
                //scrolled up
                this.direction = 1;
            } else if (curScroll < this.prevScroll) {
                //scrolled down

                this.direction = 2;
            }

            if (this.direction !== this.prevDirection) {
                this.toggleHeader(this.direction, curScroll);
            }

            this.prevScroll = curScroll;
        },
        toggleHeader: function (direction, curScroll) {
            var header = document.getElementById("nav");
            if (direction === 1 && curScroll > 70) {
                //replace 52 with the height of your header in px

                header.classList.add("hide");
                this.prevDirection = direction;
            } else if (direction === 2) {
                header.classList.remove("hide");
                this.prevDirection = direction;
            }
        },
    },
    setup() {
        const route = useRoute();
        const state = reactive({
            isAccountDropdownOpen: false,
            isMobileMenuOpen: false,
            currentExpandedMenuItem: null,
            app: window.AppConfig,
            show: false,
            sidebar: false,
        });

        const toggle = () => {
            state.show = !state.show;
        };

        watch(
            () => route.name,
            () => {
                state.sidebar = false;
            }
        );

        return {
            state,
            toggle,
        };
    },
};
</script>

<style lang="scss" scoped>
.navigation {
    background: #f8f3f5;
    /* position: fixed;
    left: 0;
    background: #8c408869; */
    transition: 0.3s;
    z-index: 9999;
    position: fixed;
    width: 100%;
    top: 0px;

    .wrapper {
        display: flex;
        height: 80px;
        color: rgba($color: #000, $alpha: 0.9);
        align-items: center;

        .menu {
            align-items: center;
            justify-content: space-between;
            flex: 1;
            ul {
                .active {
                    li {
                        color: #d021d8;
                    }
                }

                li {
                    color: rgba($color: #161722, $alpha: 0.9);
                    padding: 15px;
                    font-size: 16px;
                    font-weight: 600;
                    position: relative;
                    cursor: pointer;
                    transition: 0.3s;

                    &:hover {
                        color: #d021d8;
                    }
                }
            }

            .dropdown {
                position: absolute;
                left: 0px;
                background: #fff;
                width: max-content;
                max-height: 0px;
                overflow-y: hidden;
                top: 70px;
                transition: 0.3s;

                li {
                    font-size: 16px;
                    transition: 0.2s;

                    &:hover {
                        margin-left: 10px;
                    }
                }

                .dropdown-wrap {
                    padding: 10px;
                }

                &.added {
                    max-height: 200px;
                }
            }
            .left {
                display: inline-flex;
                margin-left: 100px;
                position: relative;

                &:after {
                    content: "";
                    position: absolute;
                    height: 100%;
                    width: 2px;
                    background: #d021d8;
                    left: -50px;
                }
            }
            .right {
                display: inline-flex;
            }
        }
    }

    &.hide {
        /* position: relative; */
        top: -100px;
    }
}

.menu-btn span,
.menu-btn:before,
.menu-btn:after {
    content: "";
    position: absolute;
    top: calc(50% - 1px);
    right: 15px;
    width: 30px;
    border-bottom: 2px solid #444;
    transition: transform 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
}
.menu-btn:before {
    transform: translateY(-8px);
}
.menu-btn:after {
    transform: translateY(8px);
}

.close {
    z-index: 1;
    width: 100%;
    height: 100%;
    pointer-events: none;
    transition: background 0.6s;
}

/* closing animation */
#active:checked + .menu-btn span {
    transform: scaleX(0);
}
#active:checked + .menu-btn:before {
    transform: rotate(45deg);
    border-color: #444;
}
#active:checked + .menu-btn:after {
    transform: rotate(-45deg);
    border-color: #444;
}

.m-wrapper {
    height: calc(100vh - 80px);
    width: 300px;
    /* background: #161722; */
    background: #fff;
    position: absolute;
    top: 80px;
    left: -300px;
    transition: 1.2s cubic-bezier(0.215, 0.61, 0.355, 1);
    padding: 20px 10px;

    ul a,
    ul li {
        padding: 10px 0px;
        font-weight: 500;
    }
}

#active:checked ~ .m-wrapper {
    left: 0px;
}
.m-wrapper ul li a {
    transform: translateX(0px);
}

#active:checked ~ .m-wrapper ul li a {
    transform: none;
    transition-timing-function: ease, cubic-bezier(0.1, 1.3, 0.3, 1); /* easeOutBackを緩めた感じ */
    transition-delay: 0.6s;
    transform: translateX(-100px);
}
</style>
