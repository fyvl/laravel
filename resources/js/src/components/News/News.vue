<script>
import {defineComponent, ref, onMounted, computed} from 'vue';
    import axios from "axios";
    import {useStore} from "vuex";

    export default defineComponent({
        props: ['reduced'],
        setup() {
            const news = ref([]);

            const store = useStore();

            const auth = computed(() => store.state.authenticated)

            onMounted(() => {
                axios.get('/api/news')
                    .then((res) => {
                        news.value = res.data;
                    })
                    .catch((error) => {
                        console.error("Error fetching news data:", error);
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

            function navigateToSelf() {
                this.$router.push('/news');
            }

            function navigateToSpec(id) {
                this.$router.push(`/news/${id}`);
            }

            function navigateToCreation() {
                this.$router.push('/news/create');
            }

            return {
                news,
                auth,
                deleteResource,
                navigateToSelf,
                navigateToSpec,
                navigateToCreation
            };
        },
    });
</script>

<template>
    <i v-if="!reduced && auth"  @click="navigateToCreation" class="fa-solid fa-plus btn btn-primary mb-3"></i>
    <div v-for="item in news">
        <div class="card mb-3" v-if="!item.deleted">
            <div class="card-body">
                <div @click="navigateToSpec(item.id)" class="img-container">
                    <img class="image" :src="'http://localhost:5173/resources/js/src/assets/' + item.img_link">
                </div>
                <div class="container">
                    <h5 class="card-title">{{ item.title }}</h5>
                    <hr class="line">
                    <div v-if="reduced" class="card-text">
                        {{ item.description.slice(0, 350) }} . . .
                        <br>
                        <i @click="navigateToSelf" class="arrow-icon fa-solid fa-arrow-right-long fa-2xl"></i>
                    </div>
                    <div v-else class="card-text">{{ item.description }}</div>
                </div>
                <i v-if="!reduced && auth" @click="deleteResource(item.id)" class="del btn btn-lg fa-solid fa-circle-xmark"></i>
            </div>
        </div>
    </div>
</template>

<style scoped lang="less">
    .card-body {
        display: flex;
        min-height: 150px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);

        .img-container {
            margin-right: 10px;
            padding: 10px;
            width: 17%;
            height: 17%;
            cursor: pointer;
            .image {
                max-width: 100%;
            }
        }

        .container {
            .card-text {
                white-space: pre-wrap;
                .arrow-icon {
                    float: right;
                    margin: 25px;
                    cursor: pointer;
                }
            }
            .line {
                margin: 5px;
            }
        }

        .del {
            max-height: 35px;
        }
    }
</style>
