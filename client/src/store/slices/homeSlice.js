import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import cookies from "js-cookie";
import baseApi from "../../apis/baseApi";

const initialState = {
  language: cookies.get("gnss_i18next") || "am",
  languageValue: cookies.get("gnss_i18next") === "en" ? "gb" : "am" || "am",
  routes: [],
  allCategories: [],
  allSubCategories: [],
  subCategories: [],
  //
  products: [],
  singleProduct: [],
  partners:[]
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

// get all categories
export const getAllCategories = createAsyncThunk(
  "home/allCategories",
  async (language) => {
    try {
      const { data } = await baseApi.get(`getCategories/${language}`);
      return data;
    } catch (err) {
      console.log(`Get All Categories Error: ${err.message}`);
    }
  }
);

// get categories
export const getAllSubCategories = createAsyncThunk(
  "home/allSubCategories",
  async (language) => {
    try {
      const { data } = await baseApi.get(`getAllSubCategories/${language}`);
      return data;
    } catch (err) {
      console.log(`Get All Sub Categories Error: ${err.message}`);
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

// get all products by sub category
export const getAllProducts = createAsyncThunk(
  "home/allProducts",
  async ({ id, language }) => {
    try {
      const { data } = await baseApi.get(
        `getSubcategoryProducts/${id}/${language}`
      );
      return data;
    } catch (err) {
      console.log(`Get All Products By Sub Category Error: ${err.message}`);
    }
  }
);

// get single product
export const getSingleProduct = createAsyncThunk(
  "home/singleProduct",
  async ({ id, language }) => {
    try {
      const { data } = await baseApi.get(`getSingleProduct/${id}/${language}`);
      return data;
    } catch (err) {
      console.log(`Get Single Product Error: ${err.message}`);
    }
  }
);

// get single product
export const getPartners = createAsyncThunk(
  "home/partners",
  async () => {
    try {
      const { data } = await baseApi.get(`getPartners`);
      return data;
    } catch (err) {
      console.log(`Get Partners Data Error: ${err.message}`);
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
    // set global language value
    setLanguageValue: (state, action) => {
      state.languageValue = action.payload;
    },
    // clear sub categories
    clearSubCategories: (state, action) => {
      state.subCategories = [];
    },
  },
  extraReducers: (builder) => {
    builder.addCase(getHeaderRoutes.fulfilled, (state, action) => {
      state.routes = action.payload;
    });
    builder.addCase(getAllCategories.fulfilled, (state, action) => {
      state.allCategories = action.payload;
    });
    builder.addCase(getAllSubCategories.fulfilled, (state, action) => {
      state.allSubCategories = action.payload;
    });
    builder.addCase(getSubCategories.fulfilled, (state, action) => {
      state.subCategories = action.payload;
    });
    builder.addCase(getAllProducts.fulfilled, (state, action) => {
      state.products = action.payload;
    });
    builder.addCase(getSingleProduct.fulfilled, (state, action) => {
      state.singleProduct = action.payload;
    });
    builder.addCase(getPartners.fulfilled, (state, action) => {
      state.partners = action.payload;
    });
  },
});

export const { setLanguage, setLanguageValue, clearSubCategories } =
  homeSlice.actions;

export default homeSlice.reducer;
