<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import { login } from '@/routes';
import { email } from '@/routes/password';

defineOptions({
    layout: {
        title: 'Reset your password',
        description: "Enter your email and we'll send you a reset link",
    },
});

defineProps<{
    status?: string;
}>();
</script>

<template>
    <Head title="Forgot password" />

    <div class="flex flex-col gap-5">
        <div
            v-if="status"
            class="rounded-lg bg-emerald-50 px-4 py-3 text-center text-sm font-medium text-emerald-700 dark:bg-emerald-900/20 dark:text-emerald-400"
        >
            {{ status }}
        </div>

        <Form v-bind="email.form()" v-slot="{ errors, processing }" class="grid gap-4">
            <div class="grid gap-2">
                <Label for="email">Email address</Label>
                <Input
                    id="email"
                    type="email"
                    name="email"
                    autocomplete="off"
                    autofocus
                    placeholder="you@example.com"
                    class="h-11"
                />
                <InputError :message="errors.email" />
            </div>

            <Button
                class="h-11 w-full bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white border-0 font-semibold shadow-md shadow-emerald-500/20"
                :disabled="processing"
                data-test="email-password-reset-link-button"
            >
                <Spinner v-if="processing" />
                Send reset link
            </Button>
        </Form>

        <div class="text-muted-foreground text-center text-sm">
            Remembered your password?
            <TextLink
                :href="login()"
                class="font-medium text-emerald-600 hover:text-emerald-700 dark:text-emerald-400"
            >
                Back to sign in
            </TextLink>
        </div>
    </div>
</template>
