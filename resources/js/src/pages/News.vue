<script lang="ts">
    import { defineComponent } from 'vue';
    import axios from "axios";

    export default defineComponent({
        components: {},
        setup() {
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

            return {
                deleteResource
            };
        },
        data() {
            return {
                news: []
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
    <button class="btn btn-primary mb-3">
        <router-link
            class="nav-link"
            to="/news/create"
        >Добавить
        </router-link>
    </button>
    <div class="row">
        <div class="col-sm-6" v-for="item in news">
            <div class="card mb-3" v-if="!item.deleted">
                <div class="card-body">
                    <h5 class="card-title">{{ item.title }}</h5>
                    <p class="card-text">{{ item.description }}</p>
                    <a href="" class="btn btn-primary">Перейти</a>
                    <button @click="deleteResource(item.id)" class="btn btn-danger m-1">Delete</button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="less">
</style>
