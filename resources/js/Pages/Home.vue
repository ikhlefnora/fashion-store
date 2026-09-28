<script setup>
import ShopLayout from '../Layouts/ShopLayout.vue'
</script>

<template>
    <ShopLayout>
        <section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="mb-4 text-sm font-semibold uppercase tracking-widest text-orange-500">
                    Nouvelle collection
                </p>

                <h1 class="text-5xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                    Trouvez votre
                    <span class="text-orange-500">
                        style.
                    </span>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-gray-600">
                    Découvrez notre collection de vêtements modernes,
                    élégants et accessibles.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a
                        href="/shop"
                        class="rounded-xl bg-orange-500 px-6 py-3 font-semibold text-white transition duration-300 hover:scale-[1.02] hover:bg-orange-600"
                    >
                        Découvrir la boutique
                    </a>

                    <a
                        href="/categories"
                        class="rounded-xl border border-gray-300 bg-white px-6 py-3 font-semibold text-gray-700 transition duration-300 hover:bg-gray-50"
                    >
                        Voir les catégories
                    </a>
                </div>
            </div>
        </section>
    </ShopLayout>
</template>
