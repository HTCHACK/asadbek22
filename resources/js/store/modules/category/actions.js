import Travel from "../../../api/Travel";

export const getCategories = ({ commit }) => {
    Travel.tourCategory().then((response) => {
        commit("SET_TOUR_CATEGORY", response.data.all);
    });
};

export const getUser = ({ commit }) => {
    Travel.user().then((response) => {
        commit("SET_USER", response.data.all);
    });
};

export const getContacts = ({ commit }) => {
    Travel.contacts().then((response) => {
        commit("SET_CONTACTS", response.data.all);
    });
};

export const getorders = ({ commit }) => {
    Travel.orders().then((response) => {
        commit("SET_ORDERS", response.data.all);
    });
};

export const getGallery = ({ commit }) => {
    Travel.galleries().then((response) => {
        commit("SET_GALLERY", response.data.all);
    });
};

export const getTours = ({ commit }) => {
    Travel.tours().then((response) => {
        commit("SET_TOURS", response.data.all);
    });
};

export const getComments = ({ commit }) => {
    Travel.comments().then((response) => {
        commit("SET_COMMENTS", response.data.all);
    });
};
