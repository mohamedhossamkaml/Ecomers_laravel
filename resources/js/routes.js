import login from './style/LoginComponents'
import home from './style/HomeComponents'
import homepage from './style/HomePageComponents'
import content from './style/ContentComponents'
import product from './components/blgins/product'



export default [
    {
        path: '/new_laravel/public/user/login',
        component: login ,
        name: 'login'
    },
    {
        path: '/new_laravel/public/user',
        component:  homepage ,
        name: 'homepage'
    },
    {
        path: '/new_laravel/public/user/cats',
        component:  product ,
        name: 'product'
    },
    {
        path: '/new_laravel/public/',
        component:  content ,
        name: 'content'
    },
]
