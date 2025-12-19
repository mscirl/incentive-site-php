import type { NextConfig } from "next";

const nextConfig: NextConfig = {
  /* config options here */
};

export default nextConfig;

const res = await fetch("./src/app/curriculos.js");
const data = await res.json();
console.log(data);
