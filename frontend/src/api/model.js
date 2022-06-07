import api from '.';

async function getFromApi(endpoint) {
    try {
        const axiosResponse = await api.get(endpoint);
        return axiosResponse.data;
    } catch(error) {
        throw error;
    }
}

async function postToApi(endpoint, data) {
    try {
        const axiosResponse = await api.post(endpoint, data);
        return axiosResponse.data;
    } catch(error) {
        throw error;
    }
}

export async function getItems() {
    return getFromApi('/items');
}

export async function getEstimates() {
    return getFromApi('/estimates');
}

export async function getEstimate(id) {
    return getFromApi(`/estimates/${id}`);
}

export async function createEstimate(data) {
    return postToApi('/estimates', data);
}
