import { combineReducers, configureStore } from "@reduxjs/toolkit";
import homeSlice from "./slices/homeSlice";
import storageSession from "redux-persist/lib/storage/session";
import { persistReducer, persistStore } from "redux-persist";
import thunk from "redux-thunk";

const persistConfig = {
  key: "gnss",
  storage: storageSession,
  whitelist: ["home"],
};

const rootReducer = combineReducers({
  home: homeSlice,
});

const persistedReducer = persistReducer(persistConfig, rootReducer);

const store = configureStore({
  reducer: persistedReducer,
  middleware: [thunk],
});

export const persistor = persistStore(store);
export default store;
