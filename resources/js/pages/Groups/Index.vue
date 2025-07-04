<script lang="ts" setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

// import GroupsTable from '@/components/design/GroupsTable.vue';
import GroupCard from './components/GroupCard.vue';
import CreateGroupCard from './components/CreateGroupCard.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Groups',
        href: '/groups',
    },
];

const props = defineProps({
    groups: Array,
});
</script>
<template>
    <Head title="Groups" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <template #header>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Groups</h1>
        </template>

        <main class="space-y-6 p-6">
            <!-- <Button>
                <a :href="route('groups.create')" class="flex items-center gap-1 align-middle"> <Plus /> Create new Group</a>
            </Button> -->

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
              <GroupCard v-for="grupo in props.groups" :key="grupo.id" :group="grupo" />
              <CreateGroupCard/>
            </div>


        </main>
    </AppLayout>
</template>
