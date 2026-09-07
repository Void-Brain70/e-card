<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import { Mail, RefreshCw, ShieldCheck } from '@lucide/vue';
import { Button } from '@/components/ui/button';
import { Spinner } from '@/components/ui/spinner';
import { InputOTP, InputOTPGroup, InputOTPSlot } from '@/components/ui/input-otp';

defineOptions({
    layout: {
        title: 'Verify your email',
        description: 'Enter the 6-digit code sent to your email address',
    },
});

defineProps<{
    status?: string;
}>();

const otpValue = ref('');
const processing = ref(false);
const resending = ref(false);
const error = ref('');

const isComplete = computed(() => otpValue.value.length === 6);

function submit() {
    if (!isComplete.value) return;
    processing.value = true;
    error.value = '';

    router.post(
        '/otp/verify',
        { otp: otpValue.value },
        {
            onError(errors) {
                error.value = errors.otp ?? 'Something went wrong.';
                otpValue.value = '';
            },
            onFinish() {
                processing.value = false;
            },
        },
    );
}

function resend() {
    resending.value = true;
    router.post(
        '/otp/resend',
        {},
        {
            onFinish() {
                resending.value = false;
            },
        },
    );
}
</script>

<template>
    <Head title="Verify Email" />

    <div class="flex flex-col items-center gap-6">
        <!-- Icon -->
        <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 shadow-lg shadow-emerald-500/25">
            <ShieldCheck class="h-8 w-8 text-white" :stroke-width="1.75" />
        </div>

        <!-- Status message -->
        <div
            v-if="status"
            class="w-full rounded-lg bg-emerald-50 px-4 py-3 text-center text-sm font-medium text-emerald-700 dark:bg-emerald-900/20 dark:text-emerald-400"
        >
            {{ status }}
        </div>

        <!-- Error message -->
        <div
            v-if="error"
            class="w-full rounded-lg bg-red-50 px-4 py-3 text-center text-sm font-medium text-red-600 dark:bg-red-900/20 dark:text-red-400"
        >
            {{ error }}
        </div>

        <p class="text-muted-foreground text-center text-sm leading-relaxed">
            We've sent a 6-digit verification code to your email address.
            Enter it below to verify your account.
        </p>

        <!-- OTP Input -->
        <div class="flex flex-col items-center gap-3 w-full">
            <InputOTP
                v-model="otpValue"
                :maxlength="6"
                class="gap-2"
                @complete="submit"
            >
                <InputOTPGroup>
                    <InputOTPSlot :index="0" />
                    <InputOTPSlot :index="1" />
                    <InputOTPSlot :index="2" />
                    <InputOTPSlot :index="3" />
                    <InputOTPSlot :index="4" />
                    <InputOTPSlot :index="5" />
                </InputOTPGroup>
            </InputOTP>

            <div class="flex items-center gap-1.5 text-xs text-muted-foreground">
                <Mail class="h-3.5 w-3.5" />
                <span>Code expires in 10 minutes</span>
            </div>
        </div>

        <!-- Submit button -->
        <Button
            class="w-full h-11 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white border-0 font-semibold shadow-md shadow-emerald-500/20"
            :disabled="!isComplete || processing"
            @click="submit"
        >
            <Spinner v-if="processing" />
            Verify Email
        </Button>

        <!-- Resend -->
        <div class="text-muted-foreground text-center text-sm">
            Didn't receive the code?
            <button
                type="button"
                class="inline-flex items-center gap-1 font-medium text-emerald-600 hover:text-emerald-700 dark:text-emerald-400 underline underline-offset-4 hover:no-underline ml-1 disabled:opacity-50"
                :disabled="resending"
                @click="resend"
            >
                <RefreshCw v-if="!resending" class="h-3.5 w-3.5" />
                <Spinner v-else />
                Resend code
            </button>
        </div>
    </div>
</template>
