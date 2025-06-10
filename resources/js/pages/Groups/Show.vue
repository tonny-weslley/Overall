<script setup lang="ts">
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/components/ui/tabs';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
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
    players: Array<{
        id: string;
        name: string;
        email: string;
        created_at: string;
        updated_at: string;
    }>;
    invite_code: string | null;
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
            <Tabs defaultValue="overview">
                <TabsList>
                    <TabsTrigger value="overview">Overview</TabsTrigger>
                    <TabsTrigger value="players">Players</TabsTrigger>
                    <TabsTrigger value="matches">Matches</TabsTrigger>
                    <TabsTrigger value="settings">Settings</TabsTrigger>
                </TabsList>

                <TabsContent value="overview">
                    <p>Group Overview</p>
                    {{ props.group.name }} ({{ props.group.acronym }})<br />

                    {{ props.group.description }}<br />

                    <div v-if="props.invite_code"><strong>Invite Code:</strong> {{ props.invite_code.code }}<br /></div>
                </TabsContent>

                <TabsContent value="players">
                    <p>Players in this group:</p>
                    <ul>
                        <li v-for="player in props.players" :key="player.id">{{ player.name }} ({{ player.favorite_number }})</li>
                    </ul>
                </TabsContent>
                <TabsContent value="settings">
                    <p>Group Settings</p>
                    <form :action="route('groups.destroy', props.group)" method="post" @submit.prevent="$inertia.delete(route('groups.destroy', props.group))">
                        <input type="hidden" name="_method" value="delete" />
                        <Button variant="destructive" class="mt-4" type="submit">
                            Delete Group
                        </Button>
                    </form>
                </TabsContent>
            </Tabs>
        </main>
    </AppLayout>
</template>
