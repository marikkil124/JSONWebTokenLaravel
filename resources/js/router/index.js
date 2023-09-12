
import {createRouter,createWebHistory} from "vue-router";

const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history:createWebHistory(import.meta.env.BASE_URL),
   routes:[
       {
           path:'/register',
           component:()=>import('../views/register.vue')
       },
       {
           path:'/fruits',
           component:()=>import('../views/fruits/index.vue')
       },
       {
           path:'/login',

           component:()=>import('../views/login.vue')
       } ,
       {
           path:'/personal',
           component:()=>import('../views/personal.vue')
       },
          {
           path:'/:pathMatch(.*)*',
           component:()=>import('../views/personal.vue')
       }

   ]
})
router.beforeEach((to, from, next)=>{

    const accessToken = localStorage.getItem('access_token');

    if (!accessToken)
    {
        if (to.path ==='/login' || to.path==='/register')

        {
            return next()
        }
        else
        {
            return next({path:'/login'})
        }
    }
    if (to.path=='/login' && accessToken)
        return next({path:'/personal'})

        next()


} );
export default router

