<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import {
    Mail,
    Sparkles,
    Zap,
    Palette,
    Smartphone,
    MessageSquare,
    Lock,
    ArrowRight,
    Star,
    Send,
    CheckCircle,
} from '@lucide/vue';
import { dashboard, login, register } from '@/routes';

const cards = [
    { emoji: '🎂', label: 'Birthday', color: 'from-pink-400 to-rose-500', bg: 'bg-pink-50 dark:bg-pink-950/20' },
    { emoji: '💍', label: 'Wedding', color: 'from-emerald-400 to-teal-500', bg: 'bg-emerald-50 dark:bg-emerald-950/20' },
    { emoji: '🎄', label: 'Holiday', color: 'from-green-400 to-emerald-600', bg: 'bg-green-50 dark:bg-green-950/20' },
    { emoji: '❤️', label: 'Anniversary', color: 'from-red-400 to-rose-500', bg: 'bg-red-50 dark:bg-red-950/20' },
    { emoji: '🎓', label: 'Graduation', color: 'from-blue-400 to-indigo-500', bg: 'bg-blue-50 dark:bg-blue-950/20' },
    { emoji: '🙏', label: 'Thank You', color: 'from-amber-400 to-orange-500', bg: 'bg-amber-50 dark:bg-amber-950/20' },
];

const features = [
    { icon: Sparkles, title: 'Beautiful Templates', desc: 'Choose from hundreds of professionally designed card templates for every occasion.', color: 'from-emerald-400 to-teal-500' },
    { icon: Zap, title: 'Instant Delivery', desc: 'Send your e-card instantly via email or share a unique link with anyone, anywhere.', color: 'from-teal-400 to-cyan-500' },
    { icon: Palette, title: 'Fully Customizable', desc: 'Personalize every card with your own photos, text, colors, fonts and animations.', color: 'from-green-400 to-emerald-500' },
    { icon: Smartphone, title: 'Works Everywhere', desc: 'Cards look stunning on any device — phones, tablets, laptops, you name it.', color: 'from-cyan-400 to-teal-500' },
    { icon: MessageSquare, title: 'Heartfelt Messages', desc: 'Add personal messages, voice notes, or even video greetings to make it special.', color: 'from-teal-500 to-emerald-600' },
    { icon: Lock, title: 'Private & Secure', desc: 'Your cards and personal data are protected with enterprise-grade security.', color: 'from-slate-400 to-slate-600' },
];

const steps = [
    { num: '01', title: 'Pick a Template', desc: 'Browse our library of 200+ beautiful templates for any occasion.', emoji: '🎨' },
    { num: '02', title: 'Personalize It', desc: 'Add your message, photos, and choose colors to make it uniquely yours.', emoji: '✏️' },
    { num: '03', title: 'Send & Celebrate', desc: 'Share via email or link. Track opens and see reactions in real time.', emoji: '🚀' },
];

const testimonials = [
    { name: 'Sarah M.', role: 'Marketing Manager', avatar: 'SM', text: 'E-Card made our team celebrations so much more personal. My colleagues loved the animated birthday cards!', color: 'from-emerald-500 to-teal-600' },
    { name: 'James K.', role: 'Small Business Owner', avatar: 'JK', text: 'I send thank-you cards to clients every week. E-Card is professional, beautiful, and lightning fast.', color: 'from-teal-500 to-cyan-600' },
    { name: 'Priya R.', role: 'Event Planner', avatar: 'PR', text: 'The wedding invitation templates are absolutely stunning. Every couple I recommend this to falls in love with it.', color: 'from-green-500 to-emerald-600' },
];

const stats = [
    { value: '2M+', label: 'Cards Sent' },
    { value: '500K+', label: 'Happy Users' },
    { value: '200+', label: 'Templates' },
    { value: '190+', label: 'Countries' },
];
</script>

