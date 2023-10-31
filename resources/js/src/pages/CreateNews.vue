<script>
    import { defineComponent, ref } from "vue";
    import axios from "axios";

    export default defineComponent({
        components: {},
        setup() {
            const title = ref('');
            const description = ref('');

            function formSubmit(e) {
                e.preventDefault();

                axios.post('/api/formSubmit', {
                    title: title.value,
                    description: description.value,
                })

                this.$router.push('/news');
            }

            return {
                title,
                description,
                formSubmit
            };
        },
    });
</script>

<template>
    <form @submit="formSubmit">
        <div class="form-group mb-3">
            <label class="m-1">Название</label>
            <input class="form-control" placeholder="Введите название" v-model="title">
        </div>
        <div class="form-group mb-3">
            <label class="m-1">Описание</label>
            <textarea class="form-control" placeholder="Описание" v-model="description" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Подтвердить</button>
    </form>
</template>

<style scoped lang="less">
</style>
