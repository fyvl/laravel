<script>
    import {defineComponent, onMounted, ref} from "vue";
    import axios from "axios";
    import {useRoute} from "vue-router";

    export default defineComponent({
        setup() {
            const news = ref([]);
            const route = useRoute();

            onMounted(() => {
                const newsId = route.params.id;

                axios.get(`/api/news/${newsId}`)
                    .then((res) => {
                        news.value = res.data;
                    })
                    .catch((error) => {
                        console.error("Error fetching news data:", error);
                    });
            });

            return {
                news
            };
        },
    })
</script>

<template>
    <div class="card">
        <div class="card-body">
            <div class="img-container" v-if="news.img_link">
                <img class="image" :src="'http://localhost:5173/resources/js/src/assets/' + news.img_link">
            </div>
            <div class="container">
                <h5 class="card-title">{{ news.title }}</h5>
                <p class="card-text">{{ news.description }}</p>
            </div>
        </div>
    </div>
</template>

<style scoped lang="less">
    .img-container{
        float: left;
        margin-right: 10px;
        padding: 10px;
        .image {
            max-width: 100%;
        }
    }

    .card-text {
        white-space: pre-wrap;
    }
</style>
