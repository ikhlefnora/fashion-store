<script setup>
import { computed, ref } from 'vue'
import ShopLayout from '../../Layouts/ShopLayout.vue'

const props = defineProps({
    product: {
        type: Object,
        required: true,
    },
})

const selectedColor = ref(null)
const selectedSize = ref(null)

const colors = computed(() => {
    const uniqueColors = new Map()

    props.product.variants.forEach((variant) => {
        if (!uniqueColors.has(variant.color.id)) {
            uniqueColors.set(variant.color.id, variant.color)
        }
    })

    return Array.from(uniqueColors.values())
})

const sizes = computed(() => {
    const uniqueSizes = new Map()

    props.product.variants.forEach((variant) => {
        if (!uniqueSizes.has(variant.size.id)) {
            uniqueSizes.set(variant.size.id, variant.size)
        }
    })

    return Array.from(uniqueSizes.values())
})

const selectedVariant = computed(() => {
    if (!selectedColor.value || !selectedSize.value) {
        return null
    }

    return props.product.variants.find(
        (variant) =>
            variant.color.id === selectedColor.value &&
            variant.size.id === selectedSize.value
    )
})
</script>

<template>
    <ShopLayout>
        <section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">

            <div class="grid gap-10 md:grid-cols-2">

                <!-- Image -->
                <div class="overflow-hidden rounded-2xl bg-gray-100">
                    <img
                        :src="product.image"
                        :alt="product.name"
                        class="h-full w-full object-cover"
                    />
                </div>

                <!-- Informations -->
                <div>
                    <p class="text-sm font-medium uppercase tracking-wide text-orange-500">
                        {{ product.category.name }}
                    </p>

                    <h1 class="mt-2 text-4xl font-bold tracking-tight text-gray-900">
                        {{ product.name }}
                    </h1>

                    <p class="mt-4 text-2xl font-bold text-gray-900">
                        {{ Number(product.price).toLocaleString('fr-DZ') }} DA
                    </p>

                    <p class="mt-6 leading-7 text-gray-600">
                        {{ product.description }}
                    </p>

                    <!-- Couleurs -->
                    <div class="mt-8">
                        <h2 class="text-sm font-semibold text-gray-900">
                            Couleur
                        </h2>

                        <div class="mt-3 flex flex-wrap gap-3">
                            <button
                                v-for="color in colors"
                                :key="color.id"
                                type="button"
                                @click="selectedColor = color.id"
                                class="flex items-center gap-2 rounded-full border px-4 py-2 text-sm transition"
                                :class="
                                    selectedColor === color.id
                                        ? 'border-orange-500 ring-2 ring-orange-100'
                                        : 'border-gray-200 hover:border-orange-500'
                                "
                            >
                                <span
                                    class="h-4 w-4 rounded-full border border-gray-300"
                                    :style="{ backgroundColor: color.hex_code }"
                                ></span>

                                {{ color.name }}
                            </button>
                        </div>
                    </div>

                    <!-- Tailles -->
                    <div class="mt-8">
                        <h2 class="text-sm font-semibold text-gray-900">
                            Taille
                        </h2>

                        <div class="mt-3 flex flex-wrap gap-3">
                            <button
                                v-for="size in sizes"
                                :key="size.id"
                                type="button"
                                @click="selectedSize = size.id"
                                class="rounded-lg border px-5 py-2 text-sm font-medium transition"
                                :class="
                                    selectedSize === size.id
                                        ? 'border-gray-900 bg-gray-900 text-white'
                                        : 'border-gray-200 bg-white text-gray-700 hover:border-gray-900'
                                "
                            >
                                {{ size.name }}
                            </button>
                        </div>
                    </div>

                    <!-- Variante -->
                    <div
                        v-if="selectedVariant"
                        class="mt-8 rounded-xl bg-gray-50 p-4"
                    >
                        <p
                            v-if="selectedVariant.stock > 0"
                            class="text-sm font-medium text-green-600"
                        >
                            ✓ {{ selectedVariant.stock }} articles disponibles
                        </p>

                        <p
                            v-else
                            class="text-sm font-medium text-red-600"
                        >
                            Rupture de stock
                        </p>
                    </div>

                    <!-- Sélection incomplète -->
                    <p
                        v-else
                        class="mt-8 text-sm text-gray-500"
                    >
                        Sélectionnez une couleur et une taille.
                    </p>

                    <!-- Bouton panier -->
                    <button
                        type="button"
                        class="mt-6 w-full rounded-xl bg-orange-500 px-6 py-4 font-semibold text-white transition hover:bg-orange-600 disabled:cursor-not-allowed disabled:opacity-50"
                        :disabled="!selectedVariant || selectedVariant.stock === 0"
                    >
                        Ajouter au panier
                    </button>

                </div>
            </div>

        </section>
    </ShopLayout>
</template>
