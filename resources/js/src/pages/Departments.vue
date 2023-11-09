<script lang="ts">
    import { defineComponent, ref, onMounted } from 'vue';
    import axios from "axios";

    export default defineComponent({
        setup() {
            const departments = ref([])

            onMounted(() => {
                axios.get('/api/departments')
                    .then((res) => {
                        departments.value = res.data;
                    })
                    .catch((error) => {
                        console.error("Error fetching departments data:", error);
                    });
            });

            return {
                departments
            };
        },
    });
</script>

<template>
    <div class="row">
        <div class="col-sm-6" v-for="item in departments">
            <div class="card mb-3">
                <div class="card-body">
                    <a href="#"><h5 class="card-title">{{ item.name }}</h5></a>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="less">
</style>
