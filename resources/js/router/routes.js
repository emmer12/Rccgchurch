import { default as PageHome } from "@/views/pages/shared/Home";
import { default as PageAbout } from "@/views/pages/shared/About";
import { default as PageContact } from "@/views/pages/shared/Contact";
import { default as PageGallery } from "@/views/pages/shared/Gallery";
import { default as PageHistory } from "@/views/pages/shared/History";
import { default as PageMission } from "@/views/pages/shared/Mission";
import { default as PageBelief } from "@/views/pages/shared/Belief";
import { default as PageEvent } from "@/views/pages/shared/Events";
import { default as PageEventDetails } from "@/views/pages/shared/EventDetails";

import { default as PageLogin } from "@/views/pages/auth/login/Main";
import { default as PageRegister } from "@/views/pages/auth/register/Main";
import { default as PageResetPassword } from "@/views/pages/auth/reset-password/Main";
import { default as PageForgotPassword } from "@/views/pages/auth/forgot-password/Main";
import { default as PageNotFound } from "@/views/pages/shared/404/Main";

import { default as PageDashboard } from "@/views/pages/private/dashboard/Main";
import { default as PageProfile } from "@/views/pages/private/profile/Main";

import { default as PageUsers } from "@/views/pages/private/users/Index";
import { default as PageUsersCreate } from "@/views/pages/private/users/Create";
import { default as PageUsersEdit } from "@/views/pages/private/users/Edit";

import { default as PageEvents } from "@/views/pages/private/events/Index";
import { default as PageEventsCreate } from "@/views/pages/private/events/Create";
import { default as PageEventsEdit } from "@/views/pages/private/events/Edit";

import { default as PageSermons } from "@/views/pages/private/sermons/Index";
import { default as PageSermonsCreate } from "@/views/pages/private/sermons/Create";
import { default as PageSermonsEdit } from "@/views/pages/private/sermons/Edit";

import { default as PageGalleryDash } from "@/views/pages/private/gallery/Index";
import { default as PageGalleryCreate } from "@/views/pages/private/gallery/Create";

import abilities from "@/stub/abilities";

const routes = [
    {
        name: "home",
        path: "/",
        meta: { requiresAuth: false },
        component: PageHome,
    },
    {
        name: "about",
        path: "/about",
        meta: { requiresAuth: false },
        component: PageAbout,
    },
    {
        name: "contact",
        path: "/contact-us",
        meta: { requiresAuth: false },
        component: PageContact,
    },
    {
        name: "gallery",
        path: "/gallery",
        meta: { requiresAuth: false },
        component: PageGallery,
    },
    {
        name: "history",
        path: "/history",
        meta: { requiresAuth: false },
        component: PageHistory,
    },
    {
        name: "our-mission",
        path: "/our-mission",
        meta: { requiresAuth: false },
        component: PageMission,
    },
    {
        name: "our-belief",
        path: "/our-belief",
        meta: { requiresAuth: false },
        component: PageBelief,
    },
    {
        name: "events",
        path: "/events",
        meta: { requiresAuth: false },
        component: PageEvent,
    },
    {
        name: "events-details",
        path: "/events/:slug",
        meta: { requiresAuth: false },
        component: PageEventDetails,
    },
    {
        name: "panel",
        path: "/panel",
        children: [
            {
                name: "dashboard",
                path: "dashboard",
                meta: { requiresAuth: true },
                component: PageDashboard,
            },
            {
                name: "profile",
                path: "profile",
                meta: { requiresAuth: true, isOwner: true },
                component: PageProfile,
            },
            {
                path: "users",
                children: [
                    {
                        name: "users.list",
                        path: "list",
                        meta: {
                            requiresAuth: true,
                            requiresAbility: abilities.LIST_USER,
                        },
                        component: PageUsers,
                    },
                    {
                        name: "users.create",
                        path: "create",
                        meta: {
                            requiresAuth: true,
                            requiresAbility: abilities.CREATE_USER,
                        },
                        component: PageUsersCreate,
                    },
                    {
                        name: "users.edit",
                        path: ":id/edit",
                        meta: {
                            requiresAuth: true,
                            requiresAbility: abilities.EDIT_USER,
                        },
                        component: PageUsersEdit,
                    },
                ],
            },

            {
                path: "events",
                children: [
                    {
                        name: "events.list",
                        path: "list",
                        meta: {
                            requiresAuth: true,
                            requiresAbility: abilities.LIST_USER,
                        },
                        component: PageEvents,
                    },
                    {
                        name: "events.create",
                        path: "create",
                        meta: {
                            requiresAuth: true,
                            requiresAbility: abilities.CREATE_USER,
                        },
                        component: PageEventsCreate,
                    },
                    {
                        name: "events.edit",
                        path: ":id/edit",
                        meta: {
                            requiresAuth: true,
                            requiresAbility: abilities.EDIT_USER,
                        },
                        component: PageEventsEdit,
                    },
                ],
            },
            {
                path: "sermons",
                children: [
                    {
                        name: "sermons.list",
                        path: "list",
                        meta: {
                            requiresAuth: true,
                            requiresAbility: abilities.LIST_USER,
                        },
                        component: PageSermons,
                    },
                    {
                        name: "sermons.create",
                        path: "create",
                        meta: {
                            requiresAuth: true,
                            requiresAbility: abilities.CREATE_USER,
                        },
                        component: PageSermonsCreate,
                    },
                    {
                        name: "sermons.edit",
                        path: ":id/edit",
                        meta: {
                            requiresAuth: true,
                            requiresAbility: abilities.EDIT_USER,
                        },
                        component: PageSermonsEdit,
                    },
                ],
            },
            {
                path: "gallery",
                children: [
                    {
                        name: "gallery.list",
                        path: "list",
                        meta: {
                            requiresAuth: true,
                            requiresAbility: abilities.LIST_USER,
                        },
                        component: PageGalleryDash,
                    },
                    {
                        name: "gallery.create",
                        path: "create",
                        meta: {
                            requiresAuth: true,
                            requiresAbility: abilities.CREATE_USER,
                        },
                        component: PageGalleryCreate,
                    },
                ],
            },
        ],
    },
    {
        path: "/login",
        name: "login",
        meta: { requiresAuth: false },
        component: PageLogin,
    },
    {
        path: "/register",
        name: "register",
        meta: { requiresAuth: false },
        component: PageRegister,
    },
    {
        path: "/reset-password",
        name: "resetPassword",
        meta: { requiresAuth: false },
        component: PageResetPassword,
    },
    {
        path: "/forgot-password",
        name: "forgotPassword",
        meta: { requiresAuth: false },
        component: PageForgotPassword,
    },
    {
        path: "/:catchAll(.*)",
        name: "notFound",
        meta: { requiresAuth: false },
        component: PageNotFound,
    },
];

export default routes;
