import ModelService from "@/services/ModelService";

export default class EventService extends ModelService {
    constructor() {
        super();
        this.url = "/events";
    }
}
