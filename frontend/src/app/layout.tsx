import type { Metadata } from "next";
import { Montserrat } from "next/font/google";
import "./globals.css";
import { AppRouterCacheProvider as MaterialUIProvider } from '@mui/material-nextjs/v15-appRouter';

const montserrat = Montserrat({
  subsets: ["latin"],
  weight: ["400", "500", "600", "700"],
});

export const metadata: Metadata = {
  title: "Instituto Incentive",
  description: "O Instituto Incentive de Inovação, Desenvolvimento e Transformação Social é uma organização da sociedade civil sem fins lucrativos, dedicada à promoção da inclusão social, inovação e desenvolvimento sustentável. Fundado em 2001, o Instituto atua em diversas frentes para fortalecer comunidades, reduzir desigualdades e criar oportunidades para pessoas em situação de vulnerabilidade social.",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="pt-br">
      <body
        className={`${montserrat.className}`}
      >
        <MaterialUIProvider>
          {children}
        </MaterialUIProvider>
      </body>
    </html>
  );
}
