<script lang="ts">
    import { defineComponent, ref, onMounted } from 'vue';
    import axios from "axios";

    export default defineComponent({
        setup() {
            const news = ref([]);

            onMounted(() => {
                axios.get('/api/news')
                    .then((res) => {
                        news.value = res.data;
                    })
                    .catch((error) => {
                        console.error("Error fetching weather data:", error);
                    });
            });

            function deleteResource(id) {
                axios.delete(`/api/news/${id}`)
                    .then((response) => {
                        console.log(response.data.message);

                        const deletedItem = this.news.find(item => item.id === id);
                        if (deletedItem) {
                            deletedItem.deleted = true;
                        }
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            }

            function navigateToSpec(id) {
                this.$router.push(`/news/${id}`);
            }

            function navigateToCreation() {
                this.$router.push('/news/create');
            }

            return {
                news,
                deleteResource,
                navigateToSpec,
                navigateToCreation
            };
        },
    });
</script>

<template>
    <i @click="navigateToCreation" class="fa-solid fa-plus btn btn-primary mb-3"></i>
    <div class="row">
        <div v-for="item in news">
            <div class="card mb-3" v-if="!item.deleted">
                <div class="card-body">
                    <div @click="navigateToSpec(item.id)" class="img-container">
                        <img class="image" :src="'http://localhost:5173/resources/js/src/assets/' + item.img_link">
                    </div>
                    <div class="container">
                        <h5 class="card-title">{{ item.title }}</h5>
                        <hr class="line">
                        <p class="card-text">{{ item.description }}</p>
                    </div>
                        <i @click="deleteResource(item.id)" class="btn btn-lg fa-solid fa-circle-xmark"></i>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="less">
    .card-body {
        display: flex;
        justify-content: space-between;
        min-height: 150px;
    }

    .img-container{
        margin-right: 10px;
        padding: 10px;
        width: 17%;
        cursor: pointer;
    }

    .image {
        max-width: 100%;
    }

    .line {
        margin: 5px;
    }
</style>
