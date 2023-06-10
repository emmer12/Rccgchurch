<template>
    <Form id="register-form" @submit.prevent="onFormSubmit">
        <Alert class="mb-4" />
        <TextInput
            type="text"
            :required="true"
            :label="trans('users.labels.first_name')"
            name="first_name"
            v-model="form.first_name"
            class="mb-2"
        />
        <!-- <TextInput type="text" :label="trans('users.labels.middle_name')" name="middle_name" v-model="form.middle_name" class="mb-2"/> -->
        <TextInput
            type="text"
            :required="true"
            :label="trans('users.labels.last_name')"
            name="last_name"
            v-model="form.last_name"
            class="mb-2"
        />
        <TextInput
            type="email"
            :required="true"
            :label="trans('users.labels.email')"
            name="email"
            v-model="form.email"
            class="mb-2"
        />

        <div>
            <div class="mt-4">
                <label for="sex" class="block text-sm font-medium text-gray-700"
                    >Date of Birth</label
                >
                <div class="flex gap-3">
                    <select
                        id="day"
                        name="day"
                        v-model="form.day"
                        class="mt-y block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                        <option value="" disabled>Select Day</option>
                        <option
                            v-for="day in 31"
                            :value="day"
                            :key="day + 'day'"
                        >
                            {{ day }}
                        </option>
                    </select>

                    <select
                        id="month"
                        name="month"
                        v-model="form.month"
                        class="mt-y block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                        <option value="" disabled>Select Month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <label
                for="age-group"
                class="block text-sm font-medium text-gray-700"
                >Age Group:</label
            >
            <select
                id="age-group"
                name="age-group"
                v-model="form.age_group"
                class="mt-y block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            >
                <option value="0-18">0-18 years</option>
                <option value="19-30">19-30 years</option>
                <option value="31-50">31-50 years</option>
                <option value="51+">51+ years</option>
            </select>
        </div>

        <div class="mt-4">
            <label for="sex" class="block text-sm font-medium text-gray-700"
                >Sex:</label
            >
            <select
                id="sex"
                name="sex"
                v-model="form.sex"
                class="mt-y block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            >
                <option value="Mail">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div class="mt-4">
            <label
                for="employment-status"
                class="block text-sm font-medium text-gray-700"
                >Employment Status:</label
            >
            <select
                id="employment-status"
                name="employment-status"
                v-model="form.employment_status"
                class="my-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            >
                <option value="employed">Employed</option>
                <option value="unemployed">Unemployed</option>
                <option value="self-employed">Self-Employed</option>
                <option value="student">Student</option>
                <option value="retired">Retired</option>
            </select>
        </div>
        <TextInput
            type="password"
            :required="true"
            :label="trans('users.labels.password')"
            name="password"
            v-model="form.password"
            class="mb-2"
        />
        <TextInput
            type="password"
            :required="true"
            :label="trans('users.labels.confirm_password')"
            name="password-confirm"
            v-model="form.passwordConfirm"
            class="mb-4"
        />
        <div class="text-center">
            <Button type="submit" :label="trans('global.buttons.register')" />
        </div>
    </Form>
</template>

<script>
import { reactive, defineComponent } from "vue";
import { trans } from "@/helpers/i18n";
import { useAuthStore } from "@/stores";
import TextInput from "@/views/components/input/TextInput";
import Button from "@/views/components/input/Button";
import Alert from "@/views/components/Alert";
import Form from "@/views/components/Form";

export default defineComponent({
    name: "RegisterForm",
    components: {
        Form,
        Alert,
        Button,
        TextInput,
    },
    setup() {
        const authStore = useAuthStore();
        const form = reactive({
            first_name: null,
            middle_name: null,
            last_name: null,
            email: null,
            password: null,
            passwordConfirm: null,
        });

        function onFormSubmit() {
            const payload = {
                first_name: form.first_name,
                middle_name: form.middle_name,
                last_name: form.last_name,
                dob: form.day + " " + form.month,
                employment_status: form.employment_status,
                age_group: form.age_group,
                sex: form.sex,
                email: form.email,
                password: form.password,
                password_confirmation: form.passwordConfirm,
            };

            authStore.register(payload);
        }

        return {
            onFormSubmit,
            form,
            trans,
        };
    },
});
</script>
