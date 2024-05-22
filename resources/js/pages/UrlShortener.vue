<script>
import AppLayout from "../layouts/AppLayout.vue";
import UrlShortenerForm from "../components/UrlShortenerForm.vue";
import UrlShortenerResult from "../components/UrlShortenerResult.vue";

export default {
    name: "UrlShortener",
    props: {
        urls: Array
    },
    components: {
        AppLayout,
        UrlShortenerForm,
        UrlShortenerResult,
    },
};
</script>

<template>
    <AppLayout>
        <div class="information">
            <h1 class="information-title">URL Shortener</h1>
            <p class="information-description">
                Generate a short url from your url.
            </p>
        </div>
        <section class="section">
            <UrlShortenerForm />
        </section>
        <Transition>
            <section class="section">
                <UrlShortenerResult :urls="urls" />
            </section>
        </Transition>
    </AppLayout>
</template>

<style scoped>
    .information {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 6px;

        .information-title {
            font-size: 2.4rem;
            text-shadow: 4px 4px var(--box-shadow-color);
        }

        .information-description {
            font-size: 1.2rem;
            text-shadow: 3px 3px var(--box-shadow-color);
        }
    }

    .section {
        width: clamp(320px, 85vw, 700px);
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: var(--section-background-color);
        box-shadow: 10px 10px var(--box-shadow-color);
        padding: 2.5rem 3rem;
    }
</style>
