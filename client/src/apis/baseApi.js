import axios from "axios";

const baseURL =
  process.env.NODE_ENV === "development"
    ? process.env.REACT_APP_BASE_API_DEV
    : process.env.REACT_APP_BASE_API_RELEASE;

const instance = axios.create({
  baseURL,
});

export default instance;