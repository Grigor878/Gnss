export const API_BASE_URL =
  process.env.NODE_ENV === "development"
    ? process.env.REACT_APP_BASE_API_DEV
    : process.env.REACT_APP_BASE_API_RELEASE;

export const APP_BASE_URL =
  process.env.NODE_ENV === "development"
    ? process.env.REACT_APP_BASE_URL_DEV
    : process.env.REACT_APP_BASE_URL_RELEASE;

