const fetchService = (function () {
  const BASE_API_URL = "ajax/";

  const fetchData = async (endpoint, settings = {}) => {
    const actions = {
      GET: "get",
      POST: "add",
      PUT: "update",
      DELETE: "delete",
      PATCH: "load",
    };

    settings.method = settings.method ?? "GET";

    if (settings.body instanceof FormData) {
      settings.body.append("action", actions[settings.method]);
      settings.body.append("hook", "bee_hook");
    } else {
      settings.body.action = actions[settings.method];
      settings.body.hook = "bee_hook";
    }

    settings.body = settings.headers?.["Content-type"]
      ? JSON.stringify(settings.body)
      : settings.body;
    settings.method = "POST";

    const defaultHeaders = {
      Accept: "application/json",
      "X-Requested-With": "XMLHttpRequest",
    };

    settings.headers = settings.headers
      ? { ...defaultHeaders, ...settings.headers }
      : defaultHeaders;

    try {
      const response = await fetch(BASE_API_URL + endpoint, settings);
      const json = await response.json();
      return response.ok
        ? json
        : Promise.reject({
            status: response.status,
            message: json.msj,
            data: json.data,
          });
    } catch (error) {
      return Promise.reject({
        message: "Ocurrio un error",
      });
    }
  };

  const get = async (endpoint, settings = {}) => fetchData(endpoint, settings);
  const post = async (endpoint, settings = {}) => {
    settings.method = "POST";
    return fetchData(endpoint, settings);
  };
  const put = async (endpoint, settings = {}) => {
    settings.method = "PUT";
    return fetchData(endpoint, settings);
  };
  const del = async (endpoint, settings = {}) => {
    settings.method = "DELETE";
    return fetchData(endpoint, settings);
  };
  const patch = async (endpoint, settings = {}) => {
    settings.method = "PATCH";
    return fetchData(endpoint, settings);
  };

  return {
    get,
    post,
    put,
    delete: del,
    patch,
  };
})();

const postmasterService = (function () {
  const ENDPOINT = "";

  const preinscribir = async (data) => {
    const settings = {
      body: data,
    };
    return await fetchService.post("preinscripcion", settings);
  };

  const getPonentes = async () => {
    return await fetchService.post("get_ponentes_postmaster");
  };

  return {
    preinscribir,
    getPonentes,
  };
})();
