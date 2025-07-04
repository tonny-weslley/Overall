<script setup lang="ts">
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/components/ui/tabs';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import PlayerDisplay from './components/displayComponents/PlayerDisplay.vue';

const props = defineProps<{
  group: {
    id: string;
    name: string;
    acronym: string;
    description: string;
    created_at: string;
    updated_at: string;
    deleted_at: string | null;
    admin?: boolean;
  };
  players: Array<{
    id: string;
    name: string;
    email: string;
    created_at: string;
    updated_at: string;
    user?: {
      avatar?: string;
      name?: string;
    };
    favorite_number?: number;
  }>;
  invite_code: { code: string } | null;
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
      <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
        {{ props.group.name }}
      </h1>
    </template>

    <main class="flex flex-col items-center justify-start p-6 w-full max-w-4xl mx-auto space-y-6">
      <Tabs defaultValue="overview" class="w-full">
        <!-- Tabs Navigation -->
        <TabsList class="mb-6 bg-gray-100 dark:bg-gray-800 rounded-lg shadow-inner w-full justify-around">
          <TabsTrigger value="overview">Overview</TabsTrigger>
          <TabsTrigger value="financial">Financial Area</TabsTrigger>
          <TabsTrigger value="matches">Matches</TabsTrigger>
          <TabsTrigger value="settings">Settings</TabsTrigger>
        </TabsList>

        <!-- Overview Tab -->
        <TabsContent value="overview">
          <div class="bg-white dark:bg-gray-900 border rounded-xl p-6 shadow w-full space-y-4">
            <div>
              <h2 class="text-xl font-bold">
                {{ props.group.name }} ({{ props.group.acronym }})
              </h2>
              <p class="text-sm text-gray-500">
                {{ props.group.description }}
              </p>
            </div>
            <div v-if="props.invite_code">
              <p class="text-sm">
                <strong>Invite Code:</strong> {{ props.invite_code.code }}
              </p>
            </div>
            <p class="text-xs text-gray-400">
              Created at: {{ new Date(props.group.created_at).toLocaleDateString() }}
            </p>
          </div>

           <div class="flex items-center justify-between flex-col gap-1 mt-4">
            <h2 class="text-lg font-bold mb-2">Players ({{ props.players.length }})</h2>
            <PlayerDisplay
              v-for="player in props.players"
              :key="player.id"
              :player="player"
            />
          </div>
        </TabsContent>

        <!-- financial Tab -->
        <TabsContent value="financial">
          <div class="bg-white dark:bg-gray-900 border rounded-xl p-6 shadow w-full space-y-4">
            <h2 class="text-lg font-bold mb-2">Financial Area</h2>
            <p class="text-sm text-gray-500">
              This area is under construction. Please check back later.
            </p>
          </div>
        </TabsContent>

        <!-- Matches Tab -->
        <TabsContent value="matches">
          <div class="text-center text-gray-500">
            <p>No matches yet.</p>
          </div>
        </TabsContent>

        <!-- Settings Tab -->
        <TabsContent value="settings" class="space-y-4">
          <div class="bg-white dark:bg-gray-900 border rounded-xl p-6 shadow w-full">
            <h2 class="text-lg font-bold mb-2">Group Settings</h2>

            <!-- Exit Group -->
            <form
              :action="route('exit-group', { group_id: props.group.id })"
              method="post"
              @submit.prevent="$inertia.post(route('exit-group', { group_id: props.group.id }))"
            >
              <input type="hidden" name="_method" value="post" />
              <Button variant="destructive" class="mt-2 w-full md:w-auto" type="submit">
                Exit Group
              </Button>
            </form>

            <!-- Delete Group (only admin) -->
            <form
              v-if="props.group.admin"
              :action="route('groups.destroy', props.group)"
              method="post"
              @submit.prevent="$inertia.delete(route('groups.destroy', props.group))"
            >
              <input type="hidden" name="_method" value="delete" />
              <Button variant="destructive" class="mt-2 w-full md:w-auto" type="submit">
                Delete Group
              </Button>
            </form>
          </div>

          <!-- Debug Info -->
          <details class="text-sm text-gray-400">
            <summary class="cursor-pointer hover:text-gray-600">Debug Info</summary>
            <pre class="bg-gray-100 dark:bg-gray-800 rounded p-4 mt-2">
{{ JSON.stringify(props.group, null, 2) }}
            </pre>
          </details>
        </TabsContent>
      </Tabs>
    </main>
  </AppLayout>
</template>
