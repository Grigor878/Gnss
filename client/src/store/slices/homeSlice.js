import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import cookies from "js-cookie";
import baseApi from "../../apis/baseApi";

const initialState = {
  language: cookies.get("gnsss_i18next") || "am",
  routes: [],
  categories: [],
  subCategories: [],
};

// get header routes
export const getHeaderRoutes = createAsyncThunk("home", async (lang) => {
  try {
    const { data } = await baseApi.get(`getHeaderItems/${lang}`);
    return data;
  } catch (err) {
    console.log(`Get Header Routes Error: ${err.message}`);
  }
});

// get categories
export const getCategories = createAsyncThunk(
  "home/categories",
  async (language) => {
    try {
      const { data } = await baseApi.get(`getCategories/${language}`);
      return data;
    } catch (err) {
      console.log(`Get Categories Error: ${err.message}`);
    }
  }
);
// get sub categories
export const getSubCategories = createAsyncThunk(
  "home/subCategories",
  async ({ id, language }) => {
    try {
      const { data } = await baseApi.get(`getSubcategories/${id}/${language}`);
      return data;
    } catch (err) {
      console.log(`Get Sub Categories Error: ${err.message}`);
    }
  }
);

const homeSlice = createSlice({
  name: "home",
  initialState,
  reducers: {
    // set global language
    setLanguage: (state, action) => {
      state.language = action.payload;
    },
    // set global language
    clearSubCategories: (state, action) => {
      state.subCategories = [];
    },
  },
  extraReducers: (builder) => {
    builder.addCase(getHeaderRoutes.fulfilled, (state, action) => {
      state.routes = action.payload;
    });
    builder.addCase(getCategories.fulfilled, (state, action) => {
      state.categories = action.payload;
    });
    builder.addCase(getSubCategories.fulfilled, (state, action) => {
      state.subCategories = action.payload;
    });
  },
});

export const { setLanguage, clearSubCategories } = homeSlice.actions;

export default homeSlice.reducer;
