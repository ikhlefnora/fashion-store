<script setup>
import { ref } from 'vue'

const mobileMenuOpen = ref(false)
</script>

<template>
    <header class="sticky top-0 z-50 border-b border-gray-200 bg-white/95 backdrop-blur">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">

            <!-- Logo -->
            <a href="/" class="text-2xl font-bold tracking-tight text-gray-900">
                Fashion<span class="text-orange-500">Store</span>
            </a>

            <!-- Desktop navigation -->
            <div class="hidden items-center gap-8 md:flex">
                <a
                    href="/"
                    class="text-sm font-medium text-gray-700 transition hover:text-orange-500"
                >
                    Accueil
                </a>

                <a
                    href="/shop"
                    class="text-sm font-medium text-gray-700 transition hover:text-orange-500"
                >
                    Boutique
                </a>

                <a
                    href="/categories"
                    class="text-sm font-medium text-gray-700 transition hover:text-orange-500"
                >
                    Catégories
                </a>

                <a
                    href="/about"
                    class="text-sm font-medium text-gray-700 transition hover:text-orange-500"
                >
                    À propos
                </a>
            </div>

            <!-- Actions -->
            <div class="hidden items-center gap-4 md:flex">
                <button
                    type="button"
                    class="text-gray-700 transition hover:text-orange-500"
                    aria-label="Rechercher"
                >
                    🔍
                </button>

                <a
                    href="/login"
                    class="text-sm font-medium text-gray-700 transition hover:text-orange-500"
                >
                    Connexion
                </a>

                <a
                    href="/cart"
                    class="relative text-gray-700 transition hover:text-orange-500"
                    aria-label="Panier"
                >
                    🛒

                    <span
                        class="absolute -right-3 -top-2 flex h-5 min-w-5 items-center justify-center rounded-full bg-orange-500 px-1 text-xs font-semibold text-white"
                    >
                        0
                    </span>
                </a>
            </div>

            <!-- Mobile button -->
            <button
                type="button"
                class="rounded-lg p-2 text-gray-700 hover:bg-gray-100 md:hidden"
                @click="mobileMenuOpen = !mobileMenuOpen"
                aria-label="Menu"
            >
                <span class="text-xl">
                    {{ mobileMenuOpen ? '✕' : '☰' }}
                </span>
            </button>
        </nav>

        <!-- Mobile menu -->
        <div
            v-if="mobileMenuOpen"
            class="border-t border-gray-200 bg-white md:hidden"
        >
            <div class="mx-auto max-w-7xl space-y-1 px-4 py-4">

                <a
                    href="/"
                    class="block rounded-lg px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-orange-500"
                >
                    Accueil
                </a>

                <a
                    href="/shop"
                    class="block rounded-lg px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-orange-500"
                >
                    Boutique
                </a>

                <a
                    href="/categories"
                    class="block rounded-lg px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-orange-500"
                >
                    Catégories
                </a>

                <a
                    href="/about"
                    class="block rounded-lg px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-orange-500"
                >
                    À propos
                </a>

                <div class="border-t border-gray-100 pt-3">
                    <a
                        href="/login"
                        class="block rounded-lg px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-orange-500"
                    >
                        Connexion
                    </a>

                    <a
                        href="/cart"
                        class="block rounded-lg px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-orange-500"
                    >
                        Panier
                    </a>
                </div>
            </div>
        </div>
    </header>
</template>
