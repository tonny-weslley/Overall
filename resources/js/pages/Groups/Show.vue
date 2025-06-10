<script setup lang="ts">
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';

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

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Groups',
        href: '/groups',
    },
    {
        title: props.group.name,
        href: `/groups/${props.group.id}`,
    },
];
</script>

<template>
  <Head title="Groups" />

    <AppLayout :breadcrumbs="breadcrumbs">
      <template #header>
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ props.group.name }}</h1>
      </template>

      <main class="space-y-6 p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
          <p> {{ props.group }}</p>
        </div>
      </main>
    </AppLayout>
</template>