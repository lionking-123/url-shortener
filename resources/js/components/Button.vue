<script>
export default {
    name: "Button",
    props: {
        type: {
            default: "button",
            type: String,
        },
        disabled: {
            default: false,
            type: Boolean,
        },
        name: String,
        icon: String,
    },
};
</script>

<template>
    <button :type="type" :disabled="disabled" class="button">
        <font-awesome-icon :icon="icon" class="button-icon" />
        {{ name }}
    </button>
</template>

<style scoped>
.button {
    height: 2.7rem;
    padding-inline: 20px;
    background-color: var(--button-color);
    color: var(--secondary-color);
    font-size: 1rem;
    font-weight: 600;
    border: none;
    box-shadow: 4px 4px var(--box-shadow-color);
    outline: none;
    transition: all 300ms ease;
    opacity: 0.8;

    &:hover,
    &:focus {
        opacity: 1;
    }

    &:disabled {
        opacity: 0.5;
    }

    @media (max-width: 520px) {
        width: 100%;
    }

    .button-icon {
        font-size: 1.1rem;
        filter: invert(100%) saturate(0%);
    }
}
</style>
