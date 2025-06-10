<script setup lang="ts">
import { Card, CardHeader, CardContent } from '@/components/ui/card';
import { Button } from '../ui/button';
import CardFooter from '../ui/card/CardFooter.vue';

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

</script>

<template>
  <Card class="w-full max-w-md mx-auto shadow-lg rounded-2xl p-4 dark:bg-white bg-gray-800">
    <CardHeader>
      <h2 class="text-2xl font-bold text-gray-800">{{ props.group.name }}</h2>
      <p class="text-sm text-muted-foreground">{{ props.group.acronym }}</p>
    </CardHeader>
    <CardContent>
      <p class="font-semibold text-gray-700"><span >Descrição:</span> {{ props.group.description }}</p>
    </CardContent>
    <CardFooter class="flex justify-end">
      <Button variant="secondary">
        <a :href="route('groups.show', props.group.id)" class="flex items-center gap-1 align-middle" >
          Access
        </a>
      </Button>
    </CardFooter>
  </Card>
</template>
