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
                <li class="nav-item">
                    <a
                        aria-current="page"
                        class="nav-link"
                        href="http://jira.biryusa.corp:8080/servicedesk/customer/portal/6"
                    >Заявки
                    </a>
                </li>
                <li class="dropdown">
                    <button class="nav-link">Информация</button>
                    <div class="dropdown-content">
                        <router-link
                            class="nav-link"
                            to="/departments"
                        >Отделы
                        </router-link>
                        <router-link
                            class="nav-link"
                            to="/resources"
                        >Ресурсы
                        </router-link>
                    </div>
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
        background: rgba(162,179,212,255);
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

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        border-radius: 5px;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>
