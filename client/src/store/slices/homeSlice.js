import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import cookies from "js-cookie";
import baseApi from "../../apis/baseApi";

const initialState = {
  language: cookies.get("gnsss_i18next") || "am",
  routes: [],
};

// get header routes
export const getHeaderRoutes = createAsyncThunk("home", async (lang) => {
  try {
    const { data } = await baseApi.post(`getHeaderItems/${lang}`);
    return data;
  } catch (err) {
    console.log(`Get Header Routes Error: ${err.message}`);
  }
});

const homeSlice = createSlice({
  name: "home",
  initialState,
  reducers: {
    // set global language
    setLanguage: (state, action) => {
      state.language = action.payload;
    },
  },
  extraReducers: (builder) => {
    builder.addCase(getHeaderRoutes.fulfilled, (state, action) => {
      state.routes = action.payload;
    });
  },
});

export const { setLanguage } = homeSlice.actions;

export default homeSlice.reducer;
