<script setup lang="ts">
import { Button } from '@/components/ui/button';

const props = defineProps<{
  group: {
    id: string;
    name: string;
    acronym: string;
    description: string;
    created_at: string;
    updated_at: string;
    deleted_at: string | null;
  };
}>();

const handleClick = () => {
  window.location.href = route('groups.show', props.group.id);
};


</script>
<template>
  <div class="h-64 shadow-md rounded-lg border-2 flex flex-col">
    <div class="bg-green-100 h-12 w-full rounded-t-lg"/>
    <div class="flex flex-col p-4">
      <h2 class="text-xl font-semibold text-left">{{ props.group.name }}</h2>
      <p class="mt-2">{{ props.group.description }}</p>
    </div>
    <div class="flex justify-end p-4 mt-auto">
      <Button class="bg-green-100 hover:bg-green-200 text-black" @click="handleClick">View Details</Button>
    </div>
  </div>
</template>
