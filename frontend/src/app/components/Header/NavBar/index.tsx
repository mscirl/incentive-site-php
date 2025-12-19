import Link from "next/link";

export default function NavBar() {
    return (
        <nav className="hidden lg:block lg:flex-1 lg:ml-7 lg:mr-7">
            <ul className="flex gap-12 text-center justify-center">
                <li className="text-lg text-primary"><Link href="#home">Início</Link></li>
                <li className="text-lg text-primary"><Link href="#about">Quem Somos</Link></li>
                <li className="text-lg text-primary"><Link href="#mission">Missão</Link></li>
                <li className="text-lg text-primary"><Link href="#team">Equipe</Link></li>
                <li className="text-lg text-primary"><Link href="#projects">Projetos</Link></li>
            </ul>
        </nav>
    )
}