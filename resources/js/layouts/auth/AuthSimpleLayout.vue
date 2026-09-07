<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Mail } from '@lucide/vue';
import { home } from '@/routes';

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <div class="relative flex min-h-svh flex-col items-center justify-center overflow-hidden bg-gradient-to-br from-slate-50 via-emerald-50/30 to-teal-50/40 dark:from-slate-950 dark:via-emerald-950/20 dark:to-teal-950/20 p-6 md:p-10">
        <!-- Decorative blobs -->
        <div class="pointer-events-none absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 h-80 w-80 rounded-full bg-emerald-400/10 blur-3xl" />
            <div class="absolute -bottom-40 -left-40 h-80 w-80 rounded-full bg-teal-400/10 blur-3xl" />
        </div>

        <div class="relative w-full max-w-sm">
            <div class="flex flex-col gap-8">
                <!-- Logo & branding -->
                <div class="flex flex-col items-center gap-3">
                    <Link
                        :href="home()"
                        class="flex flex-col items-center gap-2 font-medium transition-opacity hover:opacity-80"
                    >
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 shadow-lg shadow-emerald-500/25">
                            <Mail class="h-6 w-6 text-white" :stroke-width="2" />
                        </div>
                        <span class="text-lg font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">E-Card</span>
                    </Link>

                    <div class="space-y-1.5 text-center">
                        <h1 class="text-2xl font-bold tracking-tight text-foreground">{{ title }}</h1>
                        <p class="text-sm text-muted-foreground leading-relaxed">{{ description }}</p>
                    </div>
                </div>

                <!-- Auth card -->
                <div class="rounded-2xl border border-white/60 bg-white/80 p-6 shadow-xl shadow-slate-200/60 backdrop-blur-sm dark:border-slate-800/60 dark:bg-slate-900/80 dark:shadow-slate-950/60">
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>
