<script>
import { defineComponent, ref } from "vue";
import axios from "axios";
import router from "@/router/router.js";

export default defineComponent({
    components: {},
    setup() {
        const title = ref('');
        const description = ref('');
        const link = ref('');

        function formSubmit(e) {
            e.preventDefault();

            axios.post('/api/formSubmit', {
                title: title.value,
                description: description.value,
                link: link.value
            })

            // title.value = '';
            // description.value = '';
            // link.value = '';

            this.$router.push('/news');
        }

        return {
            title,
            description,
            link,
            formSubmit
        };
    },
    data() {
        return {
            title: '',
            description: '',
            link: ''
        };
    }
})
</script>

<template>
    <form @submit="formSubmit">
        <div class="form-group mb-3">
            <label class="m-1">Название</label>
            <input class="form-control" placeholder="Введите название" v-model="title">
        </div>
        <div class="form-group mb-3">
            <label class="m-1">Описание</label>
            <input class="form-control" placeholder="Описание" v-model="description">
        </div>
        <div class="form-group mb-3">
            <label class="m-1">Ссылка</label>
            <input class="form-control" placeholder="Ссылка" v-model="link">
        </div>
        <button type="submit" class="btn btn-primary">Подтвердить</button>
    </form>
</template>

<style scoped lang="less">

</style>
