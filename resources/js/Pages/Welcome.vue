<script setup>
import { Head, Link } from '@inertiajs/vue3'

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,
})

function handleImageError() {
  document.getElementById('screenshot-container')?.classList.add('!hidden')
  document.getElementById('docs-card')?.classList.add('!row-span-1')
  document.getElementById('docs-card-content')?.classList.add('!flex-row')
  document.getElementById('background')?.classList.add('!hidden')
}
</script>

<template>
  <Head title="Welcome" />

  <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <!-- background SVG -->
    <img id="background" class="absolute -left-20 top-0 max-w-[877px]"
         src="https://laravel.com/assets/img/welcome/background.svg" />

    <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
      <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
        <!-- ----- HEADER ----- -->
        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
          <div class="flex lg:justify-center lg:col-start-2">
            <!-- Laravel logo (kept as‑is) -->
            <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
              <path d="M61.8548 14.6253C61.8778 … Z" fill="currentColor" />
            </svg>
          </div>

          <!-- ----- NAVBAR ----- -->
          <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
            <!-- Logged‑in user -->
            <Link v-if="$page.props.auth?.user"
                  :href="route('dashboard')"
                  class="rounded-md px-3 py-2 text-black hover:text-black/70 dark:text-white dark:hover:text-white/80">
              Dashboard
            </Link>

            <!-- Guest -->
            <template v-else>
              <Link :href="route('login')"
                    class="rounded-md px-3 py-2 text-black hover:text-black/70 dark:text-white dark:hover:text-white/80">
                Log in
              </Link>

              <!-- 🔗 Custom patient registration link -->
              <Link v-if="canRegister"
                    :href="route('register.patient')"
                    class="rounded-md px-3 py-2 text-black hover:text-black/70 dark:text-white dark:hover:text-white/80">
                Register
              </Link>
            </template>
          </nav>
        </header>

        <!-- ----- MAIN CONTENT (truncated to keep file shorter) ----- -->
        <!-- your cards / docs / ecosystem links remain unchanged -->
      </div>
    </div>
  </div>
</template>

<style scoped>
.card-link {
  @apply flex items-start gap-4 rounded-lg bg-white p-6 shadow-lg ring-1 ring-white/10 transition
          duration-300 hover:text-black/70 hover:ring-black/20
          dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700;
}
</style>
