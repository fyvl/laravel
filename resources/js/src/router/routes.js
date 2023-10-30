import Home from '@/pages/Home.vue';
import News from "@/pages/News.vue";
import Departments from "@/pages/Departments.vue";
import Resources from "@/pages/Resources.vue";
import CreateNews from "@/pages/CreateNews.vue";
import PhoneDir from "@/pages/PhoneDir.vue"
import SpecificNews from "@/pages/SpecificNews.vue";

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
    }
];

export default routes;
