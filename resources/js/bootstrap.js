import _ from "lodash";
window._ = _;

// Axios for HTTP requests
import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
