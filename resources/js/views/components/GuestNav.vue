<template>
    <nav>
        <div class="h-20 navigation">
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
                            <router-link to="#" v-slot="{ navigate }">
                                <li @click="navigate">Sermons</li>
                            </router-link>
                            <router-link to="#" v-slot="{ navigate }">
                                <li @click="navigate">Events</li>
                            </router-link>
                            <router-link to="#" v-slot="{ navigate }">
                                <li @click="navigate">Blog</li>
                            </router-link>
                        </ul>
                        <ul class="right">
                            <Button to="login" label="Sign up" />
                        </ul>
                    </div>

                    <div class="block sm:hidden">
                        <input class="hidden" type="checkbox" id="active" />
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
                                <router-link to="#" v-slot="{ navigate }">
                                    <li @click="navigate">Sermons</li>
                                </router-link>
                                <router-link to="#" v-slot="{ navigate }">
                                    <li @click="navigate">Events</li>
                                </router-link>
                                <router-link to="#" v-slot="{ navigate }">
                                    <li @click="navigate">Blog</li>
                                </router-link>
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
import { reactive } from "vue";

export default {
    components: {
        Button,
    },
    setup() {
        const state = reactive({
            isAccountDropdownOpen: false,
            isMobileMenuOpen: false,
            currentExpandedMenuItem: null,
            app: window.AppConfig,
            show: false,
        });

        const toggle = () => {
            state.show = !state.show;
        };

        return {
            state,
            toggle,
        };
    },
};
</script>

<style lang="scss" scoped>
.navigation {
    background: #161722;
    z-index: 999;
    position: relative;
    .wrapper {
        display: flex;
        height: 80px;
        color: rgba($color: #fff, $alpha: 0.9);
        align-items: center;

        .menu {
            align-items: center;
            justify-content: space-between;
            flex: 1;
            ul {
                li {
                    color: rgba($color: #fff, $alpha: 0.9);
                    padding: 15px;
                    font-size: 18px;
                    font-weight: 600;
                    text-transform: uppercase;
                    position: relative;
                    cursor: pointer;
                    transition: 0.3s;

                    &:hover {
                        color: #fff;
                    }
                }
            }

            .dropdown {
                position: absolute;
                left: 0px;
                background: #161722;
                width: max-content;
                max-height: 0px;
                overflow-y: hidden;
                top: 70px;
                transition: 0.3s;

                li {
                    font-size: 16px;
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
                    background: #fff;
                    left: -50px;
                }
            }
            .right {
                display: inline-flex;
            }
        }
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
    border-bottom: 2px solid #fff;
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
    border-color: #fff;
}
#active:checked + .menu-btn:after {
    transform: rotate(-45deg);
    border-color: #fff;
}

.m-wrapper {
    height: calc(100vh - 80px);
    width: 300px;
    background: #161722;
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
