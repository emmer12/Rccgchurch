<template>
    <div class="app-d">
        <div class="container-x">
            <div
                class="bg-white p-4 rounded-[20px] flex flex-col sm:flex-row items-center"
            >
                <div class="art p-4 flex-1">
                    <img
                        class="m-auto"
                        src="/assets/images/app.png"
                        alt="App"
                    />
                </div>
                <div class="details flex-1">
                    <div class="flex">
                        <div class="icon"></div>
                        <div>
                            <h2>
                                Download the <br />
                                church app!
                            </h2>
                        </div>
                    </div>
                    <div class="">
                        <p class="my-5 sm:my-8">
                            Enjoy live services, sermons, events, media library,
                            giving, and much more! Take RCCG Church in your
                            pocket wherever you go.
                        </p>

                        <div class="store-i flex item-center">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.app-d {
    padding: 100px 0px;
}
.details {
    h2 {
        font-size: 48px;
        font-weight: 700;
        line-height: 58px;
        letter-spacing: -2px;
    }

    p {
        font-size: 16px;
        font-weight: 500;
        color: #667085;
    }
}

@media (max-width: 640px) {
    .details {
        h2 {
            font-size: 2.4em;
            line-height: 46px;
        }
    }
    .store-i {
        max-width: 90%;
        img {
            width: 50%;
        }
    }
}
</style>
