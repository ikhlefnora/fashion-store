<script setup>
import { computed, ref } from 'vue'
import ShopLayout from '../../Layouts/ShopLayout.vue'
import ProductCard from '../../Components/ProductCard.vue'

const props = defineProps({
    products: {
        type: Array,
        required: true,
    },

    categories: {
        type: Array,
        required: true,
    },
})

const selectedCategory = ref(null)

const filteredProducts = computed(() => {
    if (selectedCategory.value === null) {
        return props.products
    }

    return props.products.filter(
        (product) => product.category_id === selectedCategory.value
    )
})
</script>

<template>
    <ShopLayout>
        <section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">

            <!-- En-tête -->
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-widest text-orange-500">
                        Notre collection
                    </p>

                    <h1 class="mt-2 text-4xl font-bold tracking-tight text-gray-900">
                        Boutique
                    </h1>


                    <p class="mt-3 text-gray-600">
                        Découvrez nos dernières collections.
                    </p>
                </div>

                <p class="text-sm text-gray-500">
                    {{ filteredProducts.length }} produits
                </p>
            </div>

            <!-- Filtres -->
            <div class="mt-10 flex flex-wrap gap-3">
                <button
                    type="button"
                    @click="selectedCategory = null"
                    :class="
                        selectedCategory === null
                            ? 'bg-gray-900 text-white'
                            : 'border border-gray-200 bg-white text-gray-700 hover:border-orange-500 hover:text-orange-500'
                    "
                    class="rounded-full px-5 py-2 text-sm font-medium transition"
                >
                    Tous
                </button>

                <button
                    v-for="category in categories"
                    :key="category.id"
                    type="button"
                    @click="selectedCategory = category.id"
                    :class="
                        selectedCategory === category.id
                            ? 'bg-orange-500 text-white'
                            : 'border border-gray-200 bg-white text-gray-700 hover:border-orange-500 hover:text-orange-500'
                    "
                    class="rounded-full px-5 py-2 text-sm font-medium transition"
                >
                    {{ category.name }}
                </button>
            </div>
            <!-- Produits -->
            <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <ProductCard
                    v-for="product in filteredProducts"
                    :key="product.id"
                    :product="product"
                />
            </div>

        </section>
    </ShopLayout>
</template>
