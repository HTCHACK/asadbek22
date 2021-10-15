import Api from "./api";
import NProgress from "nprogress";

const TOUR_CATEGORY = "tour_categories";
const USER_GET = "users";
const CONTACTS = "contacts";
const ORDERS = "orders";
const GALLERY = "galleries";
const TOURS = "tours";
const COMMENTS = "comments";

Api.interceptors.request.use((config) => {
    NProgress.start();
    return config;
});

Api.interceptors.response.use((response) => {
    NProgress.done();
    return response;
});

export default {
    tourCategory() {
        return Api.get(TOUR_CATEGORY);
    },

    user()
    {
        return Api.get(USER_GET);
    },

    contacts()
    {
        return Api.get(CONTACTS);
    },

    orders()
    {
        return Api.get(ORDERS);
    },

    galleries()
    {
        return Api.get(GALLERY);
    },

    tours()
    {
        return Api.get(TOURS);
    },

    comments()
    {
        return Api.get(COMMENTS);
    },


};
