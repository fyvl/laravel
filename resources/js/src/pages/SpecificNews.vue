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
            <div class="img-container">
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
    }

    .image {
        width: auto;
        max-width: 125px;
        height: auto;
    }
</style>
