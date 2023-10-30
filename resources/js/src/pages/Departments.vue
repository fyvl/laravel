<script lang="ts">
import { defineComponent } from 'vue';
import axios from "axios";

export default defineComponent({
    components: {},
    setup() {
        return {};
    },
    data() {
        return {
            departments: []
        };
    },
    created() {
        axios.get('/api/departments')
            .then(response => {
                this.departments = response.data;
                console.log(response.data)
            });
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
