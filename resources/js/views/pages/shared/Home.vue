<template>
    <Guest>
        <div class="banner">
            <div class="container-x">
                <div class="flex flex-wrap">
                    <div class="content">
                        <h4 class="mb-4">Welcome to our church</h4>
                        <h2 class="mb-8">Become a part of our community</h2>

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
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Ad voluptate cupiditate inventore.
                        </p>
                    </div>
                    <div class="artworks"></div>
                </div>
            </div>
            <div class="bs"></div>
        </div>

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
                            <div>
                                <img src="/assets/images/c1.jpg" alt="" />
                                <h4>Message</h4>
                            </div>
                        </div>
                        <div class="box-right">
                            <div>
                                <img src="/assets/images/events2.jpg" alt="" />
                                <h4>Event</h4>
                            </div>
                            <div>
                                <img src="/assets/images/c1.jpg" alt="" />
                                <h4>Sermon</h4>
                            </div>
                            <div>
                                <img src="/assets/images/i2.jpg" alt="" />
                                <h4>Become a Member</h4>
                            </div>
                            <div>
                                <img src="/assets/images/app.jpg" alt="" />
                                <h4>App</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Meet Out Pastors -->

        <div class="out-pastor-section">
            <div class="container-x">
                <div class="flex flex-col-reverse sm:flex-row">
                    <div class="details flex-1">
                        <h4>The Nehemiah's</h4>
                        <h2>Welcome to RCCG Nehemiah's Palace parish</h2>
                        <p>
                            Pastor Gbolahan are the Lead Pastors of RCCG Church
                            in Uk. They’ve been in pastoral ministry for over 20
                            years.
                        </p>

                        <br />

                        <Button label="LEARN MORE" class="block" />
                    </div>
                    <div class="img flex-1">
                        <img
                            src="/assets/images/d1.jpeg"
                            alt="Pastor Gbolahan"
                        />
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
export default {
    components: {
        Guest,
        AppDownload,
    },
};
</script>

<style lang="scss" scoped>
.banner {
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
                background: #6541e6;
                left: -39px;
                top: 12px;
            }
        }
    }
}

.out-pastor-section {
    background: #fff;
    padding: 100px 0px;
    .details {
        padding: 20px 15px;
    }

    .img {
        height: 400px;
        border-radius: 20px;
        width: 100%;
        position: relative;
        position: relative;
        border: 2px solid #6541e6;

        &::after {
            content: "Welcome to God's Family";
            height: 50px;
            width: 300px;
            background: #6541e6;
            position: absolute;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            z-index: 1;
            color: #fff;
            text-align: center;
            line-height: 55px;
            font-weight: 700;
            border: 2px solid #6541e6;
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
        color: #6541e6;
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
    .banner {
        /* background-image: url(/assets/images/banner1.png); */
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
}

.f-section {
    background: url(/assets/images/light-texture.jpg);
    padding: 50px 0px;
    text-align: center;

    .heading {
        text-align: center;
        padding: 20px 0px;
        max-width: 100%;
        width: 640px;
        margin: auto;

        h2 {
            position: relative;
            font-size: 42px;
            font-weight: 900;
            display: inline-block;

            &:after {
                content: "";
                position: absolute;
                top: 0px;
                left: 0px;
                display: inline-block;
                background: #6541e6;
                height: 8px;
                width: 50px;
            }
        }
        p {
            font-size: 20px;
            /* font-weight: 500; */
        }
    }
}

.bs {
    background: url(/assets/images/beige-torn-edge.png);
    position: absolute;
    bottom: -5px;
    width: 100%;
    height: 37px;
}

.box-con {
    align-items: center;
    .box-left {
        flex: 1;
        border-radius: 20px;
        position: relative;

        img {
            border-radius: 20px;
        }

        h4 {
            position: absolute;
            bottom: 10px;
            color: white;
            font-size: 20px;
            font-weight: 900;
            left: 15px;
        }
    }
    .box-right {
        padding: 10px;
        flex: 1;
        gap: 20px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        padding: 10px;

        div {
            border-radius: 20px;
            overflow: hidden;
            position: relative;

            h4 {
                position: absolute;
                bottom: 10px;
                color: white;
                font-size: 20px;
                font-weight: 900;
                left: 15px;
            }
            img {
                transition: 0.4s;
                border-radius: 20px;
                cursor: pointer;
                object-fit: cover;
                height: 100%;

                &:hover {
                    scale: 1.2;
                }
            }
        }
    }
}
</style>
