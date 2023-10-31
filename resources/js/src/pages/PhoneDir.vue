<script lang="ts">
    import {defineComponent, ref} from 'vue';
    import axios from "axios";

    export default defineComponent({
        setup() {
            const lastName = ref(null);
            const firstName = ref(null);
            const patronymic = ref(null);
            const phone = ref(null);
            const position = ref(null);

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

                if (phone.value) {
                    query['phone'] = phone.value;
                }

                if (position.value) {
                    query['position'] = position.value;
                }

                if (Object.keys(query).length > 0) {
                    axios.get('/api/live-search', { params: query })
                        .then((res) => {
                            people.value = res.data;
                        })
                        .catch((error) => {});
                } else {
                  people.value = [];
                }
            }

            return {
                lastName,
                firstName,
                patronymic,
                phone,
                position,
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
        <div class="form-group mb-3">
            <label class="m-1">Телефон</label>
            <input class="form-control" v-model="phone">
        </div>
        <div class="form-group mb-3">
            <label class="m-1">Должность</label>
            <input class="form-control" v-model="position">
        </div>
        <button type="submit" class="btn btn-primary">Поиск</button>
    </form>
    <div v-if="people.length > 0">
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Отчество</th>
                    <th>Телефон</th>
                    <th>Должность</th>
                </tr>
            </thead>
            <tbody v-for="person in people" :key="person.id">
                <tr>
                    <td>{{ person.last_name }}</td>
                    <td>{{ person.name }}</td>
                    <td>{{ person.patronymic }}</td>
                    <td>{{ person.phone }}</td>
                    <td>{{ person.position }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div v-else class="mt-3">
        <h3>Нет результатов, пожалуйста введите данные.</h3>
    </div>
</template>

<style scoped lang="less">
</style>
