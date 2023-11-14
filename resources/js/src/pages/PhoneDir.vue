<script>
    import {computed, defineComponent, reactive, ref} from 'vue';
    import axios from "axios";

    export default defineComponent({
        setup() {
            const searchForm = reactive({
                last_name: null,
                name: null,
                patronymic: null,
                position: null,
                phone: null,
                email: null,
            });

            const people = ref([]);
            const pageInfo = ref([]);
            const currentPage = ref(1);

            function getResults() {
                const query = { ...searchForm, page: currentPage.value };

                const hasSearchParameters = Object.keys(query)
                    .filter(key => key !== "page")
                    .some(key => query[key]);

                if (hasSearchParameters) {
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

            const totalPages = computed(() => pageInfo.value.last_page);

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
                Object.keys(searchForm).forEach(key => {
                    searchForm[key] = null;
                });
                people.value = [];
                pageInfo.value = [];
                currentPage.value = 1;
            }

            return {
                searchForm,
                people,
                pageInfo,
                currentPage,
                totalPages,
                getResults,
                nextPage,
                prevPage,
                resetForm,
            };
        },
    });
</script>

<template>
    <h1>Поиск по базе</h1>
    <form @submit.prevent="getResults" @reset="resetForm">
        <div class="form-group mb-3">
            <label class="m-1">Фамилия</label>
            <input class="form-control" v-model="searchForm.last_name">
        </div>
        <div class="form-group mb-3">
            <label class="m-1">Имя</label>
            <input class="form-control" v-model="searchForm.name">
        </div>
        <div class="form-group mb-3">
            <label class="m-1">Отчество</label>
            <input class="form-control" v-model="searchForm.patronymic">
        </div>
        <div class="form-group mb-3">
            <label class="m-1">Должность</label>
            <input class="form-control" v-model="searchForm.position">
        </div>
        <div class="form-group mb-3">
            <label class="m-1">Телефон</label>
            <input class="form-control" v-model="searchForm.phone">
        </div>
        <div class="form-group mb-3">
            <label class="m-1">Email</label>
            <input class="form-control" v-model="searchForm.email">
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
                    <th>Должность</th>
                    <th>Телефон</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="person in people" :key="person.id">
                    <td>{{ person.last_name }}</td>
                    <td>{{ person.name }}</td>
                    <td>{{ person.patronymic }}</td>
                    <td>{{ person.position }}</td>
                    <td>{{ person.phone }}</td>
                    <td>{{ person.email }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div v-else class="mt-3">
        <h3>Нет результатов, пожалуйста введите данные.</h3>
    </div>
</template>

<style scoped lang="less">
    table {
        border: 1px solid #ccc
    }
</style>
