<script setup lang="ts">
import { Plus } from 'lucide-vue-next';

const handleClick = () => {
  // Logic to handle the click event, e.g., redirect to create group page
  window.location.href = '/groups/create';
};

</script>
<template>
  <div
    @click="handleClick"
    class="h-64 shadow-md rounded-lg border-2 border-dashed hover:border-solid p-6 flex flex-row gap-2 items-center justify-center hover:cursor-pointer hover:bg-green-50 transition-colors group">
    <Plus class="group-hover:text-black"/>
    <h2 class="text-xl font-semibold group-hover:text-black"> Create New Group</h2>
  </div>
</template>
