<script>
    import {defineComponent, ref} from "vue";
    import axios from "axios";

    export default defineComponent({
        components: {},
        setup() {
            const news = ref([]);

            return {
                news
            };
        },
        created() {
            const newsId = this.$route.params.id;

            axios.get(`/api/news/${newsId}`)
                .then(response => {
                    this.news = response.data;
                    console.log(response.data)
                });
        },
    })
</script>

<template>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ news.title }}</h3>
            <h5 class="card-text">{{ news.description }}</h5>
        </div>
    </div>
</template>

<style scoped lang="less">
</style>
