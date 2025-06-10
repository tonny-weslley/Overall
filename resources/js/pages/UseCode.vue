<script lang="ts" setup>
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const page = usePage();
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Use Code',
        href: '/use-code',
    },
];

const form = useForm({
    invite_code: '',
});

function submit() {
    // Send the invite_code as payload
    form.post(route('use-invite-code'));
}
</script>
<template>
    <Head title="Use Code" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <main class="space-y-6 p-6">
            <form @submit.prevent="submit" class="space-y-4">
                <Input
                    type="text"
                    name="invite_code"
                    placeholder="Enter your code"
                    class="w-full"
                    :class="{ 'border-red-500': page.props.errors.invite_code }"
                    v-model="form.invite_code"
                />
                <Button type="submit" class="w-full">Submit</Button>
            </form>
        </main>
    </AppLayout>
</template>
