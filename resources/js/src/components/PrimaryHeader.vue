<script>
    import {computed, defineComponent} from 'vue';
    import {useStore} from "vuex";
    import axios from "axios";

	export default defineComponent({
		components: {},
		setup() {
            const store = useStore();
            const auth = computed(() => store.state.authenticated)

            async function logout () {
                await axios.post('/api/logout')

                await store.dispatch('setAuth', false);
            }

            return {
                auth,
                logout
            }
		},
	});
</script>

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
        <div v-if="!auth" class="login nav-item">
            <router-link
                class="nav-link"
                to="/login"
            >
                <i class="fa-solid fa-user"></i>
            </router-link>
        </div>
        <div v-else class="login nav-item">
            <a @click="logout" href="#" class="nav-link">
                <i class="fa-solid fa-right-from-bracket"></i>
            </a>
        </div>
	</header>
</template>

<style lang="less" scoped>
	.header {
        background: rgb(255, 255, 255);
		height: 75px;
		display: flex;
		align-items: center;
        padding: 30px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);

        .logo {
            width: 150px;
            height: auto;
            margin: 50px;
        }

        .links {
            margin-left: 5%;
        }

        .login {
            margin-left: 45%;
        }
	}

    .nav-item {
        margin-right: 20px;
    }

    .nav-link {
        font-weight: bold;
    }

    .dropdown {
        position: relative;
        display: inline-block;

        &-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border: 1px solid rgba(0,0,0,.15);
            border-radius: 5px;
        }

        &:hover &-content {
            display: block;
        }
    }
</style>
