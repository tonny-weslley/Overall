<script setup lang="ts">
import { defineProps } from 'vue';

import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar"


const props = defineProps<{
  player: {
    id: string;
    name: string;
    email: string;
    created_at: string;
    updated_at: string;
  };
}>();
</script>

<template>
  <div
    class="flex items-center justify-between rounded border border-gray-200 bg-gradient-to-br from-white via-gray-50 to-gray-100 p-4 shadow transition duration-300 w-full h-24"
  >
    <!-- Avatar e info do jogador -->
    <div class="flex items-center gap-5">
      <div class="relative group">
        <Avatar class="w-16 h-16 ring-2 ring-green-400 shadow group-hover:ring-4 transition">
          <AvatarImage :src="props.player.user?.avatar" alt="Avatar" />
          <AvatarFallback>{{ props.player.name.charAt(0).toUpperCase() }}</AvatarFallback>
        </Avatar>

      </div>

      <div>
        <h3 class="text-xl font-semibold text-gray-900 leading-tight">{{ props.player.name }}</h3>
        <p class="text-sm text-gray-500">
          {{ props.player.user?.name || props.player.email }}
        </p>
      </div>
    </div>

    <!-- Número favorito e destaque -->
    <div class="flex items-center gap-2 text-center">
      <span class="text-3xl font-bold text-green-600 tracking-tight">
        {{ props.player.favorite_number ?? '-' }}
      </span>
      <div class="flex items-center gap-1" v-if="props.player.is_admin">
        <div class="h-24 w-3 bg-green-400"></div>
        <div
          class="w-3 rounded-full bg-white flex items-center justify-center shadow-inner"
        >
          <span class="text-lg font-bold text-green-700">C</span>
        </div>
        <div class="h-24 w-3 bg-green-400"></div>
      </div>
    </div>
  </div>
</template>
