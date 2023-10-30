<script lang="ts">
import {defineComponent, ref} from 'vue';
import axios from "axios";

export default defineComponent({
    setup() {
        const keyword = ref(null);
        const people = ref([]);

        function getResults() {
            axios.get('/api/live-search', { params: { keyword: keyword.value } })
                .then((res) => {
                    people.value = res.data;
                })
                .catch((error) => {});
        }

        return {
            keyword,
            people,
            getResults
        };
    },
});
</script>

<template>
    <h1>Поиск по базе</h1>
    <form @submit.prevent="getResults">
    <!--        <div class="form-group mb-3">-->
<!--            <label class="m-1">Фамилия</label>-->
<!--            <input class="form-control">-->
<!--        </div>-->
        <div class="form-group mb-3">
            <label class="m-1">Имя</label>
            <input class="form-control" v-model="keyword">
        </div>
<!--        <div class="form-group mb-3">-->
<!--            <label class="m-1">Отчество</label>-->
<!--            <input class="form-control">-->
<!--        </div>-->
        <button type="submit" class="btn btn-primary">Поиск</button>
    </form>
    <div class="mt-3" v-if="people.length > 0">
        <div v-for="person in people" :key="person.id">
            <h3>{{ person.last_name + ' ' + person.name + ' ' + person.patronymic }}</h3>
        </div>
    </div>
</template>

<style scoped lang="less">

</style>
