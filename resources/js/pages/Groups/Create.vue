<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Textarea } from '@/components/ui/textarea';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Groups', href: '/groups' },
  { title: 'Create', href: '/groups/create' },
];

const form = useForm('Group/Store', {
    name: '',
    acronym: '',
    description: '',
});

const handleSubmit = () => {
  form.post(route('groups.store'), {
    onSuccess: () => {
      form.reset();
      // Optionally redirect or show a success message
    },
    onError: (errors) => {
      // Handle errors if needed
      console.error(errors);
    },
  });
}
</script>

<template>
  <Head title="Create Group" />
  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="flex flex-col px-6 py-8 space-y-6 max-w-2xl mx-auto">
      <h1 class="text-2xl font-semibold tracking-tight">Create New Group</h1>

      <form @submit.prevent="handleSubmit" class="space-y-6">
        <div class="space-y-2">
          <Label for="name">Name</Label>
          <Input
            id="name"
            v-model="form.name"
            type="text"
            placeholder="e.g., Friendly Soccer Club"
          />
        </div>

        <div class="space-y-2">
          <Label for="acronym">Acronym</Label>
          <Input
            id="acronym"
            v-model="form.acronym"
            type="text"
            placeholder="e.g., FSC"
          />
        </div>

        <div class="space-y-2">
          <Label for="description">Description</Label>
          <Textarea
            id="description"
            v-model="form.description"
            rows="4"
            placeholder="A brief description of the .."
          />
        </div>
        <div class="flex justify-end">
          <Button type="submit" :disabled="form.processing">Create Group</Button>
        </div>

        <div v-if="Object.keys(form.errors).length" class="rounded-md bg-red-50 dark:bg-red-900/20 p-4 text-sm text-red-700 dark:text-red-400">
          <ul class="space-y-1">
            <li v-for="(error, key) in form.errors" :key="key">
              {{ error }}
            </li>
          </ul>
        </div>
      </form>
    </div>
  </AppLayout>
</template>
