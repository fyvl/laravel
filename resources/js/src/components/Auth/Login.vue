<script>
import {defineComponent, ref} from 'vue';
import axios from "axios";

	export default defineComponent({
		setup() {
            const email = ref('');
            const password = ref('');

            async function formSubmit() {
                await axios.post('/api/login', {
                    email: email.value,
                    password: password.value
                })

                await this.$router.push('/');
            }

			return {
                email,
                password,
                formSubmit
            };
		},
	});
</script>

<template>
    <div class="login-form">
        <form @submit.prevent="formSubmit">
            <div class="form-group mb-3">
                <label class="m-1">Логин</label>
                <input v-model="email" class="form-control" type="email" placeholder="Почта" required>
            </div>
            <div class="form-group mb-3">
                <label class="m-1">Пароль</label>
                <input v-model="password" class="form-control" type="password" placeholder="Пароль" required>
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
</template>

<style lang="less" scoped>
    .login-form {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
