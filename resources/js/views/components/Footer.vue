<template>
    <footer>
        <div class="container-x">
            <div class="wrapper flex flex-wrap">
                <div class="flex-1 details">
                    <div class="flex gap-10 flex-wrap">
                        <div class="flex-1">
                            <!-- <img src="" alt="" /> -->
                            <Logo />

                            <!-- <p>© Copyright RCCG E 2022</p> -->
                            <p class="mt-3">(480) 555-0103</p>
                            <p>
                                St George’s Church Hall Vancouver Road,Catford
                                Area Lewisham,London SE23 2AG
                            </p>
                            <p>info@nehemiahs.co.uk</p>
                        </div>
                        <div class="flex gap-10">
                            <div>
                                <h4 class="heading">Quick link</h4>
                                <ul>
                                    <router-link to="#" v-slot="{ navigate }">
                                        <li @click="navigate">Give</li>
                                    </router-link>
                                    <router-link to="#" v-slot="{ navigate }">
                                        <li @click="navigate">About Us</li>
                                    </router-link>
                                    <router-link to="#" v-slot="{ navigate }">
                                        <li @click="navigate">Sermons</li>
                                    </router-link>
                                    <router-link to="#" v-slot="{ navigate }">
                                        <li @click="navigate">Events</li>
                                    </router-link>
                                </ul>
                            </div>
                            <div>
                                <h4 class="heading">Connect</h4>
                                <div class="flex gap-4 mt-3">
                                    <a href="#">
                                        <svg
                                            width="16"
                                            height="16"
                                            viewBox="0 0 16 16"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M16 8C16 3.58172 12.4183 0 8 0C3.58172 0 0 3.58172 0 8C0 11.993 2.92547 15.3027 6.75 15.9028V10.3125H4.71875V8H6.75V6.2375C6.75 4.2325 7.94438 3.125 9.77172 3.125C10.6467 3.125 11.5625 3.28125 11.5625 3.28125V5.25H10.5538C9.56 5.25 9.25 5.86672 9.25 6.5V8H11.4688L11.1141 10.3125H9.25V15.9028C13.0745 15.3027 16 11.993 16 8Z"
                                                fill="#6541e6"
                                            />
                                        </svg>
                                    </a>

                                    <a
                                        href="https://youtube.com/@TheNehemiahs"
                                        target="_blank"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="20"
                                            fill="#6541e6"
                                            class="bi bi-youtube"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"
                                            />
                                        </svg>
                                    </a>

                                    <a
                                        href="https://vm.tiktok.com/ZM22FQa5b/"
                                        target="_blank"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="#6541e6"
                                            class="bi bi-tiktok"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"
                                            />
                                        </svg>
                                    </a>
                                    <a
                                        href="https://instagram.com/the_nehemiahs?igshid=OGQ5ZDc2ODk2ZA=="
                                        target="_blank"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="#6541e6"
                                            class="bi bi-instagram"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
                                            />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-1 sub">
                    <h2>
                        Subscribe to get Latest <br />
                        Updates and News
                    </h2>
                    <div class="flex align-end">
                        <input type="text" />
                        <Button label="Subscribe" />
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
footer {
    padding: 50px 0px;
    background: #161722;
    color: rgba(255, 255, 255, 0.78);

    .details {
        /* margin-right: 115px; */

        p {
            font-size: 12px;
            padding: 10px 0px;

            &:nth-child(1) {
                padding: 20px 0px;
            }
        }
    }

    .sub {
        padding-left: 115px;

        > div {
            align-items: flex-end;
        }
        h2 {
            font-weight: 700;
            font-size: 32px;
            line-height: 44px;
            /* or 138% */

            letter-spacing: -0.01em;
            text-transform: uppercase;
        }

        input {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            height: 58px;
            margin-top: 32px;
            flex: 1;
            max-width: 300px;
        }

        button {
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;
            margin-left: -10px;
            height: 58px;
        }
    }

    ul {
        li {
            text-transform: uppercase;
            padding: 10px 0px;
            font-size: 12px;
        }
    }

    .heading {
        color: #fff;
    }
}

@media (max-width: 640px) {
    footer {
        .sub {
            padding-left: 0px;

            h2 {
                font-size: 20px;
                line-height: 32px;
            }
        }
    }
}
</style>
