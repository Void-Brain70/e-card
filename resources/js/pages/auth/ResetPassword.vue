<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import InputError from '@/components/InputError.vue';
import PasswordInput from '@/components/PasswordInput.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import { update } from '@/routes/password';

defineOptions({
    layout: {
        title: 'Set new password',
        description: 'Choose a strong password for your account',
    },
});

const props = defineProps<{
    token: string;
    email: string;
    passwordRules: string;
}>();

const inputEmail = ref(props.email);
</script>

<template>
    <Head title="Reset password" />

    <Form
        v-bind="update.form()"
        :transform="(data) => ({ ...data, token, email })"
        :reset-on-success="['password', 'password_confirmation']"
        v-slot="{ errors, processing }"
        class="grid gap-5"
    >
        <div class="grid gap-2">
            <Label for="email">Email address</Label>
            <Input
                id="email"
                type="email"
                name="email"
                autocomplete="email"
                v-model="inputEmail"
                class="h-11 bg-muted/40 text-muted-foreground"
                readonly
            />
            <InputError :message="errors.email" class="mt-1" />
        </div>

        <div class="grid gap-2">
            <Label for="password">New password</Label>
            <PasswordInput
                id="password"
                name="password"
                autocomplete="new-password"
                autofocus
                placeholder="Create a strong password"
                :passwordrules="passwordRules"
                class="h-11"
            />
            <InputError :message="errors.password" />
        </div>

        <div class="grid gap-2">
            <Label for="password_confirmation">Confirm new password</Label>
            <PasswordInput
                id="password_confirmation"
                name="password_confirmation"
                autocomplete="new-password"
                placeholder="Repeat your new password"
                :passwordrules="passwordRules"
                class="h-11"
            />
            <InputError :message="errors.password_confirmation" />
        </div>

        <Button
            type="submit"
            class="mt-2 h-11 w-full bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white border-0 font-semibold shadow-md shadow-emerald-500/20"
            :disabled="processing"
            data-test="reset-password-button"
        >
            <Spinner v-if="processing" />
            Update password
        </Button>
    </Form>
</template>
