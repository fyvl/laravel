<script lang="ts">
import {computed, defineComponent, ref} from 'vue';
    import axios from "axios";

    export default defineComponent({
        setup() {
            const lastName = ref(null);
            const firstName = ref(null);
            const patronymic = ref(null);
            const phone = ref(null);
            const position = ref(null);

            const people = ref([]);
            const pageInfo = ref([]);
            const currentPage = ref(1);

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

                query['page'] = currentPage.value;

                if (Object.keys(query).length == 2) {
                    axios.get('/api/live-search', { params: query })
                        .then((res) => {
                            people.value = res.data.data;
                            pageInfo.value = res.data;
                            currentPage.value = res.data.current_page;
                        })
                        .catch((error) => {});
                } else {
                  people.value = [];
                }
            }

            const totalPages = computed(() => {
                return pageInfo.value.last_page;
            });

            function prevPage() {
                if (currentPage.value > 1) {
                    currentPage.value--;
                    getResults();
                }
            }

            function nextPage() {
                if (currentPage.value < totalPages.value) {
                    currentPage.value++;
                    getResults();
                }
            }

            function resetForm() {
                lastName.value = '';
                firstName.value = '';
                patronymic.value = '';
                phone.value = '';
                position.value = '';
                people.value = [];
                pageInfo.value = [];
                currentPage.value = 1;
            }

            return {
                lastName,
                firstName,
                patronymic,
                phone,
                position,
                people,
                pageInfo,
                getResults,
                resetForm,
                currentPage,
                totalPages,
                nextPage,
                prevPage,
            };
        },
    });
</script>

<template>
    <h1>Поиск по базе</h1>
    <form @submit.prevent="getResults" @reset="resetForm">
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
        <button type="submit" class="btn btn-primary m-1">Поиск</button>
        <button type="reset" class="btn btn-primary m-1">Очистить</button>
    </form>
    <div v-if="Object.keys(pageInfo).length > 0 && people.length > 0" class="d-flex justify-content-center mt-3">
        <button @click="prevPage" :disabled="pageInfo.current_page === 1" class="btn btn-sm">
            <i class="fa-solid fa-arrow-left"></i>
        </button>
        <span class="mx-3">
        Страница {{ pageInfo.current_page }} из {{ pageInfo.last_page }}
      </span>
        <button
            @click="nextPage"
            :disabled="pageInfo.current_page === pageInfo.last_page"
            class="btn btn-sm"
        >
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>
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
            <tbody>
                <tr v-for="person in people" :key="person.id">
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
