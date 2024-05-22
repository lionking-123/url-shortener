<script>
export default {
    name: "AppLayout",
};
</script>

<template>
    <main class="container">
        <slot />
    </main>
</template>

<style>
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 30px;
    }

    .v-enter-active {
        transition: opacity 300ms ease;
    }

    .v-leave-active {
        transition: opacity 200ms ease;
    }

    .v-enter-from,
    .v-leave-to {
        opacity: 0;
    }
</style>
