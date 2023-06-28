import ModelService from "@/services/ModelService";

export default class EventService extends ModelService {
    constructor() {
        super();
        this.url = "/gallery";
    }

    getAll(params) {
        return this.get(`${this.url}/get-all`, params);
    }

    getBySlug(slug) {
        return this.get(`${this.url}/get/${slug}`);
    }
}
