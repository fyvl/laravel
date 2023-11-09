import Home from '@/pages/Home.vue';
import News from "@/components/News/News.vue";
import Departments from "@/pages/Departments.vue";
import Resources from "@/pages/Resources.vue";
import CreateNews from "@/components/News/CreateNews.vue";
import PhoneDir from "@/pages/PhoneDir.vue"
import SpecificNews from "@/components/News/SpecificNews.vue"
import Tasks from "@/pages/Tasks.vue";
import Login from "@/components/Auth/Login.vue";


const routes = [
	{
		path: '/',
		component: Home,
	},
    {
        path: '/news',
        component: News,
    },
    {
        path: '/departments',
        component: Departments,
    },
    {
        path: '/resources',
        component: Resources,
    },
    {
        path: '/news/create',
        component: CreateNews,
    },
    {
        path: '/phone-dir',
        component: PhoneDir,
    },
    {
        path: '/news/:id',
        component: SpecificNews,
    },
    {
        path: '/tasks',
        component: Tasks,
    },
    {
        path: '/login',
        component: Login,
    }
];

export default routes;
