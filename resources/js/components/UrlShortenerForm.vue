<script>
import InputText from "./InputText.vue";
import Button from "./Button.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { ref } from "vue";

export default {
    name: "UrlShortenerForm",
    components: {
        InputText,
        Button,
    },
    setup() {
        const shortUrlForm = useForm({
            url: null
        });

        const postGenerateShortUrl = () => {
            shortUrlForm.post(route("generateShortUrl"), {
                onSuccess: () => {
                    shortUrlForm.reset("url");

                    const { success, throwable } = usePage().props.flash;
                    success ? alert(success) : alert(throwable);
                },
            });
        };

        return {
            shortUrlForm,
            postGenerateShortUrl,
        };
    },
};
</script>

<template>
    <form @submit.prevent="postGenerateShortUrl" class="section-form">
        <InputText
            label="Enter your url:"
            name="url"
            id="url"
            placeholder="https://example.com"
            v-model="shortUrlForm.url"
            :error="shortUrlForm.errors.url"
        />
        <div class="section-form-submit-button-container">
            <Button
                type="submit"
                :disabled="shortUrlForm.processing"
                name="Generate"
                icon="fa-solid fa-bolt"
            />
        </div>
    </form>
</template>

<style scoped>
.section-form {
    display: flex;
    flex-direction: column;
    width: 100%;
    gap: 25px;

    .section-form-submit-button-container {
        display: flex;
        justify-content: center;
        width: inherit;
        margin-top: 20px;
    }
}
</style>