<template>
    <Head title="E-Card — Send Beautiful Digital Cards">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>

    <div class="min-h-screen bg-white text-slate-900 dark:bg-slate-950 dark:text-slate-100" style="font-family: 'Inter var', sans-serif;">

        <!-- ── Navbar ───────────────────────────────────────────────── -->
        <header class="sticky top-0 z-50 border-b border-slate-100 bg-white/80 backdrop-blur-xl dark:border-slate-800/50 dark:bg-slate-950/80">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
                <!-- Logo -->
                <div class="flex items-center gap-2.5">
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 shadow-md shadow-emerald-500/30">
                        <Mail class="h-5 w-5 text-white" :stroke-width="2.5" />
                    </div>
                    <span class="text-xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">E-Card</span>
                </div>

                <!-- Nav links -->
                <nav class="hidden items-center gap-8 text-sm font-medium text-slate-600 dark:text-slate-400 md:flex">
                    <a href="#features" class="transition-colors hover:text-slate-900 dark:hover:text-white">Features</a>
                    <a href="#occasions" class="transition-colors hover:text-slate-900 dark:hover:text-white">Occasions</a>
                    <a href="#testimonials" class="transition-colors hover:text-slate-900 dark:hover:text-white">Reviews</a>
                    <a href="#" class="transition-colors hover:text-slate-900 dark:hover:text-white">Pricing</a>
                </nav>

                <!-- Auth CTA -->
                <div class="flex items-center gap-3">
                    <template v-if="$page.props.auth.user">
                        <Link
                            :href="dashboard()"
                            class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-600 px-5 py-2.5 text-sm font-semibold text-white shadow-md shadow-emerald-500/25 transition-all hover:shadow-lg hover:shadow-emerald-500/35 hover:scale-[1.02]"
                        >
                            Dashboard
                            <ArrowRight class="h-4 w-4" />
                        </Link>
                    </template>
                    <template v-else>
                        <Link
                            :href="login()"
                            class="rounded-xl px-4 py-2.5 text-sm font-medium text-slate-700 transition-colors hover:text-slate-900 dark:text-slate-300 dark:hover:text-white"
                        >
                            Sign in
                        </Link>
                        <Link
                            :href="register()"
                            class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-600 px-5 py-2.5 text-sm font-semibold text-white shadow-md shadow-emerald-500/25 transition-all hover:shadow-lg hover:shadow-emerald-500/35 hover:scale-[1.02]"
                        >
                            Get started free
                        </Link>
                    </template>
                </div>
            </div>
        </header>

        <!-- ── Hero ────────────────────────────────────────────────── -->
        <section class="relative overflow-hidden px-6 pb-20 pt-20 lg:pt-32">
            <div class="pointer-events-none absolute inset-0">
                <div class="absolute left-1/2 top-0 -translate-x-1/2 h-[600px] w-[900px] rounded-full bg-gradient-to-b from-emerald-100/60 to-transparent blur-3xl dark:from-emerald-900/20" />
                <div class="absolute -right-40 top-20 h-72 w-72 rounded-full bg-teal-100/60 blur-3xl dark:bg-teal-900/20" />
                <div class="absolute -left-40 bottom-0 h-72 w-72 rounded-full bg-green-100/60 blur-3xl dark:bg-green-900/20" />
            </div>

            <div class="relative mx-auto max-w-5xl text-center">
                <!-- Badge -->
                <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-4 py-1.5 text-sm font-medium text-emerald-700 dark:border-emerald-800/50 dark:bg-emerald-900/30 dark:text-emerald-300">
                    <Sparkles class="h-3.5 w-3.5" />
                    Now with animated cards &amp; video messages
                </div>

                <h1 class="mb-6 text-5xl font-extrabold tracking-tight text-slate-900 dark:text-white lg:text-7xl">
                    Send Cards That
                    <span class="block bg-gradient-to-r from-emerald-600 via-teal-500 to-cyan-500 bg-clip-text text-transparent">
                        Truly Wow
                    </span>
                </h1>

                <p class="mx-auto mb-10 max-w-2xl text-lg text-slate-600 dark:text-slate-400 leading-relaxed">
                    Create stunning digital greeting cards for any occasion — birthdays, weddings, holidays and more.
                    Personalize, send instantly, and make every moment unforgettable.
                </p>

                <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                    <Link
                        :href="register()"
                        class="group inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-600 px-8 py-4 text-base font-bold text-white shadow-xl shadow-emerald-500/30 transition-all hover:scale-105 hover:shadow-2xl hover:shadow-emerald-500/40"
                    >
                        Create your first card — it's free
                        <ArrowRight class="h-4 w-4 transition-transform group-hover:translate-x-1" />
                    </Link>
                    <a
                        href="#occasions"
                        class="inline-flex items-center gap-2 rounded-2xl border border-slate-200 bg-white px-8 py-4 text-base font-semibold text-slate-700 shadow-sm transition-all hover:border-slate-300 hover:shadow dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
                    >
                        Browse templates
                    </a>
                </div>

                <!-- Stats row -->
                <div class="mt-16 grid grid-cols-2 gap-4 sm:grid-cols-4">
                    <div
                        v-for="stat in stats"
                        :key="stat.label"
                        class="rounded-2xl border border-slate-100 bg-white/80 p-5 text-center shadow-sm backdrop-blur dark:border-slate-800/50 dark:bg-slate-900/50"
                    >
                        <div class="text-3xl font-extrabold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">
                            {{ stat.value }}
                        </div>
                        <div class="mt-1 text-sm text-slate-500 dark:text-slate-400">{{ stat.label }}</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── Occasions ────────────────────────────────────────────── -->
        <section id="occasions" class="px-6 py-20 bg-slate-50 dark:bg-slate-900/50">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 text-center">
                    <h2 class="text-4xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                        A Card for
                        <span class="bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">Every Occasion</span>
                    </h2>
                    <p class="mt-4 text-lg text-slate-600 dark:text-slate-400">
                        Whether it's a birthday or a big milestone, we have the perfect card for it.
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-6">
                    <div
                        v-for="card in cards"
                        :key="card.label"
                        class="group cursor-pointer rounded-2xl border border-slate-100/60 p-6 text-center shadow-sm transition-all hover:-translate-y-1 hover:shadow-xl dark:border-slate-800/40"
                        :class="card.bg"
                    >
                        <div
                            class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br text-2xl shadow-md transition-transform group-hover:scale-110"
                            :class="card.color"
                        >
                            {{ card.emoji }}
                        </div>
                        <div class="text-sm font-semibold text-slate-800 dark:text-slate-200">{{ card.label }}</div>
                    </div>
                </div>

                <!-- Featured card banner -->
                <div class="mt-16 overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 p-px shadow-2xl shadow-emerald-500/25">
                    <div class="rounded-3xl bg-gradient-to-br from-emerald-600/95 via-teal-600/95 to-cyan-600/95 p-8 md:p-12 text-white">
                        <div class="flex flex-col items-center gap-8 md:flex-row md:gap-12">
                            <div class="flex-1 text-center md:text-left">
                                <div class="mb-3 inline-flex items-center gap-1.5 rounded-full bg-white/20 px-4 py-1 text-sm font-medium">
                                    <Sparkles class="h-3.5 w-3.5" />
                                    Featured Template
                                </div>
                                <h3 class="mb-3 text-3xl font-extrabold">Birthday Celebration Card</h3>
                                <p class="mb-6 text-emerald-100 leading-relaxed">
                                    Celebrate with confetti animations, heartfelt messages, and beautiful typography.
                                    Add a personal photo and send with one click.
                                </p>
                                <Link
                                    :href="register()"
                                    class="inline-flex items-center gap-2 rounded-xl bg-white px-6 py-3 font-bold text-emerald-700 shadow-lg transition-all hover:scale-105 hover:shadow-xl"
                                >
                                    Use this template
                                    <ArrowRight class="h-4 w-4" />
                                </Link>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="relative h-52 w-52 md:h-64 md:w-64">
                                    <div class="absolute inset-0 rounded-3xl bg-white/10 backdrop-blur-sm flex items-center justify-center">
                                        <div class="text-center">
                                            <div class="text-7xl mb-3">🎂</div>
                                            <div class="text-lg font-bold">Happy Birthday!</div>
                                            <div class="text-emerald-200 text-sm mt-1">Wishing you the best</div>
                                        </div>
                                    </div>
                                    <div class="absolute -top-2 -left-2 text-2xl animate-bounce" style="animation-delay:0s">🎊</div>
                                    <div class="absolute -top-2 -right-2 text-2xl animate-bounce" style="animation-delay:0.3s">🎉</div>
                                    <div class="absolute -bottom-2 -left-2 text-2xl animate-bounce" style="animation-delay:0.6s">⭐</div>
                                    <div class="absolute -bottom-2 -right-2 text-2xl animate-bounce" style="animation-delay:0.9s">🎈</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── Features ─────────────────────────────────────────────── -->
        <section id="features" class="px-6 py-20">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 text-center">
                    <h2 class="text-4xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                        Everything You Need to
                        <span class="bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">Delight</span>
                    </h2>
                    <p class="mt-4 text-lg text-slate-600 dark:text-slate-400">
                        Powerful features that make creating and sharing e-cards a joy.
                    </p>
                </div>

                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <div
                        v-for="feature in features"
                        :key="feature.title"
                        class="group rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition-all hover:-translate-y-1 hover:border-emerald-100 hover:shadow-lg dark:border-slate-800/50 dark:bg-slate-900/50 dark:hover:border-emerald-900/50"
                    >
                        <div
                            class="mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br shadow-md"
                            :class="feature.color"
                        >
                            <component :is="feature.icon" class="h-6 w-6 text-white" :stroke-width="1.75" />
                        </div>
                        <h3 class="mb-2 text-lg font-bold text-slate-900 dark:text-white">{{ feature.title }}</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">{{ feature.desc }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── How it works ─────────────────────────────────────────── -->
        <section class="px-6 py-20 bg-gradient-to-br from-emerald-600 via-teal-600 to-cyan-600 text-white">
            <div class="mx-auto max-w-5xl text-center">
                <h2 class="mb-3 text-4xl font-extrabold tracking-tight">Create a Card in 3 Steps</h2>
                <p class="mb-14 text-lg text-emerald-100">So easy, you'll have your first card ready in under 2 minutes.</p>

                <div class="grid gap-8 sm:grid-cols-3">
                    <div
                        v-for="step in steps"
                        :key="step.num"
                        class="flex flex-col items-center"
                    >
                        <div class="mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-white/20 text-3xl backdrop-blur-sm">
                            {{ step.emoji }}
                        </div>
                        <div class="mb-2 text-sm font-bold uppercase tracking-widest text-emerald-200">Step {{ step.num }}</div>
                        <h3 class="mb-2 text-xl font-bold">{{ step.title }}</h3>
                        <p class="text-emerald-100 text-sm leading-relaxed">{{ step.desc }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── Testimonials ──────────────────────────────────────────── -->
        <section id="testimonials" class="px-6 py-20 bg-slate-50 dark:bg-slate-900/50">
            <div class="mx-auto max-w-6xl">
                <div class="mb-12 text-center">
                    <h2 class="text-4xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                        People Love E-Card
                    </h2>
                    <p class="mt-4 text-lg text-slate-600 dark:text-slate-400">
                        Don't take our word for it — here's what our users say.
                    </p>
                </div>

                <div class="grid gap-6 sm:grid-cols-3">
                    <div
                        v-for="t in testimonials"
                        :key="t.name"
                        class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm dark:border-slate-800/50 dark:bg-slate-900/50"
                    >
                        <div class="mb-4 flex items-center gap-3">
                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br text-sm font-bold text-white"
                                :class="t.color"
                            >
                                {{ t.avatar }}
                            </div>
                            <div>
                                <div class="font-semibold text-slate-900 dark:text-white text-sm">{{ t.name }}</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">{{ t.role }}</div>
                            </div>
                        </div>
                        <div class="mb-3 flex gap-0.5">
                            <Star
                                v-for="i in 5"
                                :key="i"
                                class="h-4 w-4 fill-amber-400 text-amber-400"
                                :stroke-width="1"
                            />
                        </div>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                            "{{ t.text }}"
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── CTA ──────────────────────────────────────────────────── -->
        <section class="px-6 py-24">
            <div class="mx-auto max-w-3xl text-center">
                <div class="rounded-3xl bg-gradient-to-br from-slate-900 to-slate-800 p-12 dark:from-slate-800 dark:to-slate-900 shadow-2xl">
                    <div class="mb-4 flex justify-center">
                        <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600">
                            <Send class="h-8 w-8 text-white" :stroke-width="1.75" />
                        </div>
                    </div>
                    <h2 class="mb-4 text-4xl font-extrabold text-white">
                        Ready to Send Something Beautiful?
                    </h2>
                    <p class="mb-8 text-lg text-slate-400 leading-relaxed">
                        Join over 500,000 people who use E-Card to celebrate life's moments.
                        No credit card required — start for free today.
                    </p>
                    <!-- Benefits list -->
                    <div class="mb-8 flex flex-col items-center gap-2 text-sm text-slate-400">
                        <div v-for="b in ['Free forever plan available', 'No credit card required', 'Cancel anytime']" :key="b" class="flex items-center gap-2">
                            <CheckCircle class="h-4 w-4 text-emerald-500" />
                            {{ b }}
                        </div>
                    </div>
                    <div class="flex flex-col items-center gap-4 sm:flex-row sm:justify-center">
                        <Link
                            :href="register()"
                            class="group inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-600 px-8 py-4 text-base font-bold text-white shadow-xl shadow-emerald-500/30 transition-all hover:scale-105"
                        >
                            Get started — it's free
                            <ArrowRight class="h-4 w-4 transition-transform group-hover:translate-x-1" />
                        </Link>
                        <Link
                            :href="login()"
                            class="inline-flex items-center rounded-2xl border border-slate-700 px-8 py-4 text-base font-semibold text-slate-300 transition-all hover:border-slate-500 hover:text-white"
                        >
                            Sign in to your account
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── Footer ───────────────────────────────────────────────── -->
        <footer class="border-t border-slate-100 px-6 py-10 dark:border-slate-800/50">
            <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-4 sm:flex-row">
                <div class="flex items-center gap-2">
                    <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-gradient-to-br from-emerald-500 to-teal-600">
                        <Mail class="h-4 w-4 text-white" :stroke-width="2.5" />
                    </div>
                    <span class="font-bold text-slate-900 dark:text-white">E-Card</span>
                    <span class="text-slate-400 text-sm">© 2026. All rights reserved.</span>
                </div>
                <div class="flex items-center gap-6 text-sm text-slate-500 dark:text-slate-400">
                    <a href="#" class="hover:text-slate-900 dark:hover:text-white transition-colors">Privacy</a>
                    <a href="#" class="hover:text-slate-900 dark:hover:text-white transition-colors">Terms</a>
                    <a href="#" class="hover:text-slate-900 dark:hover:text-white transition-colors">Contact</a>
                    <a href="#" class="hover:text-slate-900 dark:hover:text-white transition-colors">Blog</a>
                </div>
            </div>
        </footer>
    </div>
</template>
