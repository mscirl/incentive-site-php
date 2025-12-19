import Link from "next/link";

export default function Home() {
    return(
        <div id="home">
            <section className="h-[calc(100vh-82px)] relative bg-[url('/banner-1.png')] bg-cover bg-center lg:h-screen">
                <div className="w-full max-w-130 p-4 absolute top-1/2 left-1/2 transform -translate-1/2 lg:max-w-3xl">
                    <h1 className="text-2xl text-white font-semibold text-center text-shadow-primary mb-6 sm:text-3xl lg:text-5xl lg:mb-11">Transformando vidas através da educação e inovação!</h1>
                    <div className="flex flex-col gap-6 items-center lg:flex-row lg:justify-center lg:gap-10">
                        <Link href={"/projetos"} target="_blank" className="text-white font-bold text-sm shadow-secondary bg-secondary p-3 rounded-4xl">Projetos em Destaque</Link>
                        <Link href={"/cursos"} target="_blank" className="text-white font-bold text-sm shadow-secondary bg-secondary p-3 rounded-4xl">Cursos Abertos</Link>
                        <Link href={"/eventos_parcerias"} target="_blank" className="text-white font-bold text-sm shadow-secondary bg-secondary p-3 rounded-4xl">Eventos e Parcerias</Link>
                    </div>
                </div>
            </section>
        </div>
    )
}