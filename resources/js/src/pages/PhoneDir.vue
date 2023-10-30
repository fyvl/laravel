<script lang="ts">
    import {defineComponent, ref} from 'vue';
    import axios from "axios";

    export default defineComponent({
        setup() {
            const lastName = ref(null);
            const firstName = ref(null);
            const patronymic = ref(null);

            const people = ref([]);

            function getResults() {
                const query = {};

                if (lastName.value) {
                    query['lastName'] = lastName.value;
                }

                if (firstName.value) {
                    query['firstName'] = firstName.value;
                }

                if (patronymic.value) {
                    query['patronymic'] = patronymic.value;
                }

                axios.get('/api/live-search', { params: query })
                    .then((res) => {
                        people.value = res.data;
                    })
                    .catch((error) => {});
            }

            return {
                lastName,
                firstName,
                patronymic,
                people,
                getResults
            };
        },
    });
</script>

<template>
    <h1>Поиск по базе</h1>
    <form @submit.prevent="getResults">
        <div class="form-group mb-3">
            <label class="m-1">Фамилия</label>
            <input class="form-control" v-model="lastName">
        </div>
        <div class="form-group mb-3">
            <label class="m-1">Имя</label>
            <input class="form-control" v-model="firstName">
        </div>
        <div class="form-group mb-3">
            <label class="m-1">Отчество</label>
            <input class="form-control" v-model="patronymic">
        </div>
        <button type="submit" class="btn btn-primary">Поиск</button>
    </form>
    <div v-if="people.length > 0">
        <table class="table" v-for="person in people" :key="person.id">
            <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
            </tr>
            <tr>
                <td>{{ person.last_name }}</td>
                <td>{{ person.name }}</td>
                <td>{{ person.patronymic }}</td>
            </tr>
        </table>
    </div>
<!--    <div class="mt-3" v-if="people.length > 0">-->
<!--        <div v-for="person in people" :key="person.id">-->
<!--            <h3>{{ person.last_name + ' ' + person.name + ' ' + person.patronymic }}</h3>-->
<!--        </div>-->
<!--    </div>-->
</template>

<style scoped lang="less">
</style>
