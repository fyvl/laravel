<script>
    import { defineComponent, reactive } from "vue";
    import axios from "axios";

    export default defineComponent({
        setup() {
            const formData = reactive({
                title: '',
                description: '',
                img_link: ''
            })

            function formSubmit() {
                axios.post('/api/formSubmit', formData)

                this.$router.push('/news');
            }

            return {
                formData,
                formSubmit
            };
        },
    });
</script>

<template>
    <form @submit.prevent="formSubmit">
        <div class="form-group mb-3">
            <label class="m-1">Название</label>
            <input class="form-control" placeholder="Введите название" v-model="formData.title">
        </div>
        <div class="form-group mb-3">
            <label class="m-1">Описание</label>
            <textarea class="form-control" placeholder="Описание" v-model="formData.description" rows="5"></textarea>
        </div>
        <div class="form-group mb-3">
            <label class="m-1">Картинка</label>
            <input class="form-control" placeholder="Введите название изображения" v-model="formData.img_link">
        </div>
        <button type="submit" class="btn btn-primary">Подтвердить</button>
    </form>
</template>

<style scoped lang="less">
</style>
