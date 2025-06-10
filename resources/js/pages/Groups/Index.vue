<script lang="ts" setup>
import { Button } from '@/components/ui/button';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, usePage } from '@inertiajs/vue3';
import { Plus } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Groups',
        href: '/groups',
    },
];

const props = defineProps({
  groups: Array
})

</script>
<template>
    <Head title="Groups" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <template #header>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Groups</h1>
        </template>

        <main class="space-y-6 p-6">
            <Button>
                <a :href="route('groups.create')" class="flex align-middle items-center gap-1"> <Plus /> Create new Group</a>
            </Button>

            <div>
                <p v-for="grupo in groups">
                    {{ grupo.name }}
                </p>
            </div>

        </main>
    </AppLayout>
</template>
