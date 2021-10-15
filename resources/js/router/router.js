import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import Category from "../views/Category.vue";
import Contact from "../views/Contact.vue";
import Gallery from "../views/Gallery.vue";
import OrderTours from "../views/OrderTours.vue";
import Comment from "../views/Comment.vue";
import Payment from "../views/Payment.vue";
import Tour from "../views/Tour.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/admin",
    name: "Home",
    component: Home,
  },
  {
    path: "/admin/category",
    name: "Category",
    component: Category,
    props:true,
  },
  {
    path: "/admin/contact",
    name: "Contact",
    component: Contact,
    props:true,
  },
  {
    path: "/admin/gallery",
    name: "Gallery",
    component: Gallery,
    props:true,
  },
  {
    path: "/admin/orderTours",
    name: "OrderTours",
    component: OrderTours,
    props:true,
  },
  {
    path: "/admin/tourComments",
    name: "Comment",
    component: Comment,
    props:true,
  },

  {
    path: "/admin/payment",
    name: "Payment",
    component: Payment,
    props:true,
  },
  {
    path: "/admin/tour",
    name: "Tour",
    component: Tour,
    props:true,
  },

];

const router = new VueRouter({
  mode: "history",
  routes,
});

export default router;