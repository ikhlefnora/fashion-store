<script setup>
defineProps({
    product: {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <article
        class="group overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-100 transition duration-300 hover:-translate-y-1 hover:shadow-lg"
    >
        <!-- Image -->
        <div class="relative aspect-[4/5] overflow-hidden bg-gray-100">
            <img
                :src="product.image"
                :alt="product.name"
                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
            />

            <span
                v-if="product.badge"
                class="absolute left-4 top-4 rounded-full bg-orange-500 px-3 py-1 text-xs font-semibold text-white"
            >
                {{ product.badge }}
            </span>

            <button
                type="button"
                class="absolute right-4 top-4 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-gray-700 shadow-sm transition hover:bg-white hover:text-red-500"
                aria-label="Ajouter aux favoris"
            >
                ♡
            </button>
        </div>

        <!-- Informations -->
        <div class="p-5">
            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                {{ product.category.name }}
            </p>

            <h3 class="mt-2 text-lg font-semibold text-gray-900">
                {{ product.name }}
            </h3>

            <div class="mt-3 flex items-center justify-between">
                <p class="text-lg font-bold text-gray-900">
                    {{ Number(product.price).toLocaleString('fr-DZ') }} DA
                </p>

                <a
                    :href="`/shop/${product.id}`"
                    class="text-sm font-semibold text-orange-500 transition hover:text-orange-600"
                >
                    Voir →
                </a>
            </div>
        </div>
    </article>
</template>
