<script>
export default {
    name: "UrlShortenerResult",
    props: {
        urls: Array
    },
};
</script>

<template>
    <div class="section-result">
        <div class="section-result-full-input-button-container">
            <label class="section-result-label">
                Your generated short urls:
            </label>
            <ul class="section-result-ul">
                <li v-for="(url, index) in urls" :key="index">
                    Hash : <a :href="url.url">https://example.com/{{ url.hash }}</a> URL : {{ url.url }}
                </li>
            </ul>
        </div>
    </div>
</template>

<style scoped>
.section-result {
    display: flex;
    flex-direction: column;
    width: 100%;
    gap: 25px;

    .section-result-full-input-button-container {
        display: flex;
        flex-direction: column;
        gap: 12px;

        .section-result-label {
            font-size: 0.95rem;
            text-shadow: 2.5px 2.5px var(--text-shadow-color);
        }

        .section-result-ul {
            text-wrap: nowrap;
            overflow: hidden;
            text-align: left;
        }
    }
}
</style>
