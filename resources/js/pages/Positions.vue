<script lang="ts" setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Positions',
        href: '/positions',
    },
];
</script>
<template>
  <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
    </AppLayout>
</template>