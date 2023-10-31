<script lang="ts">
    import {defineComponent, ref} from 'vue';
    import axios from "axios";

    export default defineComponent({
        components: {},
        setup() {
            const news = ref([]);

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
        created() {
            axios.get('/api/news')
                .then(response => {
                    this.news = response.data;
                    console.log(response.data)
                });
        },
    });
</script>

<template>
    <i @click="navigateToCreation" class="fa-solid fa-plus btn btn-primary mb-3"></i>
    <div class="row">
        <div v-for="item in news">
            <div class="card mb-3" v-if="!item.deleted">
                <div class="card-body">
                    <div class="img-container">
                        <img class="image" :src="'http://localhost:5173/resources/js/src/assets/' + item.img_link">
                    </div>
                    <div class="container">
                        <h5 class="card-title">{{ item.title }}</h5>
                        <hr class="line">
                        <p class="card-text">{{ item.description }}</p>
                        <button @click="navigateToSpec(item.id)" class="btn btn-primary">Перейти</button>
                        <button @click="deleteResource(item.id)" class="btn btn-danger m-1">Удалить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="less">
    .img-container{
        float: left;
        margin-right: 10px;
        padding: 10px;
        width: 17%;
    }

    .image {
        width: auto;
        max-width: 125px;
        height: auto;
    }

    .line {
        margin: 5px;
    }
</style>
