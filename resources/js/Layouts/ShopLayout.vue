<script setup>
import Navbar from '../Components/Navbar.vue'
</script>

<template>
    <div class="min-h-screen bg-gray-50 text-gray-900">
        <Navbar />

        <main>
            <slot />
        </main>

        <footer class="border-t border-gray-200 bg-white">
            <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                <div class="flex flex-col justify-between gap-4 sm:flex-row">
                    <p class="text-sm text-gray-500">
                        © {{ new Date().getFullYear() }} Fashion Store.
                        Tous droits réservés.
                    </p>

                    <div class="flex gap-6 text-sm text-gray-500">
                        <a href="#" class="hover:text-orange-500">
                            Conditions
                        </a>

                        <a href="#" class="hover:text-orange-500">
                            Confidentialité
                        </a>

                        <a href="#" class="hover:text-orange-500">
                            Contact
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>
