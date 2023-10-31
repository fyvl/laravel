<template>
	<header class="header">
        <router-link
            aria-current="page"
            class="nav-link"
            to="/"
        >
            <img src="../assets/logo.svg" alt="" class="logo">
        </router-link>
        <div class="links">
            <ul class="header__menu nav nav-pills">
                <li class="nav-item">
                    <router-link
                        aria-current="page"
                        class="nav-link"
                        to="/"
                    >Главная
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link
                        class="nav-link"
                        to="/news"
                    >Новости
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link
                        class="nav-link"
                        to="/departments"
                    >Отделы
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link
                        class="nav-link"
                        to="/resources"
                    >Ресурсы
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link
                        class="nav-link"
                        to="/phone-dir"
                    >Телефоны
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link
                        aria-current="page"
                        class="nav-link"
                        to="/tasks"
                    >Задачи
                    </router-link>
                </li>
            </ul>
        </div>
	</header>
</template>

<script lang="ts">
	import { defineComponent } from 'vue';

	export default defineComponent({
		components: {},
		setup() {
			return {};
		},
	});
</script>

<style lang="less" scoped>
	.header {
        background: #a5c1e3;
		margin: 0 auto;
		height: 100px;
		display: flex;
		align-items: center;
	}
    .links {
        padding: 5px;
    }
    .logo {
        padding: 100px;
    }
</style>
