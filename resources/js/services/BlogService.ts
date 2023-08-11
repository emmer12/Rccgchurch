import ModelService from "@/services/ModelService";

export default class SermonService extends ModelService {
    constructor() {
        super();
        this.url = "/blog";
    }

    getAll(params) {
        return this.get(`${this.url}/get-all`, params);
    }

    getBySlug(slug) {
        return this.get(`${this.url}/get/${slug}`);
    }
}
