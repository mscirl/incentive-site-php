import Image from "next/image";

export default function About() {
    return (
        <div id="about">
            <section>
                <div className="relative h-32.5 bg-[url('/banner-2.png')] bg-cover bg-left sm:h-57.5 lg:h-91.5">
                    <h2 className="absolute bottom-0 left-4 text-2xsm font-semibold text-tertiary md:left-14 lg:text-5xl">Quem Somos</h2>
                </div>
                <div>
                    <div className="p-4 md:pt-9 md:pr-14 md:pb-9 md:pl-14 lg:max-w-5xl lg:flex lg:flex-col lg:justify-self-center">
                        <h3 className="text-lg text-secondary font-medium mb-4.5 lg:text-2xl">Um pouco da nossa história</h3>
                        <div className="flex flex-col items-center gap-4 lg:flex-row lg:gap-12">
                            <div className="md:flex-1/2">
                                <p className="text-primary">O Instituto Incentive de Inovação, Desenvolvimento e Transformação Social nasceu
                                    em 2001, no município de Pereiro, Ceará, com o propósito de gerar impacto positivo na
                                    sociedade por meio de iniciativas inovadoras e inclusivas. Criado por um grupo de pessoas
                                    comprometidas com a transformação social, o Instituto Incentive tem atuado ao longo dos
                                    anos como um agente de mudança, desenvolvendo projetos e ações voltadas para a
                                    inclusão social, educação, tecnologia, sustentabilidade, cultura e empreendedorismo.
                                    Nossa trajetória é marcada por um compromisso inabalável com o bem-estar das
                                    comunidades, a defesa dos direitos humanos e a promoção do desenvolvimento
                                    sustentável. Ao longo dos anos, expandimos nossa atuação para diversas regiões do Brasil,
                                    sempre buscando criar oportunidades, fortalecer a cidadania e reduzir desigualdades.
                                    Com uma abordagem multidisciplinar e colaborativa, o Instituto Incentive promove parcerias
                                    com instituições públicas e privadas, organizações da sociedade civil e empresas
                                    comprometidas com a responsabilidade social. Nossas ações são guiadas pela ética,
                                    transparência e inovação, sempre com o objetivo de construir um futuro mais justo, inclusivo
                                    e sustentável para todos.</p>
                            </div>
                            <div className="md:flex-1/2">
                                <Image className="rounded-2xl" src={"/logo-2.png"} alt="Instituto Incentive" width={500} height={500} />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    )
}