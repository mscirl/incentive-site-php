"use client";
import Header from "./components/Header";
import Main from "./components/Main";
import { MenuProvider } from "./context/MenuContext";

export default function App() {
  return (
    <div>
      <MenuProvider>
        <Header/>
      </MenuProvider>
      <Main/>
    </div>
  );
}
