<template>
  <div
    class="min-h-screen flex items-center justify-center bg-black text-white"
    style="background: radial-gradient(circle at left, #ff0000, transparent 80%)"
  >
    <div>
      <!-- LOGO slot -->
      <div class="flex justify-center mb-4">
        <slot name="logo" />
      </div>

      <!-- Card -->
      <div class="w-full sm:max-w-md px-6 py-6 bg-white/5 text-white backdrop-blur border border-white/10 shadow-lg rounded-lg">
        <slot />
      </div>
    </div>
  </div>
</template>
