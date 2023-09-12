import axios from "axios";
import router from "@/router/index.js";


function AllowAccess() {
    let axi = axios.create();
    axi.interceptors.request.use(config => {
        if (localStorage.getItem('access_token'))
        config.headers.Authorization = `Bearer ${localStorage.getItem('access_token')}`
        return config;
    }, error => {
        console.log( error.response);
        return error;
    });

    axi.interceptors.response.use({}, error => {

        if (error.response.data.message === 'Token has expired')
        {
            axios.post('/api/auth/refresh',{},{
                headers:{
                    'authorization':`Bearer ${localStorage.getItem('access_token')}`
                }
            }).then(res=>{
                localStorage.setItem('access_token',res.data.access_token)
                error.config.headers.authorization = res.data.access_token;
                console.log(error.config);
                return axi.request(error.config);
            })

        }
             if (error.response.status === 401 )
                 router.push('/login');


    });

    return axi;
}

export default AllowAccess
